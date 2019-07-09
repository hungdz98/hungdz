<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title','Master Page')</title>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('Backend/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('Backend/css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('Backend/css/colorpicker.css')}}" />
    <link rel="stylesheet" href="{{ asset('Backend/css/uniform.css') }}" />
    <link rel="stylesheet" href="{{ asset('Backend/css/select2.css') }}" />
    <link rel="stylesheet" href="{{asset('Backend/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{asset('Backend/css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('Backend/css/matrix-media.css')}}" />
    <link rel="stylesheet" href="{{asset('Backend/css/bootstrap-wysihtml5.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link href="{{asset('Backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('Backend/css/jquery.gritter.css')}}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

@include('layout.Pagination_b.header')
@include('layout.Pagination_b.nav')

<!--main-container-part-->

<div id="content">
    @yield('content')
</div>
@include('layout.Pagination_b.footer')
@yield('jsblock')
</body>
</html>
