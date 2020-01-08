<li class="list-group-item">
    <a href="{{ route('admin.lessons.edit', ['lesson' => $lesson]) }}" class="btn btn-link btn-lg">{{ sprintf('%s.  %s', hindi($lesson->lesson_index), $lesson->title) }}</a>
</li>