<div class="form-group">
    <label>{{ __('admin.lesson.file_title') }}</label>
    <input class="form-control" name="title" type="text" maxlength="50" value="{{ isset($file) ? $file->title : '' }}">
</div>

<div class="form-group">
    <label>{{ __('admin.lesson.file_description') }}</label>
    <textarea class="form-control" name="description" maxlength="250">{{ isset($file) ? $file->description : '' }}</textarea>
</div>

@if (!isset($file))
<div class="form-group">
    <label>{{ __('admin.lesson.select_file') }}</label>
    <input type="file" name="file">
    <p class="help-block">{{ __('admin.lesson.file_help') }}</p>
</div>
@endif
