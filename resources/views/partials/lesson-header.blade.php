<div class="alert alert-lesson" role="alert">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="auto-style1">
                <span class="auto-style3">
                    <strong>{{ $lesson->title }}</strong>
                </span>
                <br>
                <span class="auto-style2">
                    {{ $lesson->header }}<br>
                    <a href="{{ route('instructor', ['instructor' => $lesson->instructor]) }}"><i class="fa fa-link"
                            aria-hidden="true"></i>&nbsp;{{ __('lesson.with', ['ins' => $lesson->instructor->name]) }}</a>
                    <a href="{{ route('category', ['category' => $lesson->category]) }}"><i class="fa fa-link"
                            aria-hidden="true"></i>&nbsp;{{ __('lesson.category', ['cat' => $lesson->category->name]) }}</a>
                    <a href="{{ route('level', ['level' => $lesson->level]) }}"><i class="fa fa-link"
                            aria-hidden="true"></i>&nbsp;{{ __('lesson.level', ['lev' => $lesson->level->name]) }}</a>
                </span>
            </h2>
        </div>
        <div class="col-lg-offset-2 col-lg-2">
            <a class="btn btn-link" href="{{ route('course', ['course' => $lesson->course]) }}" style="float: left">
                <h3>{{ __('lesson.back') }} <i class="fa fa-arrow-circle-left"></i></h3>
            </a>
        </div>
    </div>
</div>


