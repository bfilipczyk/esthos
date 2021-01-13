<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path,PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::get('login','SecurityController');
Routing::get('register','SecurityController');
Routing::get('home','DefaultController');
Routing::get('characters','DefaultController');
Routing::get('events','DefaultController');
Routing::get('items','DefaultController');
Routing::get('places','DefaultController');
Routing::get('scenarios','DefaultController');
Routing::run($path);