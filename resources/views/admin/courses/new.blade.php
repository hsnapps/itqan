@extends('layouts.admin')

@push('styles')
<style>
    body{ height: 1500px; }
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

<form action="{{ route('admin.courses.add') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">{{ __('admin.course.name') }}</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('admin.course.name') }}" maxlength="50">
    </div>

    <div class="form-group">
        <label for="category">{{ __('admin.course.category') }}</label>
        <select class="form-control" name="category" id="category" style="font-size: 1.15em;">
            @foreach (App\Category::all() as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="description">{{ __('admin.course.description') }}</label>
        <textarea maxlength="1000" rows="3" class="form-control" name="description" id="description" style="padding: 10px; font-size: 1.1em;"></textarea>
    </div>

    <div class="form-group">
        <img src="{{ url('images/place-holder.png') }}" class="img-responsive" alt="{{ __('admin.course.image') }}">
    </div>
    <div class="form-group">
        <label for="image">{{ __('admin.course.change-image') }}</label>
        <input type="file" id="image" name="image" required>
        <p class="help-block">{{ __('admin.course.image-help-block') }}</p>
    </div>

    <br />
    <button type="submit" {{ auth()->user()->canCourses() ? '' : 'disabled' }} class="btn btn-success text-center">{{ __('admin.save') }}</button>
    <a class="btn btn-link text-muted" href="{{ route('admin.courses') }}">{{ __('admin.cancel') }}</a>
</form>
@endsection

@push('scripts')
@endpush