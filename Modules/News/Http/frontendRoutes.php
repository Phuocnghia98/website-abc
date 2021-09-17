<?php

use Illuminate\Routing\Router;
/** @var Router $router */
$router->group(['prefix' =>'/news'], function (Router $router) {
    $locale = LaravelLocalization::setLocale() ?: App::getLocale();
    $router->get('/', [
        'as' => $locale.'.news',
        'uses' => 'PublicController@index'
    ]);
    $router->get('/{slug}', [
        'as' => $locale.'.news.slug',
        'uses' => 'PublicController@detail'
    ]);
});