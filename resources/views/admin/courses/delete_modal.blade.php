<!-- Modal -->
<div class="modal fade" id="delete_{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="lable_{{ $course->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.courses.delete') }}" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="lable_{{ $course->id }}">{{ __('admin.course.delete') }}</h4>
                </div>
                <div class="modal-body">
                    <h3>{{ __('admin.course.delete_question', ['name' => $course->name]) }}</h3>
                    <input type="hidden" name="id" value="{{ $course->id }}">
                    {{ csrf_field() }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('admin.cancel') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('admin.delete') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>