<?php

use Illuminate\Routing\Router;

$router->group(['namespace' => 'Controller'], function (Router $router) {
    $router->get('/', ['name' => 'home', 'uses' => 'HomeController@home']);
    $router->post('/auth', ['name' => 'auth', 'uses' => 'HomeController@auth']);
    $router->get('/sign-out', ['name' => 'signOut', 'uses' => 'HomeController@signOut']);
    $router->get('/change-order-by', ['name' => 'changeOrderBy', 'uses' => 'HomeController@changeOrderBy']);

    $router->post('/task', ['name' => 'task.create', 'uses' => 'TaskController@create']);
    $router->post('/task/{id}', ['name' => 'task.edit', 'uses' => 'TaskController@edit']);
    $router->get('/task-edit-form/{id}', ['name' => 'task.edit-form', 'uses' => 'TaskController@editForm']);
});
