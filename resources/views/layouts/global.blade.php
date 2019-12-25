<!doctype html>
<html lang="{{ config('app.locale') }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('app.app_name') }}</title>

    <link href="{{ url('css/bootstrap.3.3.7.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/bootstrap-rtl.3.3.4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/font-awesome.4.7.0.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css" />
    @stack('styles')
</head>

<body>
    @include('partials.nav')

    <div class="container">
        @yield('content')
    </div>

    @include('partials.footer')

    <script src="{{ url('js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/bootstrap.3.3.7.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/app.js') }}" type="text/javascript"></script>
    @stack('scripts')
</body>

</html>