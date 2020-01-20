<ul class="nav nav-pills">
    <li class="{{ Route::currentRouteName() == 'index' ? 'active' : '' }}"><a href="{{ route('index') }}">{{ __('app.our-courses') }}</a></li>
    <li class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}"><a href="{{ route('about') }}">{{ __('app.about-title') }}</a></li>
    <li id="mission-level" class="{{ Route::currentRouteName() == 'mission-level' ? 'active' : '' }}" role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
            aria-expanded="false">
            {{ __('app.mission-training') }} <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            @foreach (App\MissionLevel::where('id', '!=', 1)->orderBy('id')->get() as $item)
            <li><a href="{{ route('mission-level', ['level' => $item->id]) }}">{{ $item->name }}</a></li>
            @endforeach
        </ul>
    </li>
    <li id="multimedia" class="{{ Route::currentRouteName() == 'multimedia' ? 'active' : '' }}"><a href="{{ route('multimedia') }}">{{ __('app.multimedia') }}</a></li>
    <li style="float: left;">
        <a href="{{ route('dashboard') }}"><i class="fa fa-lock" aria-hidden="true"></i> {{ __('app.admin') }}</a>
    </li>
</ul>