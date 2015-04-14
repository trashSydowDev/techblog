<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
*/

$router->group(
    [
        'namespace' => 'App\Http\Controllers\Frontend',
    ],
    function () use ($router) {
        $router->get('/',           'CmsController@indexPosts');
        $router->get('page-{slug}', 'CmsController@showPage');
        $router->get('{slug}',      'CmsController@showPost');
    }
);

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
*/

$router->group(
    [
        'prefix' => 'admin',
        'namespace' => 'App\Http\Controllers\Backend',
        'middleware' => 'auth.basic'
    ],
    function () use ($router) {
        $router->get(   'pages',          'PagesController@index');
        $router->get(   'page/{id}',      'PagesController@show');
        $router->get(   'page/{id}/edit', 'PagesController@edit');
        $router->get(   'pages/create',   'PagesController@create');
        $router->delete('page/{id}',      'PagesController@destroy');
        $router->put(   'page/{id}',      'PagesController@update');
        $router->post(  'page',           'PagesController@store');

        $router->get(   'posts',          'PostsController@index');
        $router->get(   'post/{id}',      'PostsController@show');
        $router->get(   'post/{id}/edit', 'PostsController@edit');
        $router->get(   'posts/create',   'PostsController@create');
        $router->delete('post/{id}',      'PostsController@destroy');
        $router->put(   'post/{id}',      'PostsController@update');
        $router->post(  'post',           'PostsController@store');

        $router->get(   'users',          'UsersController@index');
        $router->get(   'user/{id}',      'UsersController@show');
        $router->get(   'user/{id}/edit', 'UsersController@edit');
        $router->get(   'users/create',   'UsersController@create');
        $router->delete('user/{id}',      'UsersController@destroy');
        $router->put(   'user/{id}',      'UsersController@update');
        $router->post(  'user',           'UsersController@store');
    }
);
