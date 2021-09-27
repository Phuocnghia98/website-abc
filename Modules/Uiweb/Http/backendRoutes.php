<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/uiweb'], function (Router $router) {
    $router->bind('footer', function ($id) {
        return app('Modules\Uiweb\Repositories\FooterRepository')->find($id);
    });
    $router->get('footers', [
        'as' => 'admin.uiweb.footer.index',
        'uses' => 'FooterController@index',
        'middleware' => 'can:uiweb.footers.index'
    ]);
    $router->get('footers/create', [
        'as' => 'admin.uiweb.footer.create',
        'uses' => 'FooterController@create',
        'middleware' => 'can:uiweb.footers.create'
    ]);
    $router->get('logo/edit', [
        'as' => 'admin.uiweb.logo.editlogo',
        'uses' => 'FooterController@editlogo',
        'middleware' => 'can:uiweb.footers.edit'
    ]);
    $router->post('footers', [
        'as' => 'admin.uiweb.footer.store',
        'uses' => 'FooterController@store',
        'middleware' => 'can:uiweb.footers.create'
    ]);
    $router->get('footers/{footer}/edit', [
        'as' => 'admin.uiweb.footer.edit',
        'uses' => 'FooterController@edit',
        'middleware' => 'can:uiweb.footers.edit'
    ]);
    $router->put('footers/{footer}', [
        'as' => 'admin.uiweb.footer.update',
        'uses' => 'FooterController@update',
        'middleware' => 'can:uiweb.footers.edit'
    ]);
    $router->put('logo/update', [
        'as' => 'admin.uiweb.logo.update',
        'uses' => 'FooterController@updatelogo',
        'middleware' => 'can:uiweb.footers.edit'
    ]);
    $router->delete('footers/{footer}', [
        'as' => 'admin.uiweb.footer.destroy',
        'uses' => 'FooterController@destroy',
        'middleware' => 'can:uiweb.footers.destroy'
    ]);
// append

});
