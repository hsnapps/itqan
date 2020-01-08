@extends('layouts.global')

@section('content')
    @each('partials.course_card', App\Course::all(), 'course', 'partials.no.courses')
@endsection

@push('scripts')
    <script>
    $('[data-link]').click(function(){
        var query = $(this).data('link');
        document.location.href = query;
    });
    </script>
@endpush