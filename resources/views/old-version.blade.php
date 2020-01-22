<!doctype html>
<html lang="{{ config('app.locale') }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('app.app_name') }}</title>

    <link rel="stylesheet" href="{{ url('css/all-styles.css') }}">
</head>

<body>
    @include('partials.banner')

    <div class="container" id="#wrapper">
        <div class="jumbotron text-center">
            <h1>{{ __('app.old-version') }}</h1>
        </div>
    </div>

    @include('partials.footer')
</body>

</html>