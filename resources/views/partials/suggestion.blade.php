<form class="form-horizontal" method="POST" action="{{ route('add-suggestion') }}">
    {{ csrf_field() }}
    <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">

    <div class="form-group">
        <label class="col-sm-2 control-label">{{ __('app.rank') }}</label>
        <div class="col-sm-10">
            <input name="rank" type="text" class="form-control" placeholder="{{ __('app.rank') }}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">{{ __('app.name') }}</label>
        <div class="col-sm-10">
            <input name="name" type="text" class="form-control" placeholder="{{ __('app.name') }}" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">{{ __('app.military_number') }}</label>
        <div class="col-sm-10">
            <input name="military_number" type="text" class="form-control" placeholder="{{ __('app.military_number') }}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">{{ __('app.department') }}</label>
        <div class="col-sm-10">
            <input name="department" type="text" class="form-control" placeholder="{{ __('app.department') }}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">{{ __('app.suggestion') }}</label>
        <div class="col-sm-10">
            <textarea name="suggestion" class="form-control" rows="3" required></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button style="float: left;" type="submit" class="btn btn-default">{{ __('app.send') }} <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
        </div>
    </div>
</form>