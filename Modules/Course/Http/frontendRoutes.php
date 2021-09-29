<?php

use Illuminate\Routing\Router;
/** @var Router $router */
$router->group(['prefix' =>'/course'], function (Router $router) {
    $locale = LaravelLocalization::setLocale() ?: App::getLocale();
  //  dd($locale);
    $router->get('/', [
        'as' => $locale.'.course',
        'uses' => 'PublicController@index'
    ]);
    $router->get('/{slug}', [
        'as' => $locale.'.course.slug',
        'uses' => 'PublicController@show'
    ]);
});

