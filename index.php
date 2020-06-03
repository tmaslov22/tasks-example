<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Require composer autoloader
use Core\Database;

require __DIR__ . '/config/db.php';
require __DIR__ . '/vendor/autoload.php';

$db = new Database();


use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Router;
use Illuminate\Routing\UrlGenerator;
use Core\EventDispatcher;

// Create a service container
$container = new Container;


// Set up a current path resolver so the paginator can generate proper links
Paginator::currentPathResolver(function () {
    return isset($_SERVER['REQUEST_URI']) ? strtok($_SERVER['REQUEST_URI'], '?') : '/';
});

// Set up a current page resolver
Paginator::currentPageResolver(function ($pageName = 'page') {
    $page = isset($_REQUEST[$pageName]) ? $_REQUEST[$pageName] : 1;
    return $page;
});

// Create a request from server variables, and bind it to the container; optional
$request = Request::capture();
$container->instance('Illuminate\Http\Request', $request);

// Using Illuminate/Events/Dispatcher here (not required); any implementation of
// Illuminate/Contracts/Event/Dispatcher is acceptable
$events = new EventDispatcher();

// Create the router instance
$router = new Router($events, $container);

// Load the routes
require_once 'routes.php';

// Create the redirect instance
$redirect = new Redirector(new UrlGenerator($router->getRoutes(), $request));

// Dispatch the request through the router
$response = $router->dispatch($request);

// Send the response back to the browser
$response->send();