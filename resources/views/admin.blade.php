<!DOCTYPE html>
<html lang="en">
<head>
    <base href="">

    <meta charset="utf-8" />
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <!-- PrimeVue -->
    <link href="https://unpkg.com/primevue@^3/resources/themes/saga-blue/theme.css" rel="stylesheet" />
    <link href="https://unpkg.com/primevue@^3/resources/primevue.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/primeflex@^3/primeflex.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/primeicons/primeicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Dependencies -->
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/primevue@^3/core/core.min.js"></script>

    @inertiaHead
    @routes
</head>

<body class="surface-100">

@inertia

<script type="text/javascript" src="{{ mix('js/app.js')  }}" defer></script>
</body>
</html>
