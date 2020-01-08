<!doctype html>
<html lang="{{ config('app.locale') }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('app.app_name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/all-styles.css') }}">
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
    @stack('styles')
</head>

<body>
    @include('partials.banner')

    <div class="container" id="#wrapper">
        @include('admin.partials.nav')
        @include('partials.flashes')
        <!-- Breadcrumbs -->
        {{ Breadcrumbs::render(Route::currentRouteName()) }}
        @yield('content')
    </div>

    @include('partials.footer')

    <script src="{{ mix('js/all-scripts.js') }}" type="text/javascript"></script>
    @stack('scripts')
</body>

</html>