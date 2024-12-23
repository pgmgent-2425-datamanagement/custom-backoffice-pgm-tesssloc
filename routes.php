<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');

// home routes
$router->get('/', 'HomeController@index');

// story routes
$router->get('/stories', 'StoryController@list');
$router->get('/stories/(\d+)', 'StoryController@detail');

$router->get('/stories/edit/(\d+)', 'StoryController@edit');
$router->post('/stories/edit/(\d+)', 'StoryController@edit');

$router->get('/stories/delete/(\d+)', 'StoryController@delete');
$router->post('/stories/delete/(\d+)', 'StoryController@delete');

$router->get('/stories/add', 'StoryController@add');
$router->post('/stories/add', 'StoryController@store');

$router->get('/api/get_stories', 'StoryController@get_stories');
$router->post('/api/add_story', 'StoryController@add_story');

// user routes
$router->get('/users', 'UserController@list');
$router->get('/users/(\d+)', 'UserController@detail');

$router->get('/users/edit/(\d+)', 'UserController@edit');
$router->post('/users/edit/(\d+)', 'UserController@edit');

$router->get('/users/delete/(\d+)', 'UserController@delete');
$router->post('/users/delete/(\d+)', 'UserController@delete');


$router->get('/users/add', 'UserController@add');
$router->post('/users/add', 'UserController@store');

$router->get('/api/get_users', 'UserController@get_users');

// file routes

$router->get('/files', 'FileController@list');

$router->get('/files/delete/(.+)', 'FileController@delete');
$router->post('/files/delete/(.+)', 'FileController@delete');

$router->get('/files/edit/(.+)', 'FileController@edit');
$router->post('/files/edit/(.+)', 'FileController@edit');

$router->get('/files/add', 'FileController@add');
$router->post('/files/add', 'FileController@store');