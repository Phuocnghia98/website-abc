<?php 
use Illuminate\Routing\Router;
/** @var Router $router */
$router->post('contacts', ['uses' => 'PublicController@index', 'as' => 'contacts']);

    