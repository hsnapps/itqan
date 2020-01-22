@extends('layouts.admin')

@push('styles')
<style>
    body{ height: 1700px; }
    label {
        padding-top: 15px;
        font-size: 1.15em;
    }
    input[type="text"],
    textarea { padding: 15px; font-size: 1.25em; height: 45px; }
    .btn {
        /* width: 100px; */
        text-align: center !important;
        font-family: itqan-kufi;
        font-size: 1.10em;
    }
    .tab-pane {
        padding: 15px;
        font-size: 1.25em;
    }
</style>
@endpush

@section('content')
@include('partials.validation')
@include('admin.partials.header', ['route' => route('admin.courses.edit', ['course' => $lesson->course, 'tabs' => 'lessons']), 'header' => $lesson->title, 'subHeader' => $lesson->course->name])

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist" id="lesson-tabs">
    <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">{{ __('admin.lesson.info') }}</a></li>
    <li role="presentation"><a href="#questions" aria-controls="questions" role="tab" data-toggle="tab">{{ __('admin.lesson.questions') }} <span class="badge">{{ hindi($lesson->questions->count()) }}</span></a></li>
    <li role="presentation"><a href="#files" aria-controls="files" role="tab" data-toggle="tab">{{ __('admin.lesson.files') }} <span class="badge">{{ hindi($lesson->files->count()) }}</a></li>
    <li role="presentation"><a href="#multimedia" aria-controls="multimedia" role="tab" data-toggle="tab">{{ __('admin.lesson.multimedia') }}</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    {{-- Info --}}
    <div role="tabpanel" class="tab-pane active" id="info">
        <form action="{{ route('admin.lessons.update') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $lesson->id }}">
            @include('admin.lessons._form', ['lesson' => $lesson])

            <br />
            @include('admin.partials.submit', ['can' => true, 'route' => route('admin.courses.edit', ['course' => $lesson->course, 'tab' => 'lessons'])])
            <button id="lesson-delete" class="btn btn-danger" style="float: left;" type="button">{{ __('admin.lesson.delete') }}</a>
        </form>
    </div>

    {{-- Questions --}}
    <div role="tabpanel" class="tab-pane" id="questions">
        @include('admin.lessons.add_question')
        @each('admin.lessons._questions', $lesson->questions, 'question', 'partials.no.questions')
    </div>

    {{-- Files --}}
    <div role="tabpanel" class="tab-pane" id="files">
        @include('admin.lessons.add_file')
        @each('admin.lessons._files', $lesson->files, 'file', 'partials.no.files')
    </div>

    {{-- Multimendia --}}
    <div role="tabpanel" class="tab-pane" id="multimedia">
        @includeWhen($showAlert, 'admin.partials.image-alert', ['alert' => $alert])
        <div class="row">
            <div class="col-lg-6">
                @include('admin.lessons.image_form')
            </div>
            <div class="col-lg-6">
                @include('admin.lessons.video_form')
            </div>
        </div>
    </div>
</div>

<form id="lesson-delete-form" action="{{ route('admin.lessons.delete') }}" method="post">
    <input type="hidden" name="id" value="{{ $lesson->id }}">
    {{ csrf_field() }}
</form>
@endsection

@push('scripts')
<script src="{{ url('js/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('description', {language: 'ar'});
    var tab = $.urlParam('tab');
    if (tab) { $('#lesson-tabs a[href="#'+tab+'"]').tab('show'); }

    $('#remove-image').click(function(){
        var r = confirm("{{ __('admin.lesson.remove-image-confirm') }}");
        if (r) {
            $('#remove-image-form').submit();
        }
    });

    $('#remove-video').click(function(){
        var r = confirm("{{ __('admin.lesson.remove-video-confirm') }}");
        if (r) {
            $('#remove-video-form').submit();
        }
    });

    $('#lesson-delete').click(function(){
        var r = confirm("{{ __('admin.lesson.delete-confirm') }}");
        if (r) {
            $('#lesson-delete-form').submit();
        }
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var tab = $(e.target).attr('aria-controls');
        window.history.pushState(null, document.title, '?tab=' + tab);
    });

    $('[data-question]').click(function(){
        var question = $(this).data('question');
        $('#del_question_' + question).submit();
    });

    $('[data-file]').click(function(){
        var f = $(this).data('file');
        $('#del_file_' + f).submit();
    });

    $('.breadcrumb > li:nth-child(3) a').attr('href', "{{ route('admin.courses.edit', ['course' => $lesson->course, 'tabs' => 'lessons']) }}");
</script>
@endpush