<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/frontend/imgs/theme/favicon.svg') }}') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css?v=4.0') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link href="https://unpkg.com/primevue/resources/themes/lara-light-indigo/theme.css" rel="stylesheet">
    <link href="https://unpkg.com/primevue/resources/primevue.min.css" rel="stylesheet">
    <link href="https://unpkg.com/primeicons/primeicons.css" rel="stylesheet">

    @stack('head-scripts')
    @inertiaHead
    @routes
</head>

<body>
@include('frontend.partials.header')
@include('frontend.partials.mobile-header')
<!--End header-->
<main class="main pages">
    {{--@include('frontend.partials.breadcrumbs')--}}
    <div class="page-content pt-20 pb-150">
        <div class="container">
            @inertia

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Template  JS -->
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
<script src="{{ asset('assets/frontend/js/shop.js') }}"></script>

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

<script type="text/javascript" src="{{ mix('js/app.js')  }}" defer></script>
</body>
</html>
