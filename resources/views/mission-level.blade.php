@extends('layouts.global')

@section('content')
@include('partials.page-header')

@each('partials.course_card', \App\Course::where('mission_level_id', $lev)->orderBy('updated_at', 'desc')->get(), 'course', 'partials.no.courses')
@endsection