@extends('layouts.admin')

@push('styles')
    <style>
        .breadcrumb>li+li:last-of-type:before {content: none;}
    </style>
@endpush

@section('content')
    @each('admin.courses.course_card', App\Course::all(), 'course', 'partials.no.courses')
@endsection

@push('scripts')
    @include('admin.partials.add-btn')
@endpush