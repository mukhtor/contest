<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/main.css") }}">
    @stack("page-css")
</head>

<body>

@include('layouts.site.header')

<div class="p-3 pt-5">
    @include('flash::message')
    @yield('main_content')
</div>

<script src="{{asset("js/jquery-3.2.1.min.js")}}"></script>
<script src="{{asset("js/popper.min.js")}}"></script>
<script src="{{asset("js/bootstrap.min.js")}}"></script>
@stack('child-scripts')
@stack('child2-scripts')
</body>

</html>
