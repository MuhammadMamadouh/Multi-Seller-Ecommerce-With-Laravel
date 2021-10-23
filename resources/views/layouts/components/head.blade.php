<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - {{settings('title')}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="big-deal">
    <meta name="keywords" content="big-deal">
    <meta name="author" content="big-deal">
    <link rel="icon" href="{{asset('images/favicon/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('images/favicon/favicon.png')}}" type="image/x-icon">

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="{{asset('css/sweetalert2_theme.css')}}" rel="stylesheet">
    <!--icon css-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themify.css')}}">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}">

    <!--Animate css-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <script src="{{{asset('/js/jquery-3.3.1.min.js')}}}"></script>
    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/color4.css')}}" media="screen" id="color">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/toastr.css')}}">
    <script src="{{asset('/js/toastr.min.js')}}"></script>

    @yield('extra-css')
</head>
