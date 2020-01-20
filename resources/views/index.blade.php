@extends('layouts.global')

@push('styles')
    <style>
        body { height: 1050px; }
    </style>
@endpush

@section('content')
    @each('partials.course_card', App\Course::where('mission_level_id', '!=', 2)->orderBy('updated_at', 'desc')->get(), 'course', 'partials.no.courses')
@endsection

@push('scripts')
    <script>
    $('[data-link]').click(function(){
        var query = $(this).data('link');
        document.location.href = query;
    });
    </script>
@endpush