<tr>
    <td>
        <a class="btn btn-link btn-lg" href="{{ route('admin.lessons.edit', ['lesson' => $lesson]) }}">{{ $lesson->title }}</a>
    </td>
    <td>
        <a class="btn btn-link btn-lg" href="{{ route('admin.courses.edit', ['course' => $lesson->course]) }}">{{ $lesson->course->name }}</a>
    </td>
</tr>