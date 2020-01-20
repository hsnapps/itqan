@extends('layouts.global')

@push('styles')
<style>
    body{ height: 1200px; }
</style>
@endpush

@section('content')
@if ($course->mission_level_id > 1)
    @include('partials.page-header', ['subtitle' => hindi(__('app.course-lessons', ['count' => count($course->lessons)])), 'route' => route('mission-level', ['missionLevel' => $course->missionLevel])])
@else
    @include('partials.page-header', ['subtitle' => hindi(__('app.course-lessons', ['count' => count($course->lessons)]))])
@endif

@each('partials.lesson_card', $course->lessons, 'lesson', 'partials.no.lessons')
@endsection

@push('scripts')
@if ($course->mission_level_id > 1)
    <script>
        $('#mission-level').addClass('active');
    </script>
@endif
@endpush