@extends('layouts.global')

@section('content')
@include('partials.page-header', ['subtitle' => __('lesson.list')])

@include('partials.lessons-list', ['lessons' => $lev->lessons])
@endsection