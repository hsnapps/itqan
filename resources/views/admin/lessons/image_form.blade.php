<form action="{{ route('admin.lessons.update.multimedia') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $lesson->id }}">

    <div class="form-group">
        <img src="{{ url('images/lessons/'.$lesson->image) }}" class="img-responsive" alt="{{ __('admin.lessons.image') }}">
    </div>
    <div class="form-group">
        <label for="image">{{ __('admin.lesson.change-image') }}</label>
        <input type="file" id="image" name="file" required>
        <p class="help-block">{{ __('admin.course.image-help-block') }}</p>
    </div>

    <input type="hidden" name="type" value="image">
    <br />
    <button type="submit" {{ auth()->user()->canCourses() ? '' : 'disabled' }} class="btn btn-success text-center">{{ __('admin.save') }}</button>
    <button type="button" id="remove-image" {{ auth()->user()->canCourses() ? '' : 'disabled' }} class="btn btn-default text-center">{{ __('admin.lesson.remove-image') }}</button>
</form>

<form id="remove-image-form" action="{{ route('admin.lessons.remove-multimedia') }}" method="post">
    <input type="hidden" name="id" value="{{ $lesson->id }}">
    <input type="hidden" name="type" value="image">
    {{ csrf_field() }}
</form>