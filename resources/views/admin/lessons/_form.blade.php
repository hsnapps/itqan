<!-- title -->
<div class="form-group">
    <label for="name">{{ __('admin.lesson.title') }}</label>
    <input type="text" class="form-control" name="title" id="name" placeholder="{{ __('admin.lesson.title') }}" value="{{ isset($lesson) ? $lesson->title : '' }}">
</div>

<!-- header -->
<div class="form-group">
    <label for="header">{{ __('admin.lesson.header') }}</label>
    <input type="text" class="form-control" name="header" id="header" placeholder="{{ __('admin.lesson.header') }}" value="{{ isset($lesson) ? $lesson->header : '' }}">
</div>

<!-- instructor -->
<div class="form-group">
    <label for="instructor">{{ __('admin.lesson.instructor') }}</label>
    <select class="form-control" name="instructor" id="instructor" style="font-size: 1.15em;">
        @if(!isset($lesson)) <option value=""></option> @endif
        @foreach (App\Instructor::all() as $instructor)
        <option @if(isset($lesson)) {{ $lesson->instructor_id==$instructor->id?'selected':'' }}  @endif value="{{ $instructor->id }}">{{ $instructor->name }}</option>
        @endforeach
    </select>
</div>

<!-- category -->
<div class="form-group">
    <label for="category">{{ __('admin.lesson.category') }}</label>
    <select class="form-control" name="category" id="category" style="font-size: 1.15em;">
        @if(!isset($lesson)) <option value=""></option> @endif
        @foreach (App\Category::all() as $category)
        <option @if(isset($lesson)) {{ $lesson->category_id == $category->id ? 'selected' : '' }}  @endif value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<!-- level -->
<div class="form-group">
    <label for="level">{{ __('admin.lesson.level') }}</label>
    <select class="form-control" name="level" id="level" style="font-size: 1.15em;">
        @if(!isset($lesson)) <option value=""></option> @endif
        @foreach (App\Level::all() as $level)
        <option @if(isset($lesson)) {{ $lesson->level_id == $level->id ? 'selected' : '' }}  @endif value="{{ $level->id }}">{{ $level->name }}</option>
        @endforeach
    </select>
</div>

<!-- description -->
<div class="form-group">
    <label for="description">{{ __('admin.lesson.description') }}</label>
    <textarea maxlength="1000" rows="4" class="form-control" name="description" id="description" placeholder="{{ __('admin.lesson.description') }}" style="padding: 10px; font-size: 1.1em;">{!! isset($lesson) ? $lesson->description : '' !!}</textarea>
</div>