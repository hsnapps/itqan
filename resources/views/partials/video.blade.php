<video id="lesson_video" controls width="100%">
    <source src="{{ url('videos/'.$lesson->video) }}" type="video/mp4">
    {{ __('app.video-not-supported') }}
</video>