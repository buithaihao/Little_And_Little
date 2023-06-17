@extends('Template.templates')
@section('contactpage')
<main>
    <div class="background">
        <form action="{{url('')}}/contact" method="post" id="myForm">
            @csrf
            <div class="contactpage pt-5">
                <img src="{{asset('assets/images/contactpage/Alex_AR_Lay_Do shadow 1.png')}}" alt="" class="img">
                <div class="title text-center mt-3">
                    <h1>Liên hệ</h1>
                </div>
                <div class="contact-form-container d-flex justify-content-center">
                    <div class="row w-100">
                        <div class="col-8 d-flex justify-content-center align-items-center">
                            <div class="contact-form">
                                <span>
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam numquam
                                    accusantium reiciendis sunt, officiis suscipit modi rem architecto, officia maiores
                                    doloremque cum!
                                </span>
                                <form action="" class="text-center">
                                    <div class="form-row">
                                        <input type="text" name="name" id="" placeholder="Tên" class="input-small">
                                        <input type="text" name="email" id="" placeholder="Email" class="input-large">
                                    </div>
                                    <div class="form-row">
                                        <input type="text" name="phonenumber" id="" placeholder="Số điện thoại"
                                            class="input-small">
                                        <input type="text" name="address" id="" placeholder="Địa chỉ" class="input-large">
                                    </div>
                                    <textarea name="Message" id="" cols="30" rows="5" placeholder="Lời nhắn"
                                        class="locked-textarea"></textarea>
                                    <button class="button-submit" type="submit"
                                        style="position: absolute; bottom: 50px; left: 250px;">Gửi liên hệ
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="contact-info-container">
                                <div class="contact-info">
                                    <img src="{{asset('assets/images/icon/adress 1.png')}}" alt="adress">
                                    <div>
                                        <h1>Địa chỉ:</h1>
                                        <span>86/33 Âu Cơ, Phường 9, Quận Tân Bình, TP. Hồ Chí Minh</span>
                                    </div>
                                </div>
                                <div class="contact-info">
                                    <img src="{{asset('assets/images/icon/mail-inbox-app 1.png')}}" alt="mail">
                                    <div>
                                        <h1>Email:</h1>
                                        <span>investigate@your-site.com</span>
                                    </div>
                                </div>
                                <div class="contact-info">
                                    <img src="{{asset('assets/images/icon/telephone 2.png')}}" alt="telephone">
                                    <div>
                                        <h1>Điện thoại</h1>
                                        <span>+84 145 689 798</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <p>Gửi liên hệ thành công<br>
                                Vui lòng kiên nhẫn đợi phản hồi từ<br>
                                Chúng tôi bạn nhé
                            </p>
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
                            <p>Hình như có lỗi xảy ra khi gửi liên hệ...<br>
                                Vui lòng kiểm tra lại thông tin liên hệ,<br>
                                và thử lại.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hiển thị phương thức thành công nếu không có lỗi -->
            @if (session('success'))
            <script>
                // Khi đã gửi thành công, hãy hiển thị phương thức thành công
                $(document).ready(function () {
                    $('#staticBackdrop').modal('show');
                });
            </script>
            @endif

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