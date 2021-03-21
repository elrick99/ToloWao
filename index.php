<?php
require 'vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);

$router = new App\Router\Router($_GET['url']);

$router->get('/', function () use ($router) {
    require 'signup.php';
});
$router->get('/posts', function () {
    echo 'Tous Les Articles';
});
$router->get('posts/:id-:slug', function ($id, $slug) use ($router) {
    echo $router->url('posts.show', ['id' => $id, 'slug' => $slug]);
}, 'posts.show')->with('id', '[0-9]+')->with('slug', '([a-z\-0-9]+)');
$router->get('posts/:id', function ($id) {
    echo 'Afficher l\'Article' . $id;
});
$router->get('/test', function () {
    echo 'Bonjour les gens';
}, 'test');
$router->run();
