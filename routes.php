<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/stories', 'StoryController@list');
$router->get('/stories/(\d+)', 'StoryController@detail');
$router->get('/stories/edit/(\d+)', 'StoryController@edit');
$router->post('/stories/edit/(\d+)', 'StoryController@edit');

$router->get('/stories/delete/(\d+)', 'StoryController@delete');

$router->get('/api/get_stories', 'StoryController@get_stories');