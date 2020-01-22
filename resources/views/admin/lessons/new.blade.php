@extends('layouts.admin')

@push('styles')
<style>
    body{ height: 2000px; }
    label {
        padding: 15px;
        font-size: 1.25em;
    }
    input[type="text"],
    textarea { padding: 15px; font-size: 1.25em; height: 45px; }
    .btn-success, .btn-default, .btn-link {
        width: 100px;
        text-align: center !important;
        font-family: itqan-kufi;
        font-size: 1.10em;
    }
</style>
@endpush

@section('content')
@include('partials.validation')

@include('admin.partials.header', ['route' => route('admin.courses.edit', ['course' => $course, 'tabs' => 'lessons']), 'header' => $course->name, 'subHeader' => $course->category->name])

<form action="{{ route('admin.lessons.add') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="course_id" value="{{ $course->id }}">

    @include('admin.lessons._form')

    <br />
    @include('admin.partials.submit', ['can' => true, 'route' => route('admin.courses.edit', ['course' => $course, 'tab' => 'lessons'])])
</form>
@endsection

@push('scripts')
<script src="{{ url('js/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('description', {language: 'ar'});
</script>
@endpush