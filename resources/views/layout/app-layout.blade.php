<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Kinco - Kindergarten HTML Template</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ front_asset('css/style.css')}}">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="{{ front_asset('css/responsive.css')}}">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ front_asset('images/Favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ front_asset('images/Favicon.png')}}">

</head>

<body class="counter-scroll header-fixed main">

    <!-- Preloader -->
    {{-- <div id="preload" class="preload">
        <div class="preload-logo"></div>
    </div> --}}

    <div id="wrapper">
        <div id="page" class="clearfix">
            <x-header />


            {{ $slot }}

            <x-footer />

        </div>
    </div>
    <!-- /#wrapper -->

    <a id="scroll-top"></a>

    <!-- Javascript -->
    <script src="{{ front_asset('js/jquery.min.js')}}"></script>
    <script src="{{ front_asset('js/plugin.js')}}"></script>
    <script src="{{ front_asset('js/countto.js')}}"></script>
    <script src="{{ front_asset('js/jquery-validate.js')}}"></script>
    <script src="{{ front_asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{ front_asset('js/owl.carousel2.thumbs.js')}}"></script>
    <script src="{{ front_asset('js/main.js')}}"></script>
    <script src="{{ front_asset('js/shortcodes.j')}}s"></script>
    <script src="{{ front_asset('js/wow.min.js')}}"></script>
    <script src="{{ front_asset('js/jquery.magnific-popup.min.js')}}"></script>
</body>

</html>
