<a href="{{ route('course', ['id' => $course->id]) }}">
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
                <div class="content">
                    <p>{{ $course->description }}</p>
                </div>
            </div>
        </div>
    </div>
</a>