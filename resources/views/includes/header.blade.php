<header class="fixed-top">
    <div class="row d-flex align-items-center h-100 text-center">
        <div class="col">
            <a href="{{ url('') }}/home"><img src="{{asset('assets/images/Little & Little Logo.png')}}" alt="" class="logo"></a>
        </div>
        <div class="col">
            <div class="row">
                <div class="col d-flex align-items-center justify-content-center">
                    <a href="{{ url('') }}/home">Trang chủ</a>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <a href="{{ url('') }}/event">Sự kiện</a>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <a href="{{ url('') }}/contact">Liên hệ</a>
                </div>
            </div>
        </div>
        <div class="col">
            <a href="{{ url('') }}/contact" class="d-inline-flex align-items-center">
                <div class="border border-2 d-flex align-content-between p-2 rounded-circle">
                    <img src="{{asset('assets/images/Vector (Stroke).png')}}" alt="contact">
                </div>
                &ensp;0123456789
            </a>
        </div>
    </div>
</header>