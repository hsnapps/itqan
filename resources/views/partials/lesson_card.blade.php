<a href="{{ route('lesson', ['lesson' => $lesson]) }}">
    <div class="col-sm-4 pointer">
        <div class="card">
            <div class="image">
                @if (isset($lesson->image))
                <img src="{{ url('images/lessons/'.$lesson->image) }}" alt="place-holder" />
                @else
                <img src="{{ url('images/place-holder.jpg') }}" alt="place-holder" />
                @endif
            </div>
            <div class="card-inner">
                <div class="header">
                    <h2>{{ $lesson->title }}</h2>
                </div>
                <div class="content">
                    <p>{{ $lesson->header }}</p>
                </div>
            </div>
        </div>
    </div>
</a>