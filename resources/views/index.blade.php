@extends('layouts.global')

@push('styles')
    <style>
        body { height: 1100px; }
    </style>
@endpush

@section('content')
    @include('partials.page-header', ['showBack' => false, 'title' => __('app.our-courses')])

    <div class="row">
        @each('partials.course_card', $courses, 'course', 'partials.no.courses')
    </div>

    <div class="row">
        <div class="text-center">
            {{ $courses->links('partials.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
    $('[data-link]').click(function(){
        var query = $(this).data('link');
        document.location.href = query;
    });
    </script>
@endpush