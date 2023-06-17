<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\validator;
use Carbon\Carbon;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Event;
use Mail;
use Illuminate\Pagination\LengthAwarePaginator;
use Dompdf\Dompdf;
use Dompdf\FontMetrics;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;

class myController extends Controller
{
    // Hiển thị trang chủ 
    public function showHome() {
        return view('homepage');
    }
    //Chức năng thêm khách hàng
    public function Home(Request $r) {
        $messages = [];
        $validator = Validator::make($r->all(), [
            'package' => 'required',
            'ticket' => $r->input('package') === 'Gói gia đình' ? 'required|numeric|max:10' : 'required|numeric|max:6',
            'date' => 'required|date_format:d-m-Y',
            'name' => 'required',
            'phonenumber' => 'required',
            'email' => 'required|email',
        ], $messages);
    
        if ($validator->fails()) {
            return redirect('/home')
                ->with('error', 'Đặt vé thất bại.');
        } else {
            $package = $r->input('package');
            $ticket = $r->input('ticket');
            $date = $r->input('date');
            $formattedDate = date('Y-m-d', strtotime($date));
            $name = $r->input('name');
            $phonenumber = $r->input('phonenumber');
            $email = $r->input('email');
            $paymentAmount = $ticket * 25000;
            $formattedPaymentAmount = number_format($paymentAmount);
    
            $customer = new Customer(); 
            $customer->package = $package;
            $customer->quantity = $ticket;
            $customer->payment_amount = $formattedPaymentAmount;
            $customer->orderdate = $formattedDate;
            $customer->customername = $name;
            $customer->numberphone = $phonenumber;
            $customer->email = $email;
            $customer->status = 'Chưa thanh toán';
            $customer->save(); 

            $payData = [];
    
            // Prepare the array of payment data
            for ($i = 0; $i < $ticket; $i++) {
                $payData[] = [
                    'customerid' => $customer->customerid,
                    'package' => $package,
                    'quantity' => $ticket,
                    'orderdate' => $formattedDate,
                    'status' => $customer->status,
                ];
            }
    
            // Insert records into the payments table
            DB::table('payments')->insert($payData);
    
            return redirect('/payment')->with('success', 'Đặt vé thành công, mời bạn đến bước tiếp theo');
        }
    }

    // Hiển thị trang thanh toán 
    public function showPayment() {
        $customer = Customer::latest('customerid')->firstOrFail();
        return view('paymentpage', compact('customer'));
    }
    // Chức năng thanh toán vé của website
    public function Payment(Request $r) {
        $messages = [];
        $validator = Validator::make($r->all(), [
            'cardnumber' => 'required',
            'name' => 'required',
            'date' => 'required|date_format:d-m-Y',
            'cvv_cvc' => 'required',
        ], $messages);
    
        if ($validator->fails()) {
            return redirect('/payment')
                ->with('error', 'Thanh toán thất bại');
        } else {
            $cardnumber = $r->input('cardnumber');
            $name = $r->input('name');
            $date = $r->input('date');
            $formattedDate = date('Y-m-d', strtotime($date));
            $cvv_cvc = $r->input('cvv_cvc');

            // Kiểm tra xem các thông được nhập vào input có trùng gớp với thông tin trong database bảng sacombanks không?
            $existingRecord = DB::table('sacombanks')
            ->where('card_number', $cardnumber)
            ->where('subject_name', $name)
            ->where('expiration_date', $formattedDate)
            ->where('cvv_cvc', $cvv_cvc)
            ->first();

            if ($existingRecord) {

                // Cập nhật lại tình trạng ở bảng customers
                $customer = Customer::latest('customerid')->firstOrFail();
                $customer->status = 'Đã thanh toán';
                $customer->save();

                // Cập nhật lại tình trạng ở bảng payments
                $payments = Payment::where('customerid', $customer->customerid)->get();
                foreach ($payments as $payment) {
                    $code = $this->generateRandomCode(11);
                    $payment->code = $code;
                    $payment->status = 'Đã thanh toán';
                    $payment->save();
                }

                return redirect('/success')->with('success', 'Thanh toán thành công.');
            } else {
                return redirect('/payment')->with('error', 'Thanh toán thất bại');
            }
        }
    }
    // Random code
    public function generateRandomCode($length) {
        return Str::random($length);
    }

    // Hiển thị trang thanh toán thành công
    public function showSuccess() {
        $payments = Payment::get();
        foreach ($payments as $payment) {
            $payment->orderdate = date('d/m/Y', strtotime($payment->orderdate));
        }

        $payments = $payments->where('status', '!=', 'Chưa thanh toán');
    
        $totalPayments = count($payments);
        $perPage = 4;
        if ($perPage === 0) {
            $totalPages = 0;
        } else {
            $totalPages = ceil($totalPayments / $perPage);
        }

        return view('successfulpaymentpage', [
            'datve' => $payments,
            'totalPages' => $totalPages,
            'totalPayments' => $totalPayments,
            'perPage' => $perPage
        ]);
    }
    // Chức năng tải dữ liệu về dưới dạng PDF
    public function Export(Request $r) {
        // Lấy dữ liệu từ cơ sở dữ liệu
        $data = Payment::all();
        $data_customer = Customer::all();
        if ($data->isEmpty() || $data_customer->isEmpty()) {
            return redirect('/success')->with('error', 'Không có dữ liệu để tải về.');
        }
    
        // Tạo đối tượng myController
        $controller = new myController();
    
        // Tạo nội dung dữ liệu
        $content = view('success/download', compact('data', 'data_customer'))->render();
    
        // Tạo đối tượng Dompdf
        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($content);
    
        // Render PDF từ HTML
        $dompdf->render();
    
        // Tạo tên tệp tin và đường dẫn lưu trữ
        $fileName = 'Ticket_List.pdf';
        $filePath = 'Exports/' . $fileName;
        // Lưu tệp tin PDF
        Storage::put($filePath, $dompdf->output());
    
        // Trả về phản hồi để tải về tệp tin
        return response()->file(storage_path('app/' . $filePath), [
            'Content-Type' => 'application/pdf; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ])->deleteFileAfterSend(true);
    }
    // Chức năng gửi email
    public function Guiemail(Request $r) {
        try {
            // Lấy khách hàng mới nhất
            $customer = Customer::where('status', 'Đã thanh toán')->latest()->first();
            if (!$customer) {
                throw new \Exception('Không tìm thấy khách hàng thỏa mãn điều kiện');
            }
            Mail::send('success/email', [
                'data_customer' => Customer::all(),
                'data' => Payment::all(),
            ], function ($mail) use ($customer, $r) {
                $mail->to($customer->email, $customer->customername);
                $mail->from($customer->email);
                $mail->subject('Đơn đặt vé của bạn');
            });
    
            return redirect('/success')->with('success_email', 'Đã gửi, bạn vui lòng chờ thông báo.');
        } catch (\Exception $e) {
            return redirect('/success')->with('error_email', 'Có lỗi xảy ra. Vui lòng thử lại sau.');
        }
    }

    // Hiển thị trang sự kiện
    public function showEvent() {
        $events = Event::get();
        foreach ($events as $event) {
            $event->granttime = date('d/m/Y', strtotime($event->granttime));
            $event->expiry = date('d/m/Y', strtotime($event->expiry));
        }
        return view('eventpage', ['sukien' => $events]);
    }

    // Hiển thị trang chi tiết sự kiện
    public function showEventDetails($eventid) {
        $event = Event::findOrFail($eventid);
        return view('eventdetailspage', compact('event'));
    }

    // Hiển thị trang liên hệ
    public function showContact() {
        return view('contactpage');
    }
    // Chức năng gửi liên hệ
    public function Contact(Request $r) {
        // Validate the form input
        $validator = Validator::make($r->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phonenumber' => 'required',
            'address' => 'required',
            'Message' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect('/contact')->with('error', 'Vui lòng điền đầy đủ thông tin liên hệ.');
        }

        // Validation passed, proceed with sending the email
        try {
            Mail::send('email/content', [
                'name' => $r->input('name'),
                'email' => $r->input('email'),
                'phonenumber' => $r->input('phonenumber'),
                'address' => $r->input('address'),
                'Message' => $r->input('Message'),
            ], function ($mail) use ($r) {
                $mail->to('Buithaihao267@gmail.com', $r->name, $r->email, $r->phonenumber, $r->address, $r->Message);
                $mail->from($r->email);
                $mail->subject('Thư liên hệ với Admin');
            });

            return redirect('/contact')->with('success', 'Đã gửi, bạn vui lòng chờ thông báo.');
        } catch (\Exception $e) {
            return redirect('/contact')->with('error', 'Có lỗi xảy ra. Vui lòng thử lại sau.');
        }
    }
}
