<form action="{{ route('admin.lessons.update.multimedia') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $lesson->id }}">

    <div class="form-group">
        @includeWhen(isset($lesson->video), 'partials.video')
        @includeWhen(!isset($lesson->video), 'partials.image', ['src' => url('images/video-place-holder.png'), 'w' => 540, 'h' => 303.75])
    </div>
    <div class="form-group">
        <label for="video">{{ __('admin.lesson.change-video') }}</label>
        <input type="file" id="video" name="file" required>
        <p class="help-block">{{ __('admin.lesson.video-help-block') }}</p>
    </div>
    <input type="hidden" name="type" value="video">

    <br />
    <button type="submit" {{ auth()->user()->canCourses() ? '' : 'disabled' }} class="btn btn-success text-center">{{ __('admin.save') }}</button>
    <button type="button" id="remove-video" {{ auth()->user()->canCourses() ? '' : 'disabled' }} class="btn btn-default text-center">{{ __('admin.lesson.remove-video') }}</button>
</form>

<form id="remove-video-form" action="{{ route('admin.lessons.remove-multimedia') }}" method="post">
    <input type="hidden" name="id" value="{{ $lesson->id }}">
    <input type="hidden" name="type" value="video">
    {{ csrf_field() }}
</form>