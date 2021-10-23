<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Bigdeal admin is super flexible,">
    <meta name="keywords"
          content="Bigdeal  responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{{asset('/images/favicon/favicon.png')}}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{{asset('/images/favicon/favicon.png')}}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')- {{settings('title')}}</title>

    @livewireStyles
    <link href="{{asset('css/sweetalert2_theme.css')}}" rel="stylesheet">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{{asset('/css/font-awesome.css')}}}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{{asset('/css/flag-icon.css')}}}">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{{asset('/css/icofont.css')}}}">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="{{{asset('/css/prism.css')}}}">

@include('sweetalert::alert')

<!-- latest jquery-->
    <script src="{{{asset('/js/jquery-3.3.1.min.js')}}}"></script>

    @yield('extra-css')


    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{{asset('/css/bootstrap.css')}}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('/css/toastr.css')}}">
    <script src="{{asset('/js/toastr.min.js')}}"></script>

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{{asset('/css/admin.css')}}}">
</head>
