@extends('layouts.admin')

@push('styles')
<style>
    th {
        font-family: itqan-kufi;
        font-size: 1.35em;
    }
</style>
@endpush

@section('content')
    @include('partials.lessons-list', ['lessons' => App\Lesson::all()])
@endsection

@push('scripts')
@endpush