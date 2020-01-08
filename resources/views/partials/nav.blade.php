<ul class="nav nav-pills">
    <li class="{{ Route::currentRouteName() == 'index' ? 'active' : '' }}"><a href="{{ route('index') }}">{{ __('app.our-courses') }}</a></li>
    <li class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}"><a href="{{ route('about') }}">{{ __('app.about-title') }}</a></li>
    <li class="{{ Route::currentRouteName() == 'mission-level' ? 'active' : '' }}" role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
            aria-expanded="false">
            {{ __('app.mission-training') }} <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            @foreach (App\MissionLevel::all() as $item)
            <li><a href="{{ route('mission-level', ['level' => $loop->index + 1]) }}">{{ $item->name }}</a></li>
            @endforeach
        </ul>
    </li>
    <li class="{{ Route::currentRouteName() == 'multimedia' ? 'active' : '' }}"><a href="{{ route('multimedia') }}">{{ __('app.multimedia') }}</a></li>
    <li style="float: left;">
        <a href="{{ route('dashboard') }}"><i class="fa fa-lock" aria-hidden="true"></i> {{ __('app.admin') }}</a>
    </li>
</ul>