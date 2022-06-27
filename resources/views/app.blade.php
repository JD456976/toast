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

    <link href="https://unpkg.com/primevue/resources/themes/saga-green/theme.css" rel="stylesheet">
    <link href="https://unpkg.com/primevue/resources/primevue.min.css" rel="stylesheet">
    <link href="https://unpkg.com/primeicons/primeicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/primeflex@3.1.2/primeflex.css">


    @stack('head-scripts')
    @inertiaHead
    @routes
</head>

<body>

@inertia


<script type="text/javascript" src="{{ mix('js/app.js')  }}" defer></script>
</body>
</html>
