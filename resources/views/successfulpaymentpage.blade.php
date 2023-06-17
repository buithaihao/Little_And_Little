@extends('Template.templates')
@section('successfulpaymentpage')
<main>
    <div class="background">
        <form action="">
            <div class="successfulpaymentpage pt-5">
                <img src="{{asset('assets/images/successfulpaymentpage/Alvin_Arnold_Votay1 1.png')}}" alt="" class="img">
                <div class="title text-center mt-2">
                    <h1>Thanh toán thành công</h1>
                </div>
                <div class="successfulpaymentpage-form-container">
                    <div class="carousel-wrapper d-flex align-items-center">
                        <button type="button" class="prev-btn button-3d ms-4">
                            <img src="{{asset('assets/images/icon/Arrow - Down 2.png')}}" alt="">
                        </button>
                        <div class="carousel h-100">
                            @foreach($datve as $key => $payment)
                                @if ($payment->status === 'Đã thanh toán')
                                <div class="item">
                                    <div class="ticket">
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?data={{$payment->code}}" alt="" class="qr">
                                        <div class="ticket-code">{{$payment->code}}</div>
                                        <h1>VÉ CỔNG</h1>
                                        <p>---</p>
                                        <h4>Ngày sử dụng: {{$payment->orderdate}}</h4>
                                        <img src="{{asset('assets/images/successfulpaymentpage/tick 1.png')}}" alt="" class="tick">
                                    </div>
                                </div>
                                @endif
                            @endforeach
                            
                        </div>
                        <button type="button" class="next-btn button-3d me-4">
                            <img src="{{asset('assets/images/icon/Arrow - Down 2.png')}}" alt="">
                        </button>
                    </div>
                    <div class="container d-flex justify-content-between mt-4">
                        <h1 class="ticket-count">Số lượng: {{$totalPayments}} vé</h1>
                        <h1 class="current-page">Trang <span class="current-slide">1</span>/{{$totalPages}}</h1>
                    </div>
                </div>
                <div class="download-email-buttons">
                    <form action="{{url('')}}/taive" method="post">
                    @csrf
                        <a href="{{url('')}}/taive">
                            <p class="button-submit" name="export">Tải vé</p>
                        </a>
                    </form>
                    <!--  -->
                    <form action="{{url('')}}/guimail" method="post" id="myForm">
                    @csrf
                        <a href="{{url('')}}/guimail">
                            <p class="button-submit" name="export_email">Gửi email</p>
                        </a>
                    </form>
                </div>
            </div>
            <!-- ==== Popup ==== -->
            <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="width: 350px; height: 300px;">
                    <div class="modal-content" style="border-radius: 0; border: none; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
                        <button type="button" class="btn-close-popup" data-bs-dismiss="modal" aria-label="Close" style="border: none; background: #fff; text-align: right; padding-right: 10px; padding-top: 10px;">
                            <span style="color: #ed7200;"><i class="fa-solid fa-x"></i></span>
                        </button>
                        <div class="content-header" style="padding-left: 40px; color: #656462;">
                            <p>Gửi email thành công</p>
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
                            <p>Hình như có lỗi xảy ra khi gửi email...<br>
                                Vui lòng kiểm tra lại email,<br>
                                và thử lại.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hiển thị phương thức thành công nếu không có lỗi -->
            @if (session('success_email'))
                <script>
                    // Khi đã gửi thành công, hãy hiển thị phương thức thành công
                    $(document).ready(function () {
                        $('#staticBackdrop').modal('show');
                    });
                </script>
            @endif
            <!-- Hiển thị phương thức thành công nếu có lỗi -->
            @if (session('error_email'))
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