<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1/trans', 'middleware' => 'auth'], function() use ($router){
    $router->get('/detail', ['uses' => 'TransactionController@detail']);
    $router->get('/', ['uses' => 'TransactionController@index']);
    $router->post('/', ['uses' => 'TransactionController@create']);
    $router->put('/{id}', ['uses' => 'TransactionController@update']);
    $router->get('/{id}', ['uses' => 'TransactionController@show']);
    $router->delete('/{id}', ['uses' => 'TransactionController@destroy']);

});

$router->group(['prefix' => 'api/v1/cost', 'middleware' => 'auth'], function() use ($router){
    $router->post('/test', ['uses' => 'CostumerController@test']);
    $router->get('/', ['uses' => 'CostumerController@index']);
    $router->post('/', ['uses' => 'CostumerController@create']);
    $router->put('/{id}', ['uses' => 'CostumerController@update']);
    $router->get('/{id}', ['uses' => 'CostumerController@show']);
    $router->delete('/{id}', ['uses' => 'CostumerController@destroy']);
});

$router->group(['prefix' => 'api/v1/hist', 'middleware' => 'auth'], function() use ($router){
    $router->get('/', ['uses' => 'HistoryController@index']);
    $router->post('/', ['uses' => 'HistoryController@create']);
    $router->put('/{id}', ['uses' => 'HistoryController@update']);
    $router->get('/{id}', ['uses' => 'HistoryController@show']);
    $router->delete('/{id}', ['uses' => 'HistoryController@destroy']);
});
