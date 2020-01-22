<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::group(['middleware' => ['check-agent']], function () {
    Route::view('/', 'index', ['courses' => App\Course::where('mission_level_id', 1)->orderBy('id')->paginate(6)])->name('index');
    Route::view('/about', 'about', ['title' => __('app.about-title')])->name('about');
    Route::get('/get-param/{param?}', function ($param) {
        dd(request()->route()->parameter('param'));
    });
});

Route::get('/course/{course}', 'MainController@viewCourse')->name('course');
Route::get('/lesson/{lesson}', 'MainController@viewLesson')->name('lesson');
Route::get('/instructor/{instructor}', 'MainController@viewInstructor')->name('instructor');
Route::get('/category/{category}', 'MainController@viewCategory')->name('category');
Route::get('/level/{level}', 'MainController@viewLevel')->name('level');
Route::get('/mission-level/{missionLevel}', 'MainController@viewMissionLevel')->name('mission-level');
Route::get('/multimedia', 'MainController@viewMultimedia')->name('multimedia'); 

Route::post('/add-suggestion', 'MainController@addSuggesion')->name('add-suggestion');
Route::post('/evaluate', 'MainController@evaluate')->name('evaluate');

Auth::routes();
Route::group(['middleware' => ['auth', 'check-roles']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::view('/', 'admin.index')->name('dashboard');
        
        Route::group(['prefix' => 'courses'], function () {
            Route::view('/list/{filter?}', 'admin.courses.index', ['courses' => App\Course::paginate(6)])->name('admin.courses');
            // Route::get('/{filter?}', 'Admin\CoursesController@index')->name('admin.courses');
            Route::view('/new', 'admin.courses.new')->name('admin.courses.new');
            Route::get('/{course}', 'Admin\CoursesController@viewCourse')->name('admin.courses.edit');
            Route::get('/lessons/{course}', 'Admin\CoursesController@courseLessons')->name('admin.courses.lessons');
            Route::post('/add', 'Admin\CoursesController@addCourse')->name('admin.courses.add');
            Route::post('/update', 'Admin\CoursesController@updateCourse')->name('admin.courses.update');
            Route::post('/update-image', 'Admin\CoursesController@updateImage')->name('admin.courses.update-image');
            Route::post('/remove-image', 'Admin\CoursesController@removeImage')->name('admin.courses.remove-image');
            Route::post('/delete', 'Admin\CoursesController@deleteCourse')->name('admin.courses.delete');
        });
        
        Route::group(['prefix' => 'lessons'], function () {
            Route::view('/all', 'admin.lessons.all', ['lessons' => App\Lesson::paginate(5)])->name('admin.lessons.all');
            Route::get('/new/{course}', 'Admin\LessonsController@newLesson')->name('admin.lessons.new');
            Route::get('/{lesson}', 'Admin\LessonsController@viewLesson')->name('admin.lessons.edit');
            Route::post('/add', 'Admin\LessonsController@addLesson')->name('admin.lessons.add');
            Route::post('/update', 'Admin\LessonsController@updateLesson')->name('admin.lessons.update');
            Route::post('/delete', 'Admin\LessonsController@deleteLesson')->name('admin.lessons.delete');
            Route::post('/update-multimedia', 'Admin\LessonsController@updateMultimedia')->name('admin.lessons.update.multimedia');
            Route::post('/remove-multimedia', 'Admin\LessonsController@removeMultimedia')->name('admin.lessons.remove-multimedia');
            
            Route::group(['prefix' => 'questions'], function () {
                Route::post('/add', 'Admin\LessonsController@addQuestion')->name('admin.lessons.add.question');
                Route::post('/update', 'Admin\LessonsController@updateQuestion')->name('admin.lessons.update.question');
                Route::post('/delete', 'Admin\LessonsController@deleteQuestion')->name('admin.lessons.delete.question');
            });

            Route::group(['prefix' => 'files'], function () {
                Route::post('/add', 'Admin\LessonsController@addFile')->name('admin.lessons.add.file');
                Route::post('/update', 'Admin\LessonsController@updateFile')->name('admin.lessons.update.file');
                Route::post('/delete', 'Admin\LessonsController@deleteFile')->name('admin.lessons.delete.file');
                Route::get('/download/{file}', 'Admin\LessonsController@downloadFile')->name('admin.lessons.download.file');
            });
        });

        Route::group(['prefix' => 'multimedia'], function () {
            Route::view('/', 'admin.multimedia.index', ['files' => App\MultimediaFile::all()])->name('admin.multimedia');
            Route::view('/new', 'admin.multimedia.new')->name('admin.multimedia.new');
            Route::get('/{file}', 'Admin\MultimediaController@viewMultimedia')->name('admin.multimedia.edit');
            Route::post('/add', 'Admin\MultimediaController@addMultimedia')->name('admin.multimedia.add');
            Route::post('/update', 'Admin\MultimediaController@updateMultimedia')->name('admin.multimedia.update');
            Route::post('/delete', 'Admin\MultimediaController@deleteMultimedia')->name('admin.multimedia.delete');
        });

        Route::group(['prefix' => 'users'], function () {
            Route::view('/', 'admin.users.index', ['users' => App\Course::all()])->name('admin.users');
            Route::view('/new', 'admin.users.new')->name('admin.users.new');
            Route::get('/{user}', 'Admin\UsersController@viewUser')->name('admin.users.edit');
            Route::post('/add', 'Admin\UsersController@addUser')->name('admin.users.add');
            Route::post('/update', 'Admin\UsersController@updateUser')->name('admin.users.update');
            Route::post('/delete', 'Admin\UsersController@deleteUser')->name('admin.users.delete');

            Route::post('/change-password', 'Admin\UsersController@changePassword')->name('admin.users.change_password');
        });

        Route::view('/profile', 'admin.users.profile')->name('admin.profile');
                
        Route::group(['prefix' => 'tables'], function () {
            Route::view('/', 'admin.tables')->name('admin.tables');
            
            Route::post('update', function (Request $request) {
                DB::table($request->table)->where('id', $request->id)->update(['name' => $request->name]);
                return back()->with('success', __('admin.table-saved'));
            })->name('admin.tables.update');
            
            Route::post('delete', function (Request $request) {
                DB::table($request->table)->where('id', $request->id)->delete();
                return back()->with('success', __('admin.table-saved'));
            })->name('admin.tables.delete');
            
            Route::post('add', function (Request $request) {
                DB::table($request->table)->insert(['name' => $request->name]);
                return back()->with('success', __('admin.table-saved'));
            })->name('admin.tables.add');
        });
        
        Route::get('add-button', function (Request $request) {
            $route = $request->route;
            $text = __('admin.add');
            return "<li style='float: left;'><button data-link='$route' class='btn btn-primary'><i class='fa fa-plus'></i>&nbsp;&nbsp;$text</button></li>";
        })->name('add-button');
    });
});



Route::view('/ie-not-allowed', 'ie-not-allowed')->name('ie-not-allowed');
Route::view('/old-version', 'old-version')->name('old-version');