<li class="list-group-item">
    <button type="button" data-toggle="modal" data-target="#question_{{ $question->id }}"
        class="btn btn-link btn-lg">{{ sprintf('%s.  %s', hindi($question->question_index), str_limit($question->question, 120)) }}</button>
</li>
<!-- Modal -->
<div class="modal fade" id="question_{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.lessons.update.question') }}" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    @include('admin.lessons._question', ['question' => $question])
                </div>
                <div class="modal-footer">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $question->id }}">
                    <button data-question="{{ $question->id }}" type="button" class="btn btn-danger" style="float: right">{{ __('admin.delete') }}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('admin.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
                </div>
            </form>

            <form id="del_question_{{ $question->id }}" action="{{ route('admin.lessons.delete.question') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $question->id }}">
            </form>
        </div>
    </div>
</div>