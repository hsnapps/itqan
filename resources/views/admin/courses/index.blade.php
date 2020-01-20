@extends('layouts.admin')

@push('styles')
    <style>
        body{ min-height: 1200px; }
        .breadcrumb>li+li:last-of-type:before {content: none;}
    </style>
@endpush

@section('content')
    @if (Route::current()->hasParameter('filter'))
        @php
            $filter = Route::current()->parameter('filter');
            if ($filter == 'adfi') {
                $courses = App\Course::where('mission_level_id', '>', 1)->paginate(6);
            } elseif ($filter == 'other') {
                $courses = App\Course::where('mission_level_id', 1)->paginate(6);
            } 
        @endphp
    @endif

    <ul class="nav nav-tabs nav-justified">
        <li role="presentation" class="{{ !isset($filter) ? 'active' : ''}}"><a href="{{ route('admin.courses') }}">{{ __('admin.course.view.all') }}</a></li>
        <li role="presentation" class="{{ isset($filter) && $filter == 'adfi' ? 'active' : ''}}"><a href="{{ route('admin.courses', ['filter' => 'adfi']) }}">{{ __('admin.course.view.adfi') }}</a></li>
        <li role="presentation" class="{{ isset($filter) && $filter == 'other' ? 'active' : ''}}"><a href="{{ route('admin.courses', ['filter' => 'other']) }}">{{ __('admin.course.view.other') }}</a></li>
    </ul>

    <div class="row">
        @if (isset($filter))
            @if ($filter == 'adfi')
                @each('admin.courses.course_card', $courses->where('mission_level_id', '>', 1), 'course', 'partials.no.courses')
            @else
                @each('admin.courses.course_card', $courses->where('mission_level_id', 1), 'course', 'partials.no.courses')
            @endif
        @else
            @each('admin.courses.course_card', $courses, 'course', 'partials.no.courses')
        @endif
    </div>

    <div class="row">
        <div class="text-center">
            @if (isset($filter))
            {{ $courses->links('partials.pagination.bootstrap-4') }}
            @else
            {{ $courses->links('partials.pagination.bootstrap-4') }}
            @endif
        </div>
    </div>    
@endsection

@push('scripts')
    @include('admin.partials.add-btn')
@endpush