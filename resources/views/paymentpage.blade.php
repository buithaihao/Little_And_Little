@extends('Template.templates')
@section('paymentpage')
<main>
    <div class="background">
        <form action="">
            <div class="paymentpage pt-5">
                <img src="{{asset('assets/images/paymentpage/Trini_Arnold_Votay1 2.png')}}" alt="" class="img">
                <div class="title text-center mt-3">
                    <h1>Thanh toán</h1>
                </div>
                <div class="paymentpage-form-container">
                    <div class="booking-information">
                        <div class="title d-flex align-items-center justify-content-center">
                            <h1>VÉ CỔNG - VÉ GIA ĐÌNH</h1>
                        </div>
                        <div class="book-form">
                            <form action="">
                                <div class="d-flex justify-content-between">
                                    <div class="payment-amount">
                                        <span>Số tiền thanh toán</span>
                                        <input type="text" name="paymentamount" id="" value="{{$customer->payment_amount}}" disabled>
                                    </div>
                                    <div class="number-of-tickets">
                                        <span>Số lượng vé</span>
                                        <div class="d-flex">
                                            <input type="text" name="numberoftickets" id="" value="{{$customer->quantity}}" disabled>&ensp;<span>vé</span>
                                        </div>
                                    </div>
                                    <div class="date">
                                        <span>Ngày sử dụng</span>
                                        <input type="text" name="date" id="" value="{{$customer->orderdate}}" disabled>
                                    </div>
                                </div>
                                <div class="contact-info">
                                    <span>Thông tin liên hệ</span>
                                    <input type="text" name="contactinfo" id="" value="{{$customer->customername}}" disabled>
                                </div>
                                <div class="phone">
                                    <span>Điện thoại</span>
                                    <input type="text" name="phone" id="" value="{{$customer->numberphone}}" disabled>
                                </div>
                                <div class="email">
                                    <span>Email</span>
                                    <input type="text" name="email" id="" value="{{$customer->email}}" disabled>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="billing-information">
                        <div class="title d-flex align-items-center justify-content-center">
                            <h1>THÔNG TIN THANH TOÁN</h1>
                        </div>
                        <div class="bill-form">
                            <form action="{{url('')}}/payment" method="post" id="myForm">
                                @csrf
                                <div>
                                    <span>Số thẻ</span>
                                    <input type="text" name="cardnumber" id="">
                                </div>
                                <div>
                                    <span>Họ tên chủ thẻ</span>
                                    <input type="text" name="name" id="">
                                </div>
                                <div class="expiration-date">
                                    <span>Ngày hết hạn</span>
                                    <div class="d-flex justify-content-between">
                                        <input type="text" name="date" id="date">
                                        <button type="button" class="button-3d" id="dateButton">
                                            <img src="{{asset('assets/images/icon/Vector.png')}}" alt="">
                                        </button>
                                    </div>
                                </div>
                                <div class="cvv-cvc">
                                    <span>CVV/CVC</span>
                                    <input type="text" name="cvv_cvc" id="">
                                </div>
                                <div class="text-center mt-3">
                                    <a href="{{url('')}}/success">
                                        <button class="button-submit" type="submit">Thanh toán</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ==== Popup Error ==== -->
            <div class="modal fade" id="staticBackdrop_error" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="width: 280px; height: 300px;">
                    <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
                        <button type="button" class="btn-close-popup" data-bs-dismiss="modal" aria-label="Close" style="height: 60px; border-top-left-radius: 20px; border-top-right-radius: 20px; border: none; background: #ed7200; text-align: right; padding-right: 10px; padding-top: 10px;">
                            <span style="color: #ed7200;"><i class="fa-solid fa-x"></i></span>
                        </button>
                        <div class="content-header" style="padding-top: 10px; padding-left: 30px; padding-right: 30px; color: #656462;">
                        <p style="position: absolute; top: -45px; left: 95px;"><img src="{{asset('assets/images/icon/SadIcon.png')}}" alt="sad_icon" width="50%"></p>
                            <p>Hình như có lỗi xảy ra khi thanh toán...<br>
                                Vui lòng kiểm tra lại thông tin ngân hàng,<br>
                                thông tin thẻ và thử lại.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hiển thị phương thức thành công nếu có lỗi -->
            @if (session('error'))
                <script>
                // Khi không gửi được, sẽ hiển thị phương thức báo lỗi
                    $(document).ready(function () {
                    $('#staticBackdrop_error').modal('show');
                    });
                </script>
             @endif
        </form>
    </div>
</main>
@endsection