@extends('layouts.global')

@push('styles')
<style>
    body{ height: 1200px; }
</style>
@endpush

@section('content')
@include('partials.page-header', ['subtitle' => hindi(__('app.course-lessons', ['count' => count($course->lessons)]))])

@each('partials.lesson_card', $course->lessons, 'lesson', 'partials.no.lessons')
@endsection