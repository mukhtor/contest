<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
{{--    <link rel="stylesheet" href="../../asset/css/style.css">--}}
    <link rel="stylesheet" href="{{asset('siteAsset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('siteAsset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('siteAsset/css/font-awesome.min.css')}}">
    <!--	Корневой файл-->
{{--    <script src="../../asset/codemirror-5.61.0/lib/codemirror.js"></script>--}}

{{--    <!--	Формат чтения в редакторе-->--}}
{{--    <script src="../../asset/codemirror-5.61.0/mode/htmlmixed/htmlmixed.js"></script>--}}
{{--    <script src="../../asset/codemirror-5.61.0/mode/xml/xml.js"></script>--}}
{{--    <!--	Styles for editor-->--}}
{{--    <link rel="stylesheet" href="../../asset/codemirror-5.61.0/lib/codemirror.css">--}}
{{--    <link rel="stylesheet" href="../../asset/codemirror-5.61.0/theme/darcula.css">--}}
{{--    <link rel="stylesheet" href="../../asset/codemirror-5.61.0/addon/scroll/simplescrollbars.css">--}}
{{--    <link rel="stylesheet" href="../../asset/codemirror-5.61.0/addon/display/fullscreen.css">--}}
{{--    <!--Addition deatures for editor-->--}}
{{--    <script src="../../asset/codemirror-5.61.0/addon/edit/closetag.js"></script>--}}
{{--    <script src="../../asset/codemirror-5.61.0/addon/edit/closebrackets.js"></script>--}}
{{--    <script src="../../asset/codemirror-5.61.0/addon/scroll/simplescrollbars.js"></script>--}}
{{--    <script src="../../asset/codemirror-5.61.0/addon/display/fullscreen.js"></script>--}}
{{--    <script src="../../asset/codemirror-5.61.0/keymap/sublime.js"></script>--}}

</head>

<body>

<!-- Header -->
<header id="header" class="transparent-nav">
    <div class="container">

        <div class="navbar-header">
            <!-- Logo -->
            <div class="navbar-brand">
                <a class="logo" href="index.html">
                    <img src="{{asset('siteAsset/img/logo-alt.png')}}" alt="logo">
                </a>
            </div>
            <!-- /Logo -->

            <!-- Mobile toggle -->
            <button class="navbar-toggle">
                <span></span>
            </button>
            <!-- /Mobile toggle -->
        </div>

        <!-- Navigation -->
        <div class="col-md-6">
            <ul class="footer-nav" >
                <li><a style="color: white" href="index.html">Home</a></li>
                <li><a style="color: white" href="#">About</a></li>
                <li><a style="color: white" href="#">Courses</a></li>
                <li><a style="color: white" href="blog.html">Blog</a></li>
                <li><a style="color: white" href="contact.html">Contact</a></li>
            </ul>
        </div>
        <!-- /Navigation -->

    </div>
</header>
<div id="home" class="hero-area">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{asset('siteAsset/img/home-background.jpg')}})"></div>
    <!-- /Backgound Image -->

    <div class="home-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="white-text">Edusite Free Online Training Courses</h1>
                    <p class="lead white-text">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant, eu pro alii error homero.</p>
                    <a class="main-button icon-button" href="#">Get Started!</a>
                </div>
            </div>
        </div>
    </div>

</div>
@yield('main_content')
<footer id="footer" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- footer logo -->
            <div class="col-md-6">
                <div class="footer-logo">
                    <a class="logo" href="index.html">
                        <img src="./img/logo.png" alt="logo">
                    </a>
                </div>
            </div>
            <!-- footer logo -->

            <!-- footer nav -->
            <div class="col-md-6">
                <ul class="footer-nav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <!-- /footer nav -->

        </div>
        <!-- /row -->

        <!-- row -->
        <div id="bottom-footer" class="row">

            <!-- social -->
            <div class="col-md-4 col-md-push-8">
                <ul class="footer-social">
                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <!-- /social -->

            <!-- copyright -->
            <div class="col-md-8 col-md-pull-4">
                <div class="footer-copyright">
                    <span>© Copyright 2018. All Rights Reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com">Colorlib</a></span>
                </div>
            </div>
            <!-- /copyright -->

        </div>
        <!-- row -->

    </div>
    <!-- /container -->

</footer>
<div id="preloader" style="display: none;"><div class="preloader"></div></div>
</body>
<script src="{{asset('siteAsset/js/google-map.js')}}"></script>
<script src="{{asset('siteAsset/js/jquery.min.js')}}"></script>
<script src="{{asset('siteAsset/js/main.js')}}"></script>
{{--<script src="../../asset/js/timer.js"></script>--}}
</html>
