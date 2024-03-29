@includeWhen($showAlert, 'admin.partials.image-alert', ['alert' => $alert])

<form action="{{ route('admin.courses.update-image') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $course->id }}">

    <div class="form-group">
        @includeWhen(isset($course->image), 'partials.image', ['src' => url('images/courses/'.$course->image), 'w' => 640])
        @includeWhen(!isset($course->image), 'partials.image', ['src' => url('images/place-holder.jpg'), 'w' => 640])
    </div>
    <div class="form-group">
        <label for="image">{{ __('admin.course.change-image') }}</label>
        <input type="file" id="image" name="image" required>
        <p class="help-block">{{ __('admin.course.image-help-block') }}</p>
    </div>

    <br />
    <button type="submit" {{ auth()->user()->canCourses() ? '' : 'disabled' }} class="btn btn-success text-center">{{ __('admin.save') }}</button>
    <button type="button" id="remove-image" {{ auth()->user()->canCourses() ? '' : 'disabled' }} class="btn btn-default text-center">{{ __('admin.course.remove-image') }}</button>
</form>

<form id="remove-image-form" action="{{ route('admin.courses.remove-image') }}" method="post">
    <input type="hidden" name="id" value="{{ $course->id }}">
    {{ csrf_field() }}
</form>