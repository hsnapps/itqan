@extends('layouts.admin')

@push('styles')
    <style>
        /* .breadcrumb>li+li:last-of-type:before {content: none;} */
        td {font-size: 1.25em;}
        th {font-family: itqan-kufi; font-size: 1.25em;}
        .btn { font-family: itqan-kufi; }
        .fa-2x {
            cursor: pointer;
        }
        .filter{
            padding-bottom: 22px;
        }
    </style>
@endpush

@section('content')
<div class="container">
    @if (Route::currentRouteName() == 'admin.suggestions.all')
        <i class="fa fa-check-square-o fa-2x text-primary" aria-hidden="true"></i><a class="btn btn-link btn-lg filter" href="{{ route('admin.suggestions') }}">{{ __('admin.suggestions.with-trashed') }}</a>
    @else
        <i class="fa fa-square-o fa-2x text-primary" aria-hidden="true"></i><a class="btn btn-link btn-lg filter" href="{{ route('admin.suggestions.all') }}">{{ __('admin.suggestions.with-trashed') }}</a>
    @endif
</div>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th>{{ __('admin.suggestions.name') }}</th>
            <th>{{ __('admin.suggestions.department') }}</th>
            <th>{{ __('admin.suggestions.date') }}</th>
            <th>{{ __('admin.suggestions.suggestion') }}</th>
            <th>{{ __('admin.suggestions.notes') }}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($suggestions as $suggestion)
        <tr>
            <td>
                @if ($suggestion->deleted_at)
                <span class="label label-warning">{{ __('admin.suggestions.is-deleted') }}</span>
                @endif
            </td>
            <td scope="row">{{ hindi($loop->index + 1) }}</td>
            <td>{{ $suggestion->getRankName() }}</td>
            <td>{{ $suggestion->department }}</td>
            <td>{{ hindi($suggestion->created_at->format(env('DATE_FORMAT'))) }}</td>
            <td>{!! $suggestion->getSuggestion() !!}</td>
            <td>{!! $suggestion->getNotes() !!}</td>
            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="commands">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#show_{{ $suggestion->id }}"><i class="fa fa-search " aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-danger" data-name="{{ $suggestion->getRankName() }}" data-id="{{ $suggestion->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </div>

                @include('admin.suggestions.show') 
                <form id="delete_{{ $suggestion->id }}" action="{{ route('admin.suggestions.delete')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $suggestion->id }}">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="text-center">
    {{ $suggestions->links('partials.pagination.bootstrap-4') }}
</div>
@endsection

@push('scripts')
<script>
    $('.btn-danger').click(function(){
        var id = $(this).data('id');
        var name = $(this).data('name');
        var message = "{{ __('admin.suggestions.delete') }}".replace(':name', name);
        var conf = confirm(message);
        if (conf) {
            $('#delete_' + id).submit();
        }
    });

    $('.fa-2x').click(function(){
        document.location.assign($(this).next('a').attr('href'));
    });
</script>
@endpush