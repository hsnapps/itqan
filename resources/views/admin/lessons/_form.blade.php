<!-- title -->
<div class="form-group">
    <label for="name">{{ __('admin.lesson.title') }}</label>
    <input type="text" class="form-control" name="title" id="name" placeholder="{{ __('admin.lesson.title') }}" value="{{ isset($lesson) ? $lesson->title : old('title') }}">
</div>

<!-- header -->
<div class="form-group">
    <label for="header">{{ __('admin.lesson.header') }}</label>
    <input type="text" class="form-control" name="header" id="header" placeholder="{{ __('admin.lesson.header') }}" value="{{ isset($lesson) ? $lesson->header : old('header') }}">
</div>

<!-- instructor -->
<div class="form-group">
    <label for="instructor">{{ __('admin.lesson.instructor') }}</label>
    <select class="form-control" name="instructor" id="instructor" style="font-size: 1.15em;" {{ $selectInstructor ? '' : 'disabled' }}>
        @foreach (App\Instructor::all() as $instructor)
            @if(isset($lesson))
            <option {{ $lesson->instructor_id == $instructor->id ? 'selected' : '' }}  value="{{ $instructor->id }}">{{ $instructor->name }}</option>
            @else
            <option {{ old('instructor') == $instructor->id ? 'selected' : '' }}  value="{{ $instructor->id }}">{{ $instructor->name }}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- category -->
<div class="form-group">
    <label for="category">{{ __('admin.lesson.category') }}</label>
    @if ($course->missionLevel->id == 1)
    <select class="form-control" name="category" id="category" style="font-size: 1.15em;">
        @if(!isset($lesson)) <option value=""></option> @endif
        @foreach (App\Category::all() as $category)
        <option @if(isset($lesson)) {{ $lesson->category_id == $category->id ? 'selected' : '' }}  @endif value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    @else
    <input type="hidden" name="category" value="2">
    <select class="form-control" id="category" style="font-size: 1.15em;" disabled>
        <option value="2">التعليم المرتكز على المهمة</option>
    </select>  
    @endif
</div>

<!-- level -->
<div class="form-group">
    <label for="level">{{ __('admin.lesson.level') }}</label>
    @if ($course->missionLevel->id == 1)
    <select class="form-control" name="level" id="level" style="font-size: 1.15em;">
        @if(!isset($lesson)) <option value=""></option> @endif
        @foreach (App\Level::all() as $level)
        <option @if(isset($lesson)) {{ $lesson->level_id == $level->id ? 'selected' : '' }}  @endif value="{{ $level->id }}">{{ $level->name }}</option>
        @endforeach
    </select>
    @else
    <input type="hidden" name="level" value="1">
    <select class="form-control" id="level" style="font-size: 1.15em;" disabled>
        <option value="1">جميع المستويات</option>
    </select>  
    @endif
</div>

<!-- description -->
<div class="form-group">
    <label for="description">{{ __('admin.lesson.description') }}</label>
    <textarea maxlength="1000" rows="4" class="form-control" name="description" id="description" placeholder="{{ __('admin.lesson.description') }}" style="padding: 10px; font-size: 1.1em;">{!! isset($lesson) ? $lesson->description : old('description') !!}</textarea>
</div>