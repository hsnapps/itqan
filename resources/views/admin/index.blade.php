@extends('layouts.admin')

@push('styles')
<style>
    .breadcrumb>li+li:last-of-type:before { content: none; }
    .kufi { font-size: 1.35em }
    .text-large { font-size: 5.0em }
    .panel-footer { padding: 0; }
    .panel-footer .btn { border-radius: 0; width: 100%; }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center kufi">{{ __('admin.courses_count') }}</div>
            <div class="panel-body">
                <p class="text-center text-large text-primary">{{ hindi(count(\App\Course::all())) }}</p>
            </div>
            <div class="panel-footer text-center">
                <a class="btn btn-primary" href="{{ route('admin.courses') }}"><i class="fa fa-link" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center kufi">{{ __('admin.lessons_count') }}</div>
            <div class="panel-body">
                <p class="text-center text-large text-primary">{{ hindi(count(\App\Lesson::all())) }}</p>
            </div>
            <div class="panel-footer text-center">
                <a class="btn btn-primary" href="{{ route('admin.lessons.all') }}"><i class="fa fa-link" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center kufi">{{ __('admin.multimedia_count') }}</div>
            <div class="panel-body">
                <p class="text-center text-large text-primary">{{ hindi(count(\App\MultimediaFile::all())) }}</p>
            </div>
            <div class="panel-footer text-center">
                <a class="btn btn-primary" href="{{ route('admin.multimedia') }}"><i class="fa fa-link" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center kufi">{{ __('admin.users_count') }}</div>
            <div class="panel-body">
                <p class="text-center text-large text-primary">{{ hindi(count(\App\User::all())) }}</p>
            </div>
            <div class="panel-footer text-center">
                <a class="btn btn-primary" href="{{ route('admin.users') }}"><i class="fa fa-link" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush