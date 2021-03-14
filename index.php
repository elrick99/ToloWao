<?php
require 'vendor/autoload.php';

$router = new App\Router\Router($_GET['url']);

$router->get('/posts', function (){echo 'Tous Les Articles';});
$router->get('posts/:id', function ($id){echo 'Afficher l\'Article'.$id;});
$router->run();