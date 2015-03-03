<?php

class Login extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->data['title'] = 'Login';
        $this->data['pagebody'] = 'login';

        $this->render();
    }

    function confirm()
    {
        redirect('/login');
    }
}