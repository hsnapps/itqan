<button type="button" class="btn btn-primary kufi" data-toggle="modal" data-target="#add_question"
    style="font-size: 1.25em; margin-bottom: 10px;">
    <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;{{ __('admin.lesson.add-question') }}
</button>

<!-- Add Question -->
<div class="modal fade" id="add_question" tabindex="-1" role="dialog" aria-labelledby="add_question_label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.lessons.add.question') }}" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="add_question_label">{{ __('admin.lesson.add-question') }}</h4>
                </div>
                <div class="modal-body">
                    @include('admin.lessons._question')
                </div>
                <div class="modal-footer">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $lesson->id }}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('admin.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>