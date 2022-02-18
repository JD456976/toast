<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/dark.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/custom.css') }}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>{{ $title }}</title>
@stack('head-scripts')
</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    @include('frontend.partials.header')



    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                {{ $slot }}
            </div>
        </div>
    </section><!-- #content end -->

@include('frontend.partials.footer')

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- JavaScripts
============================================= -->
<script src="{{ asset('assets/frontend/js/jquery.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins.min.js') }}"></script>

<!-- Footer Scripts
============================================= -->
<script src="{{ asset('assets/frontend/js/functions.js') }}"></script>
@stack('footer-scripts')
</body>
</html>
