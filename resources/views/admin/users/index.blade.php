@extends('layouts.admin')

@push('styles')
    <style>
        .breadcrumb>li+li:last-of-type:before {content: none;}
        td {font-size: 1.25em;}
        th {font-family: itqan-kufi; font-size: 1.25em;}
    </style>
@endpush

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>{{ __('admin.user.name') }}</th>
            <th>{{ __('admin.user.email') }}</th>
            <th>{{ __('admin.user.department') }}</th>
            <th>{{ __('admin.user.section') }}</th>
            <th>{{ __('admin.user.ad_group') }}</th>
            <th>{{ __('admin.user.ad_name') }}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach (App\User::all() as $user)
        <tr>
            <td scope="row">{{ hindi($loop->index + 1) }}</td>
            <td><a href="{{ route('admin.users.edit', ['user' => $user]) }}">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->department }}</td>
            <td>{{ $user->section }}</td>
            <td>{{ $user->ad_group }}</td>
            <td>{{ $user->ad_name }}</td>
            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="commands">
                    <a href="{{ route('admin.users.edit', ['user' => $user]) }}" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#change_password_{{ $user->id }}"><i class="fa fa-lock" aria-hidden="true"></i></a>
                    <button type="button" class="btn btn-danger" data-name="{{ $user->name }}" data-id="{{ $user->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </div>
                @include('admin.users.change-password', ['user' => $user])
                <form id="delete_user_{{ $user->id }}" action="{{ route('admin.users.delete')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $user->id }}">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@push('scripts')
@include('admin.partials.add-btn')
<script>
    $('.btn-danger').click(function(){
        var userId = $(this).data('id');
        var userName = $(this).data('name');
        var message = "{{ __('admin.user.delete') }}".replace(':name', userName);
        var conf = confirm(message);
        if (conf) {
            $('#delete_user_' + userId).submit();
        }
    });
</script>
@endpush