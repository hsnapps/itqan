@extends('layouts.admin')

@push('styles')
<style>
    th {
        font-family: itqan-kufi;
        font-size: 1.35em;
    }
    body{height: 1000px;}
</style>
@endpush

@section('content')
    @include('partials.lessons-list', ['lessons' => $lessons])

    {{ $lessons->links('partials.pagination.bootstrap-4') }}
@endsection

@push('scripts')
@endpush