@extends('layouts.admin')

@push('styles')
<style>
    body{ height: {{ 900 +  (70 * $course->lessons->count()) }}px; }
    .tab-pane {
        padding: 15px;
        font-size: 1.25em;
    }
    .tab-pane input[type="text"],
    textarea { padding: 15px; font-size: 1.25em; height: 45px; }
    .btn-success, .btn-default, .btn-link {
        width: 100px;
        text-align: center !important;
        font-family: itqan-kufi;
        font-size: 1.10em;
    }
    #remove-image {
        width: 150px;
    }
</style>
@endpush

@section('content')
@include('partials.validation')
@include('admin.partials.header', ['route' => route('admin.courses'), 'header' => $course->name, 'subHeader' => $course->category->name])

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist" id="course-tabs">
    <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">{{ __('admin.course.info') }}</a></li>
    <li role="presentation"><a href="#lessons" aria-controls="lessons" role="tab" data-toggle="tab">{{ __('admin.course.lessons') }} <span class="badge">{{ hindi($course->lessons->count()) }}</span></a></li>
    <li role="presentation"><a href="#image" aria-controls="image" role="tab" data-toggle="tab">{{ __('admin.course.image') }}</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <!-- Course Info -->
    <div role="tabpanel" class="tab-pane active" id="info">
        @include('admin.courses.course_form', ['route' => route('admin.courses.update')])
    </div>

    <!-- Lessons List -->
    <div role="tabpanel" class="tab-pane" id="lessons">
        <a href="{{ route('admin.lessons.new', ['course' => $course]) }}" class="btn btn-primary kufi" style="font-size: 1.25em; margin-bottom: 10px;">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;{{ __('admin.course.add-lesson') }}
        </a>
        <ul class="list-group">
            @each('admin.courses._lessons', $course->lessons->sortBy('lesson_index'), 'lesson', 'partials.no.lessons')
        </ul>
    </div>

    <!-- Course Image -->
    <div role="tabpanel" class="tab-pane" id="image">
        @include('admin.courses.image_form')
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('#remove-image').click(function(){
        var r = confirm("{{ __('admin.course.remove-image-confirm') }}");
        if (r) {
            $('#remove-image-form').submit();
        }
    });

    var tab = $.urlParam('tabs');
    if (tab) {
        $('#course-tabs a[href="#'+tab+'"]').tab('show');
    }

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var tab = $(e.target).attr('aria-controls');
        window.history.pushState(null, document.title, '?tabs=' + tab);
    });
</script>
@endpush