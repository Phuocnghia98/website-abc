<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/course'], function (Router $router) {
    $router->bind('coursecate', function ($id) {
        return app('Modules\Course\Repositories\CourseCateRepository')->find($id);
    });
    $router->get('coursecates', [
        'as' => 'admin.course.coursecate.index',
        'uses' => 'CourseCateController@index',
        'middleware' => 'can:course.coursecates.index'
    ]);
    $router->get('coursecates/create', [
        'as' => 'admin.course.coursecate.create',
        'uses' => 'CourseCateController@create',
        'middleware' => 'can:course.coursecates.create'
    ]);
    $router->post('coursecates', [
        'as' => 'admin.course.coursecate.store',
        'uses' => 'CourseCateController@store',
        'middleware' => 'can:course.coursecates.create'
    ]);
    $router->get('coursecates/{coursecate}/edit', [
        'as' => 'admin.course.coursecate.edit',
        'uses' => 'CourseCateController@edit',
        'middleware' => 'can:course.coursecates.edit'
    ]);
    $router->put('coursecates/{coursecate}', [
        'as' => 'admin.course.coursecate.update',
        'uses' => 'CourseCateController@update',
        'middleware' => 'can:course.coursecates.edit'
    ]);
    $router->delete('coursecates/{coursecate}', [
        'as' => 'admin.course.coursecate.destroy',
        'uses' => 'CourseCateController@destroy',
        'middleware' => 'can:course.coursecates.destroy'
    ]);
    $router->bind('course', function ($id) {
        return app('Modules\Course\Repositories\CourseRepository')->find($id);
    });
    $router->get('courses', [
        'as' => 'admin.course.course.index',
        'uses' => 'CourseController@index',
        'middleware' => 'can:course.courses.index'
    ]);
    $router->get('courses/create', [
        'as' => 'admin.course.course.create',
        'uses' => 'CourseController@create',
        'middleware' => 'can:course.courses.create'
    ]);
    $router->post('courses', [
        'as' => 'admin.course.course.store',
        'uses' => 'CourseController@store',
        'middleware' => 'can:course.courses.create'
    ]);
    $router->get('courses/{course}/edit', [
        'as' => 'admin.course.course.edit',
        'uses' => 'CourseController@edit',
        'middleware' => 'can:course.courses.edit'
    ]);
    $router->put('courses/{course}', [
        'as' => 'admin.course.course.update',
        'uses' => 'CourseController@update',
        'middleware' => 'can:course.courses.edit'
    ]);
    $router->delete('courses/{course}', [
        'as' => 'admin.course.course.destroy',
        'uses' => 'CourseController@destroy',
        'middleware' => 'can:course.courses.destroy'
    ]);
    $router->bind('teacher', function ($id) {
        return app('Modules\Course\Repositories\TeacherRepository')->find($id);
    });
    $router->get('teachers', [
        'as' => 'admin.course.teacher.index',
        'uses' => 'TeacherController@index',
        'middleware' => 'can:course.teachers.index'
    ]);
    $router->get('teachers/create', [
        'as' => 'admin.course.teacher.create',
        'uses' => 'TeacherController@create',
        'middleware' => 'can:course.teachers.create'
    ]);
    $router->post('teachers', [
        'as' => 'admin.course.teacher.store',
        'uses' => 'TeacherController@store',
        'middleware' => 'can:course.teachers.create'
    ]);
    $router->get('teachers/{teacher}/edit', [
        'as' => 'admin.course.teacher.edit',
        'uses' => 'TeacherController@edit',
        'middleware' => 'can:course.teachers.edit'
    ]);
    $router->put('teachers/{teacher}', [
        'as' => 'admin.course.teacher.update',
        'uses' => 'TeacherController@update',
        'middleware' => 'can:course.teachers.edit'
    ]);
    $router->delete('teachers/{teacher}', [
        'as' => 'admin.course.teacher.destroy',
        'uses' => 'TeacherController@destroy',
        'middleware' => 'can:course.teachers.destroy'
    ]);
// append



});
