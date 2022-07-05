<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ $title }}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/frontend/imgs/theme/favicon.svg') }}') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css?v=4.0') }}" />
    @stack('head-scripts')
</head>

<body>
@include('frontend.partials.header')
@include('frontend.partials.mobile-header')
<!--End header-->
<main class="main pages">
    {{--@include('frontend.partials.breadcrumbs')--}}
    <div class="page-content pt-20 pb-150">
        <div class="container">
            {{ $slot }}
        </div>
    </div>
</main>
@include('frontend.partials.footer')
<!-- Vendor JS-->
<script src="{{ asset('assets/frontend/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/slick.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/jquery.syotimer.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/wow.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/counterup.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/images-loaded.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/jquery.vticker-min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/jquery.theia.sticky.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/jquery.elevatezoom.js') }}"></script>
<!-- Template  JS -->
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
<script src="{{ asset('assets/frontend/js/shop.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-file-uploader"></script>
<script>
    new Vue({
        el: "#app"
    });
</script>
@stack('footer-scripts')
<script>
    window.addEventListener("swal:modal", event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type
        });
    });
    window.addEventListener("swal:confirm", event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.livewire.emit("delete", event.detail.id);
                }
            })
        ;
    });
</script>
@vite('resources/js/app.js')
</body>
</html>
