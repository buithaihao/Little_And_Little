@extends('Template.templates')
@section('eventpage')
<main>
    <div class="background">
       <form action="">
            <div class="decorate">
                    <img src="{{asset('assets/images/eventpage/event_1.png')}}" alt="">
                    <img src="{{asset('assets/images/eventpage/event_2.png')}}" alt="">
                </div>
                <div class="eventpage pt-5">
                    <div class="title text-center mt-3">
                        <h1>Sự kiện nổi bật</h1>
                    </div>
                    <div class="carousel-wrapper d-flex align-items-center">
                        <button type="button" class="prev-btn button-3d ms-4">
                            <img src="{{asset('assets/images/icon/Arrow - Down 2.png')}}" alt="">
                        </button>
                        <div class="carousel">
                            @foreach($sukien as $key => $event)
                                <div class="item">
                                    <div class="card">
                                        <img class="card-img-top" src="{{$event->image_event}}" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">{{$event->name_event}}</h4>
                                            <h4 class="card-text">{{$event->name}}</h4>
                                            <h4 class="card-date">
                                                <img src="{{asset('assets/images/icon/calendar.png')}}" alt="">&ensp;
                                                {{$event->granttime}} - {{$event->expiry}}
                                            </h4>
                                            <h4 class="card-price">{{ number_format($event->price, 0, ',', ',') }} VNĐ</h4>
                                                <a href="{{ url('/eventdetails/' . $event->eventid) }}">
                                                    <button class="button-submit" type="button">Xem chi tiết</button>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="next-btn button-3d me-4">
                            <img src="{{asset('assets/images/icon/Arrow - Down 2.png')}}" alt="">
                        </button>
                    </div>
            </div>
       </form>
    </div>
</main>
@endsection