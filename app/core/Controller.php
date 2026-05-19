<?php

class Controller
{

    // global function to load ui in views
    public function view($view, $data = [])
    {

        extract($data);

        require '../app/views/' . $view . '.php';
    }
}
