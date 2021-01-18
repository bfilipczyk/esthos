<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path,PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::get('home','DefaultController');
Routing::get('notes','DefaultController');
Routing::get('characters','DefaultController');
Routing::get('events','DefaultController');
Routing::get('items','DefaultController');
Routing::get('places','DefaultController');
Routing::get('scenarios','DefaultController');
Routing::get('remove','DefaultController');

Routing::post('add','DefaultController');
Routing::post('search','DefaultController');


Routing::post('register','SecurityController');
Routing::post('login','SecurityController');
Routing::get('logout','SecurityController');

Routing::run($path);