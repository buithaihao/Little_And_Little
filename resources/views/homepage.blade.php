@extends('Template.templates')
@section('homepage')
<main>
    <div class="background">
        <div class="homepage">
            <div class="imgs">
                <img src="{{asset('assets/images/homepage/18451 [Converted]-02 1.png')}}" alt="" class="img-1">
                <img src="{{asset('assets/images/homepage/18451 [Converted]-03 1.png')}}" alt="" class="img-2">
                <img src="{{asset('assets/images/homepage/18451 [Converted]-03 2.png')}}" alt="" class="img-3">
                <img src="{{asset('assets/images/homepage/18451 [Converted]-04 1.png')}}" alt="" class="img-4">
                <img src="{{asset('assets/images/homepage/18451 [Converted]-05 1.png')}}" alt="" class="img-5">
                <img src="{{asset('assets/images/homepage/18451 [Converted]-06 1.png')}}" alt="" class="img-6">
                <img src="{{asset('assets/images/homepage/Lisa_Arnold_Lay_Do_F2 3.png')}}" alt="" class="img-7">
                <img src="{{asset('assets/images/homepage/render fix hair 1.png')}}" alt="" class="img-8">
            </div>
            <div class="content d-flex align-items-center">
                <img src="{{asset('assets/images/homepage/image 2.png')}}" alt="">
                <span>ĐẦM SEN <br> PARK</span>
            </div>
            <div class="home-form-container">
                <div class="title d-flex align-items-center justify-content-center">
                    <span>VÉ CỦA BẠN</span>
                </div>
                <div class="news">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod voluptatem excepturi, sunt
                        aliquid dolorem</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod voluptatem excepturi, sunt
                        aliquid dolorem</p>
                    <div class="starts ms-4">
                        <p><img src="{{asset('assets/images/homepage/Start.png')}}" alt=""> Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.</p>
                        <p><img src="{{asset('assets/images/homepage/Start.png')}}" alt=""> Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.</p>
                        <p><img src="{{asset('assets/images/homepage/Start.png')}}" alt=""> Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.</p>
                        <p><img src="{{asset('assets/images/homepage/Start.png')}}" alt=""> Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="form px-3">
                    <form action="{{url('')}}/home" method="post" class="text-center" id="myForm">
                        @csrf
                        <div class="package d-flex">
                            <select name="package" id="">
                                <option value="Gói gia đình">Gói gia đình</option>
                                <option value="Gói cá nhân">Gói cá nhân</option>
                            </select>
                            <button type="button" class="button-3d" onclick="clearInputs(this)">
                                <img src="{{asset('assets/images/icon/Arrow - Down 2.png')}}" alt="">
                            </button>
                        </div>
                        <div class="tickets d-flex justify-content-between">
                            <input type="number" name="ticket" id="" placeholder="Số lượng vé"
                                class="ticket no-spinners">
                                <input type="text" name="date" id="date" placeholder="Ngày sử dụng" class="date">
                            <button type="button" class="button-3d" id="dateButton">
                                <img src="{{asset('assets/images/icon/Vector.png')}}" alt="">
                            </button>
                        </div>
                        <div class="name">
                            <input type="text" name="name" id="" placeholder="Họ và tên">
                        </div>
                        <div class="phonenumber">
                            <input type="number" name="phonenumber" id="" placeholder="Số điện thoại"
                                class="no-spinners">
                        </div>
                        <div class="email">
                            <input type="email" name="email" id="" placeholder="Địa chỉ email">
                        </div>
                            <button class="button-submit" type="submit">Đặt vé</button>
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
                        <p>Hình như có lỗi xảy ra khi đặt vé...<br>
                            Đối với gói gia đình thì được phép đặt tối đa 10 vé, <br>
                            Đối với gói cá nhân thì được phép đặt tối đa 6 vé, <br>
                            Vui lòng kiểm tra lại thông tin vé của bạn, <br>
                            và thử lại.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function clearInputs() {
                $('#myForm')[0].reset();
            }
        </script>
        <!-- Hiển thị phương thức thành công nếu có lỗi -->
        @if (session('error'))
            <script>
            // Khi không gửi được, sẽ hiển thị phương thức báo lỗi
                $(document).ready(function () {
                $('#staticBackdrop_error').modal('show');
                });
            </script>
        @endif
</main>
@endsection