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
            <h1>{{ __('app.ie-not-allowed') }}</h1>
            <div class="well">
                <p>{{ __('app.use-chrom') }}<i class="fa fa-chrome text-danger" aria-hidden="true"></i>{{ __('app.use-firefox') }} <i class="fa fa-firefox text-danger" aria-hidden="true"></i>{{ __('app.use-safari') }}<i class="fa fa-safari text-primary" aria-hidden="true"></i></p>
            </div>
        </div>
    </div>

    @include('partials.footer')
</body>

</html>