@extends('layouts.admin')

@php
    $user = auth()->user();
@endphp

@push('styles')
<style>
    body { height: 1350px; }
    .btn {
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
@include('admin.partials.header', ['route' => route('dashboard'), 'header' => $user->name, 'subHeader' => __('admin.user.profile')])

<form action="{{ route('admin.users.update') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $user->id }}">

    @include('admin.users._form', ['user' => $user])
    <br />
    <button type="submit" class="btn btn-success text-center">{{ __('admin.save') }}</button>
    <button type="button" class="btn btn-default text-center" data-toggle="modal" data-target="#change_password">{{ __('admin.user.change_password') }}</button>
</form>

@include('admin.users.change-password', ['user' => $user])
<form id="delete_user_{{ $user->id }}" action="{{ route('admin.users.delete')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $user->id }}">
</form>
@endsection

@push('scripts')
<script>
$(':checkbox').each(function(){
    $(this).prop('disabled', true);
});
</script>
@endpush