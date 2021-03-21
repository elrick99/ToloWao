<?php

namespace App\Controller;

class PostsController extends Controller{
    public function index(){
     return $this->view('Test.screens.widgets.inscription');
    }   
}