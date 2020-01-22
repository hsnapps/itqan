<li class="list-group-item">
    <div class="row">
        <div class="col-lg-10">
            <a href="{{ route('admin.lessons.edit', ['lesson' => $lesson]) }}" class="btn btn-link btn-lg">{{ sprintf('%s.  %s', hindi($lesson->lesson_index), $lesson->title) }} (<small style="font-family: Arial, Helvetica, sans-serif">{{ hindi($lesson->header) }}</small>)</a>
        </div>
        <div class="col-lg-2">
            @includeWhen(isset($lesson->image), 'partials.image', ['src' => url('images/lessons/'.$lesson->image), 'w' => 70])
            @includeWhen(!isset($lesson->image), 'partials.image', ['src' => url('images/place-holder.jpg'), 'w' => 70])
        </div>
    </div>
</li>