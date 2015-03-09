<?php

class Logout extends Application
{
    function __construct()
    {
        parent::__construct();
        $this->errors = array();
    }

    function index()
    {
         $this->session->sess_destroy();

         redirect("/");
    }

    
}