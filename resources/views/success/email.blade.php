<div style="border: 1px solid rgb(187, 187, 187); padding: 20px; font-size: 18px; margin: 35px;">
    <h5 style="font-size: 25px; text-align: center; margin-top: 0px;">Đơn đặt vé của bạn</h5>
    <div style="margin-top: -30px;">
        @foreach ($data_customer as $row_customer)
        @if($row_customer->status === 'Đã thanh toán')
            <p style="font-weight: 600;">
                Họ và tên: <span style="font-weight: 400;">{{ $row_customer->customername }}</span> <br>
                Số lượng: <span style="font-weight: 400;">{{ $row_customer->quantity }}</span> <br>
                Gói sử dụng: <span style="font-weight: 400;">{{ $row_customer->package }}</span> <br>
                Đơn giá: <span style="font-weight: 400;">{{ $row_customer->payment_amount }} VND</span> <br>
                Ngày sử dụng: <span style="font-weight: 400;">{{ date('d/m/Y', strtotime($row_customer->orderdate)) }}</span> <br>
                Số điện thoại: <span style="font-weight: 400;">{{ $row_customer->numberphone }}</span> <br>
                Email: <span style="font-weight: 400;">{{ $row_customer->email }}</span> <br>
                Mã vé: <br>
                @foreach ($data as $row)
                    @if ($row_customer->customerid === $row->customerid)
                        <ul style="font-weight: 400; margin-top: -15px;">
                            <li>{{ $row->code }}</li>
                        </ul>
                    @endif
                @endforeach
            </p>
        @endif
        @endforeach
    </div>
</div>