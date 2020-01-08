<a href="{{ route('course', ['id' => $course->id]) }}">
    <div class="col-sm-4 pointer">
        <div class="card">
            <div class="image">
                @if (isset($course->image))
                <img src="{{ url('images/courses/'.$course->image) }}" alt="place-holder" />
                @else
                <img src="{{ url('images/place-holder.jpg') }}" alt="place-holder" />
                @endif
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