<?php

// Dashboard
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push(__('admin.dashboard'), route('dashboard'));
});

// Dashboard \ Courses
Breadcrumbs::register('admin.courses', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(__('admin.courses'), route('admin.courses'));
});

// Dashboard \ Courses \ New
Breadcrumbs::register('admin.courses.new', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.courses');
    $breadcrumbs->push(__('admin.course.new'), route('admin.courses.new'));
});

// Dashboard \ Courses \ Edit
Breadcrumbs::register('admin.courses.edit', function ($breadcrumbs) {
    $course = Route::current()->parameter('course');
    $breadcrumbs->parent('admin.courses');
    $breadcrumbs->push(__('admin.course.edit'), route('admin.courses.edit', [ 'course' => $course]));
});
// -------------------------------------------------------------------------------------

// Dashboard \ Lessons
Breadcrumbs::register('admin.courses.lessons', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.courses.edit');
    $course = Route::current()->parameter('course');
    $breadcrumbs->push(__('admin.lessons'), route('admin.courses.lessons', [ 'course' => $course]));
});

// Dashboard \ Lessons All
Breadcrumbs::register('admin.lessons.all', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(__('admin.lessons'), route('admin.lessons.all'));
});

// Dashboard \ Lessons \ New
Breadcrumbs::register('admin.lessons.new', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.courses.edit');
    $course = Route::current()->parameter('course');
    $breadcrumbs->push(__('admin.lesson.new'), route('admin.lessons.new', [ 'course' => $course]));
});

// Dashboard \ Lessons \ Edit
Breadcrumbs::register('admin.lessons.edit', function ($breadcrumbs) {
    $lesson = Route::current()->parameter('lesson');
    $breadcrumbs->parent('admin.courses.edit', ['course' => $lesson->course->id, 'tabs' => 'lessons']);
    $breadcrumbs->push(__('admin.lesson.edit'), route('admin.lessons.edit', ['lesson' => $lesson]));
});
// -------------------------------------------------------------------------------------

// Dashboard \ Multimedia
Breadcrumbs::register('admin.multimedia', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(__('admin.multimedia'), route('admin.multimedia'));
}); //multimedia-file

// Dashboard \ Multimedia \ New
Breadcrumbs::register('admin.multimedia.new', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.multimedia');
    $breadcrumbs->push(__('admin.multimedia-file.new'), route('admin.multimedia.new'));
});

// Dashboard \ Multimedia \ Edit
Breadcrumbs::register('admin.multimedia.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.multimedia');
    $file = Route::current()->parameter('file');
    $breadcrumbs->push(__('admin.multimedia-file.edit'), route('admin.multimedia.edit', $file));
});
// -------------------------------------------------------------------------------------

// Dashboard \ Users
Breadcrumbs::register('admin.users', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(__('admin.users'), route('admin.users'));
});

// Dashboard \ Users \ New
Breadcrumbs::register('admin.users.new', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.users');
    $breadcrumbs->push(__('admin.user.new'), route('admin.users.new'));
});

// Dashboard \ Users \ Edit
Breadcrumbs::register('admin.users.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.users');
    $user = Route::current()->parameter('user');
    $breadcrumbs->push(__('admin.user.edit'), route('admin.users.edit', $user));
});

// Dashboard \ Profile
Breadcrumbs::register('admin.profile', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(__('admin.user.profile'), route('admin.profile'));
});

// Dashboard \ Tables
Breadcrumbs::register('admin.tables', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(__('admin.tables'), route('admin.tables'));
});
// -------------------------------------------------------------------------------------