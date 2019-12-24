<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>{{ $title?? __('site.site_name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    {{-- favicon --}}
    <link rel="icon" href="{{ asset('pasta.ico') }}">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/bower_components/font-awesome/css/font-awesome.min.css">
    @if(app()->getLocale() == 'ar')
        <!-- Cairo font -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700" rel="stylesheet"> --}}
        <!-- font awesome rtl -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/font-awesome-rtl.min.css">
        <!-- bootstrap rtl -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/bower_components/bootstrap/dist/css/bootstrap-rtl.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/AdminLTE-rtl.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/skins/_all-skins-rtl.min.css">
    @else
    <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins -->
        <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/skins/_all-skins.min.css">
    @endif
<!-- notyjs -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/bower_components/notyjs/noty.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/loader.css">

    <!-- Morris chart -->
    {{--  <link rel="stylesheet" href="{{asset('AdminLTE')}}/bower_components/morris.js/morris.css">--}}

    <!-- notyjs -->
    <script src="{{ asset('AdminLTE') }}/bower_components/notyjs/noty.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">