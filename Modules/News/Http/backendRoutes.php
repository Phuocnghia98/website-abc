<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/news'], function (Router $router) {
    $router->bind('news_categories', function ($id) {
        return app('Modules\News\Repositories\News_categoriesRepository')->find($id);
    });
    $router->get('news_categories', [
        'as' => 'admin.news.news_categories.index',
        'uses' => 'News_categoriesController@index',
        'middleware' => 'can:news.news_categories.index'
    ]);
    $router->get('news_categories/create', [
        'as' => 'admin.news.news_categories.create',
        'uses' => 'News_categoriesController@create',
        'middleware' => 'can:news.news_categories.create'
    ]);
    $router->post('news_categories', [
        'as' => 'admin.news.news_categories.store',
        'uses' => 'News_categoriesController@store',
        'middleware' => 'can:news.news_categories.create'
    ]);
    $router->get('news_categories/{news_categories}/edit', [
        'as' => 'admin.news.news_categories.edit',
        'uses' => 'News_categoriesController@edit',
        'middleware' => 'can:news.news_categories.edit'
    ]);
    $router->put('news_categories/{news_categories}', [
        'as' => 'admin.news.news_categories.update',
        'uses' => 'News_categoriesController@update',
        'middleware' => 'can:news.news_categories.edit'
    ]);
    $router->delete('news_categories/{news_categories}', [
        'as' => 'admin.news.news_categories.destroy',
        'uses' => 'News_categoriesController@destroy',
        'middleware' => 'can:news.news_categories.destroy'
    ]);
    $router->bind('news', function ($id) {
        return app('Modules\News\Repositories\NewsRepository')->find($id);
    });
    $router->get('news', [
        'as' => 'admin.news.news.index',
        'uses' => 'NewsController@index',
        'middleware' => 'can:news.news.index'
    ]);
    $router->get('news/create', [
        'as' => 'admin.news.news.create',
        'uses' => 'NewsController@create',
        'middleware' => 'can:news.news.create'
    ]);
    $router->post('news', [
        'as' => 'admin.news.news.store',
        'uses' => 'NewsController@store',
        'middleware' => 'can:news.news.create'
    ]);
    $router->get('news/{news}/edit', [
        'as' => 'admin.news.news.edit',
        'uses' => 'NewsController@edit',
        'middleware' => 'can:news.news.edit'
    ]);
    $router->put('news/{news}', [
        'as' => 'admin.news.news.update',
        'uses' => 'NewsController@update',
        'middleware' => 'can:news.news.edit'
    ]);
    $router->delete('news/{news}', [
        'as' => 'admin.news.news.destroy',
        'uses' => 'NewsController@destroy',
        'middleware' => 'can:news.news.destroy'
    ]);
// append


});
