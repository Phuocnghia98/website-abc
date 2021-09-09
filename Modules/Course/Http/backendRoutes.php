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
// append

});
