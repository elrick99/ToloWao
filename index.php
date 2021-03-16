<?php
require 'vendor/autoload.php';

$router = new App\Router\Router($_GET['url']);

$router->get('/', function (){ require 'index.html';});
$router->get('/posts', function (){echo 'Tous Les Articles';});
$router->get('posts/:id-:slug', function ($id,$slug) use ($router) {echo $router->url('posts.show', ['id'=>$id, 'slug'=>$slug]);},'posts.show')->with('id', '[0-9]+')->with('slug', '([a-z\-0-9]+)');
$router->get('posts/:id', function ($id){echo 'Afficher l\'Article'.$id;});
$router->run();