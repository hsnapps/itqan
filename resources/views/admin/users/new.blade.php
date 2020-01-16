@extends('layouts.admin')

@push('styles')
<style>
    body { height: 1200px; }
    .btn-success, .btn-default, .btn-link, .btn-primary {
        text-align: center !important;
        font-family: itqan-kufi;
        font-size: 1.10em;
    }
    input[type="text"] { padding: 15px; font-size: 1.25em; height: 45px; }
    label { font-size: 1.25em; }
</style>
@endpush

@section('content')
@include('partials.validation')
@include('admin.partials.header', ['route' => route('admin.users'), 'header' => __('admin.user.new'), 'subHeader' => ''])

<form action="{{ route('admin.users.add') }}" method="post">
    {{ csrf_field() }}
    @include('admin.users._form')
    <br />

    @include('admin.partials.submit', ['can' => auth()->user()->canUsers(), 'route' => route('admin.users')])
</form>
@endsection

@push('scripts')
@endpush