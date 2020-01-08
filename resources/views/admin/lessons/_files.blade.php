<li class="list-group-item">
    <button type="button" data-toggle="modal" data-target="#file_{{ $file->id }}"
        class="btn btn-link btn-lg"><i class="{{ $file->icon() }}"></i>&nbsp;&nbsp;&nbsp;{{ hindi($file->title) }}</button>
    <a class="btn btn-link btn-lg" href="{{ route('admin.lessons.download.file', ['file' => $file]) }}" style="float: left;"><i class="fa fa-external-link" aria-hidden="true"></i></a>
</li>
<!-- Modal -->
<div class="modal fade" id="file_{{ $file->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.lessons.update.file') }}" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    @include('admin.lessons._file', ['file' => $file])
                </div>
                <div class="modal-footer">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $file->id }}">
                    <button data-file="{{ $file->id }}" type="button" class="btn btn-danger" style="float: right">{{ __('admin.delete') }}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('admin.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
                </div>
            </form>

            <form id="del_file_{{ $file->id }}" action="{{ route('admin.lessons.delete.file') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $file->id }}">
            </form>
        </div>
    </div>
</div>