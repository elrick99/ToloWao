<?php


namespace App\Router;


class Route
{
    private $path;
    private $callable;
public function __construct($path, $callable)
{
    $this->callable = $callable;
    $this->path= $path;
}
public function match($url){
    $url = trim($url, '/');
//    $path = preg_replace('#:([\w]+)#',([^\]+));
}
}