@php
    if(!isset($showBack)) {
        $showBack = true;
    }
@endphp

<div class="alert alert-lesson" role="alert" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="auto-style1">
                <span class="auto-style3">
                    <strong>{{ isset($title) ? $title : '' }}</strong>
                </span>
            </h2>
            @if (isset($subtitle))
            <h3 class="auto-style1">{{ $subtitle }}</h3>
            @endif
        </div>
        <div class="col-lg-offset-2 col-lg-2">
            @if ($showBack)
            <a class="btn btn-link" href="{{ isset($route) ? $route : route('index') }}" style="float: left">
                <h3>{{ __('lesson.back') }} <i class="fa fa-arrow-circle-left"></i></h3>
            </a>
            @endif
        </div>
    </div>
</div>


