<tr>
    <td>
        <a class="btn btn-link btn-lg" href="{{ route('admin.lessons.edit', ['lesson' => $lesson]) }}">{{ $lesson->title }}</a>
    </td>
    <td>
        <a class="btn btn-link btn-lg" href="{{ route('admin.courses.edit', ['course' => $lesson->course]) }}">{{ $lesson->course->name }}</a>
    </td>
    <td>
        @if (isset($lesson->image))
        <img src="{{ url('images/lessons/'.$lesson->image) }}" class="img-responsive" alt="{{ __('admin.lessons.image') }}" height="40" width="71">
        @else
        <img src="{{ url('images/place-holder.jpg') }}" class="img-responsive " alt="{{ __('admin.lessons.image') }}" height="40" width="71">
        @endif
    </td>
</tr>