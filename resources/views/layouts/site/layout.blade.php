<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
</head>

<body>

@include('layouts.site.header')

<div class="container pt-5">
    @yield('main_content')
</div>

<script src="{{asset("js/jquery-3.2.1.slim.min.js")}}"></script>
<script src="{{asset("js/popper.min.js")}}"></script>
<script src="{{asset("js/bootstrap.min.js")}}"></script>
</body>

</html>
