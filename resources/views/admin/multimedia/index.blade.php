@extends('layouts.admin')

@push('styles')
    <style>
        .breadcrumb>li+li:last-of-type:before {content: none;}
    </style>
@endpush

@section('content')
        
@endsection

@push('scripts')
    @include('admin.partials.add-btn')
@endpush