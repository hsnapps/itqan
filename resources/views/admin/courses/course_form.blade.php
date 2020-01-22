<form action="{{ $route }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $course->id }}">

    <div class="form-group">
        <label for="name">{{ __('admin.course.name') }}</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('admin.course.name') }}" value="{{ $course->name }}">
    </div>

    <div class="form-group">
        <label for="category">{{ __('admin.course.category') }}</label>
        <select class="form-control" name="category" id="category" style="font-size: 1.1em;">
            @foreach (App\Category::all() as $category)
            <option @if($category->id == $course->category_id) {{ 'selected' }} @endif value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="description">{{ __('admin.course.description') }}</label>
        <textarea maxlength="1000" rows="3" class="form-control" name="description" id="description" style="padding: 10px; font-size: 1.1em;">{{ $course->description }}</textarea>
    </div>

    <br />
    @include('admin.partials.submit', ['can' => true, 'route' => route('admin.courses')])
</form>