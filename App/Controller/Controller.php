<?php

namespace App\Controller;

class Controller{

    public function view(string $path, array $params = null){

        $paths = explode('.', $path);
        if(count($paths)==1){

            return require 'Views/'.$path.'.php';
        }
        
        return require 'Views/'.str_replace('.','/',$path).'.php';

    }
}