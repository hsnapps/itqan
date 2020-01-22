<a href="{{ route('admin.courses.edit', ['course' => $course->id]) }}">
    <div class="col-sm-4 pointer">
        <div class="card">
            <div class="image">
                @includeWhen(isset($course->image), 'partials.image', ['src' => url('images/courses/'.$course->image), 'w' => 320])
                @includeWhen(!isset($course->image), 'partials.image', ['src' => url('images/place-holder.jpg'), 'w' => 320])
            </div>
            <div class="card-inner">
                <div class="header">
                    <h2>{{ $course->name }}</h2>
                </div>
                @if (auth()->user()->canCourses())
                <div class="btn-group" role="group" aria-label="...">
                    <a href="{{ route('admin.courses.edit', ['course' => $course]) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="{{ route('admin.courses.edit', ['course' => $course, 'tab' => 'lessons']) }}" class="btn btn-success"><i class="fa fa-list" aria-hidden="true"></i></a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_{{ $course->id }}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                </div>
                @include('admin.courses.delete_modal')
                @endif
            </div>
        </div>
    </div>
</a>