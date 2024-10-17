<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');

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

// user routes
$router->get('/users', 'UserController@list');
$router->get('/users/(\d+)', 'UserController@detail');

$router->get('/users/edit/(\d+)', 'UserController@edit');
$router->post('/users/edit/(\d+)', 'UserController@edit');

$router->get('/users/delete/(\d+)', 'UserController@delete');
$router->post('/users/delete/(\d+)', 'UserController@delete');


$router->get('/users/add', 'UserController@add');
$router->post('/users/add', 'UserController@store');

$router->get('/users/(\d+)/stories', 'UserController@get_user_stories');

$router->get('/api/get_users', 'UserController@get_users');