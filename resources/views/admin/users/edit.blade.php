@extends('layouts.admin')

@push('styles')
<style>
    body { height: 1350px; }
    .btn {
        text-align: center !important;
        font-family: itqan-kufi;
        font-size: 1.10em;
    }
    .btn-default { margin-left: 5px; }
    input[type="text"] { padding: 15px; font-size: 1.25em; height: 45px; }
    label { font-size: 1.25em; }
</style>
@endpush

@section('content')
@include('partials.validation')
@include('admin.partials.header', ['route' => route('admin.users'), 'header' => $user->name, 'subHeader' => ''])

<form action="{{ route('admin.users.update') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $user->id }}">

    @include('admin.users._form')
    <br />
    @include('admin.partials.submit', ['can' => auth()->user()->canUsers(), 'route' => route('admin.users')])
    <button type="button" class="btn btn-danger text-center left">{{ __('admin.user.delete_user') }}</button>
    <button type="button" class="btn btn-default text-center left" data-toggle="modal" data-target="#change_password_{{ $user->id }}">{{ __('admin.user.change_password') }}</button>
</form>

@include('admin.users.change-password', ['user' => $user])
<form id="delete_user_{{ $user->id }}" action="{{ route('admin.users.delete')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $user->id }}">
</form>
@endsection

@push('scripts')
<script>
    $('.btn-danger').click(function(){
        var userId = "{{ $user->id }}";
        var userName = "{{ $user->name }}";
        var message = "{{ __('admin.user.delete') }}".replace(':name', "{{ $user->name }}");
        var conf = confirm(message);
        if (conf) {
            $('#delete_user_' + userId).submit();
        }
    });
</script>
@endpush