<!doctype html>
<html lang="{{ config('app.locale') }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('app.app_name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/all-styles.css') }}">
</head>

<body>
    @include('partials.banner')

    <div class="container" id="#wrapper">
        <div class="jumbotron">
            <h1>403</h1>
            <p>{{ __('errors.403') }}</p>
            <p>
            @if (str_contains(Route::currentRouteName(), 'admin'))
            <a class="btn btn-link btn-lg" href="{{ route('dashboard') }}" role="button"><i class="fa fa-home" aria-hidden="true">  {{ __('errors.back-home') }}</i></a>
            @else
            <a class="btn btn-link btn-lg" href="{{ route('index') }}" role="button"><i class="fa fa-home" aria-hidden="true">  {{ __('errors.back-home') }}</i></a>
            @endif
            </p>
        </div>
    </div>

    @include('partials.footer')

    <script src="{{ mix('js/all-scripts.js') }}" type="text/javascript"></script>
</body>

</html>