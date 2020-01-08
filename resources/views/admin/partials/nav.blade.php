<ul class="nav nav-pills" style="margin-bottom: 15px">
    <li class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
    </li>

    <li class="{{ str_contains(Route::currentRouteName(), 'admin.courses') ? 'active' : '' }}">
        <a href="{{ route('admin.courses') }}">{{ __('admin.courses') }}</a>
    </li>

    <li class="{{ str_contains(Route::currentRouteName(), 'admin.lessons') ? 'active' : '' }}">
        <a href="{{ route('admin.lessons.all') }}">{{ __('admin.lessons') }}</a>
    </li>

    <li class="{{ str_contains(Route::currentRouteName(), 'admin.multimedia') ? 'active' : '' }}">
        <a href="{{ route('admin.multimedia') }}">{{ __('admin.multimedia') }}</a>
    </li>

    <li class="{{ str_contains(Route::currentRouteName(), 'admin.users') ? 'active' : '' }}">
        <a href="{{ route('admin.users') }}">{{ __('admin.users') }}</a>
    </li>

    <li class="{{ str_contains(Route::currentRouteName(), 'admin.tables') ? 'active' : '' }}">
        <a href="{{ route('admin.tables') }}">{{ __('admin.tables') }}</a>
    </li>

    <li class="{{ str_contains(Route::currentRouteName(), 'profile') ? 'active' : '' }}">
        <a href="{{ route('admin.profile') }}">{{ __('admin.user.profile') }}</a>
    </li>

    <li style="float: left;">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-unlock" aria-hidden="true"></i></i> {{ __('admin.logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }} </form>
    </li>
</ul>