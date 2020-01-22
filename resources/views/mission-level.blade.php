@extends('layouts.global')

@push('styles')
    <style>
        body{ min-height: 1200px; }
    </style>
@endpush

@section('content')
    @include('partials.page-header', ['showBack' => false])
    
    <div class="row">
        @each('partials.course_card', $courses, 'course', 'partials.no.courses')
    </div>

    <div class="row">
        {{ $courses->links() }}
    </div>
@endsection