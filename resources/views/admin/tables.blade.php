@extends('layouts.admin')

@push('styles')
<style>
    body { height: 1350px; }
    .btn {
        text-align: center !important;
        font-family: itqan-kufi;
        font-size: 1.10em;
    }
    td,input[type="text"] { padding: 15px; font-size: 1.2em; height: 35px; }
    label { font-size: 1.25em; }
    .btn-group-sm { margin-bottom: 4px;}
</style>
@endpush

@section('content')
@include('partials.validation')
@include('admin.partials.header', ['route' => route('dashboard'), 'header' => __('admin.tables'), 'subHeader' => ''])

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist" id="tables-tabs">
    @foreach (__('admin.table') as $key => $value)
    <li role="presentation"><a href="#{{ $key }}" aria-controls="{{ $key }}" role="tab" data-toggle="tab">{{ $value }}</a></li>    
    @endforeach
</ul>

<!-- Tab panes -->
<div class="tab-content">
    @foreach (__('admin.table') as $key => $value)
    <div role="tabpanel" class="tab-pane" id="{{ $key }}">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('admin.caption') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">{{ __('admin.new') }}</td>
                    <td>
                        <form action="{{ route('admin.tables.add') }}" method="post">
                            <input type="text" name="name" id="name_{{ $key }}" style="width: 400px !important;">
                    
                            <div class="btn-group btn-group-sm" role="group" aria-label="commands">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                            </div>

                            {{ csrf_field() }}
                            <input type="hidden" name="table" value="{{ $key }}">
                        </form>
                    </td>
                </tr>
                @foreach (DB::table($key)->distinct()->get() as $item)
                <tr>
                    <td scope="row">{{ hindi($loop->index + 1) }}</td>
                    <td>
                        <form action="{{ route('admin.tables.update') }}" method="post">
                            <input type="text" name="name" id="name_{{ sprintf('%s_%s', $key, $item->id) }}" value="{{ $item->name }}" style="width: 400px !important;">
                    
                            <div class="btn-group btn-group-sm" role="group" aria-label="commands">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                                <button type="button" class="btn btn-danger" data-name="{{ $item->name }}" data-table="{{ $key }}" data-id="{{ $item->id }}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </div>

                            {{ csrf_field() }}
                            <input type="hidden" name="table" value="{{ $key }}">
                            <input type="hidden" name="id" value="{{ $item->id }}">
                        </form>

                        <form id="delete_rec_{{ sprintf('%s_%s', $key, $item->id) }}" action="{{ route('admin.tables.delete') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="table" value="{{ $key }}">
                            <input type="hidden" name="id" value="{{ $item->id }}">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach
</div>
@endsection

@push('scripts')
<script>
    $('#tables-tabs a[href="#categories"]').tab('show');

    var tab = $.urlParam('tab');
    if (tab) { $('#tables-tabs a[href="#'+tab+'"]').tab('show'); }

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var tab = $(e.target).attr('aria-controls');
        window.history.pushState(null, document.title, '?tab=' + tab);
    });

    $('.btn-danger').click(function(){
        var value = $(this).data('name');
        var id = $(this).data('id');
        var table = $(this).data('table');
        var message = "{!! __('admin.delete-confirm') !!}".replace('***', value);
        var conf = confirm(message);
        if (conf) {
            $('#delete_rec_' + table + '_' + id).submit();
        }
    });
</script>
@endpush