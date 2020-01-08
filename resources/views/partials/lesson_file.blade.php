<li class="list-group-item">
    <a class="text-large" href="{{ url('files/'.$file->file_name) }}" target="_blank">{{ $file->title }} <i style="float: left;" class="{{ $file->icon() }}" aria-hidden="true"></i></a>
</li>