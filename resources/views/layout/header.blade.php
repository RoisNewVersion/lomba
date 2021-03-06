<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- For Google -->
    <link rel="author" href="">
    <link rel="publisher" href="">
    <!-- for Twitter -->          
    <meta name="twitter:card" content="photo">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <meta name="twitter:url" content="">
    <!-- for Facebook OpenGraph -->          
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:description" content="" />
    
    <!-- Canonical -->
    <link rel="canonical" href="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if(Request::segment(1))
            Lomba - {{ strtoupper(Request::segment(1))}}
        @else
            Lomba
        @endif
    
    </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- font Awesome CSS -->
    <link rel="stylesheet" href="{!! asset('css/font-awesome.min.css') !!}">

    <!-- Main Styles CSS -->
    <link href="{!! asset('css/main.css') !!}" rel="stylesheet">
    <!-- Sweet alert -->
    <link href="{!! asset('css/sweetalert.css') !!}" rel="stylesheet">
    <!-- DataTable -->
    <link href="{!! asset('css/datatables.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/responsive.bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/responsive.dataTables.min.css') !!}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{!! asset('css/nprogress.css') !!}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('css')
</head>