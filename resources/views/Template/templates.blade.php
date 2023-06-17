<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Little And Little</title>
    <link rel="shortcut icon" href="{{asset('assets/images/Little & Little Logo page.png')}}" type="image/x-icon">
    <!-- Đường link boostrap -->
    <script src="{{ asset('boostrap/bootstrap-5.1.3-dist/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('./boostrap/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Link FontAwesome -->
    <script src="https://kit.fontawesome.com/9ddb5fa8d6.js" crossorigin="anonymous"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <!-- link css -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flatpickr.min.css')}}">
    <!-- link js -->
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/carousel-multiple-items.js')}}"></script>
    <script src="{{asset('assets/js/flatpickr.js')}}"></script>
</head>

    <body>
        <!-- Vùng header -->
            @include('includes.header')
        <!-- Vùng body -->
            @yield('homepage')
            @yield('eventpage')
            @yield('eventdetailspage')
            @yield('contactpage')
            @yield('paymentpage')
            @yield('successfulpaymentpage')
            <script src="{{asset('assets/js/custom-calendar.js')}}"></script>
    </body>

</html>