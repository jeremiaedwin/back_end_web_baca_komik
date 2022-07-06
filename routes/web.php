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

$router->get('/genre', 'GenreController@index');
$router->get('/genre/{id}', 'GenreController@show');
$router->post('/genre', 'GenreController@store');
$router->put('/genre/{id}', 'GenreController@update');
$router->delete('/genre/{id}', 'GenreController@delete');

$router->get('/author', 'AuthorController@index');
$router->get('/author/{id}', 'AuthorController@show');
$router->post('/author', 'AuthorController@store');
$router->put('/author/{id}', 'AuthorController@update');
$router->delete('/author/{id}', 'AuthorController@delete');

$router->get('/tag', 'TagController@index');
$router->get('/tag/{id}', 'TagController@show');
$router->post('/tag', 'TagController@store');
$router->put('/tag/{id}', 'TagController@update');
$router->delete('/tag/{id}', 'TagController@delete');

$router->get('/comics', 'ComicController@index');
$router->get('/comic/{id}', 'ComicController@show');
$router->post('/comic', 'ComicController@store');
$router->put('/comic/{id}', 'ComicController@update');
$router->delete('/comic/{id}', 'ComicController@delete');

$router->post("/register", "AuthController@register");
$router->post("/login", "AuthController@login");
// $router->get("/user", "UserController@index");