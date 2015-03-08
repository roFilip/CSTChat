<?php

class Login extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    private function display()
    {
        $this->data['title'] = 'Login';
        $this->data['pagebody'] = 'login';

        $errmsg = '';
        if (count($this->errors) > 0)
        {
            foreach ($this->errors as $error) {
                $errmsg .= $error . '<br/>';
            }
        }
        $this->data['errmsg'] = $errmsg;

        $this->render();
    }

    function index()
    {
        $this->errors = array();

        $this->display();

        echo 'usr: ' . $this->session->userdata('username');
    }

    function confirm()
    {
        $success = TRUE;
        $this->errors = array();

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if (empty($username)) {
            $this->errors[] = "PLIS ENTER YOUR USERNAME!!";
            $success = FALSE;
        }
        if (empty($password)) {
            $this->errors[] = "PLIS ENTER YOUR PASSWORD!!";
            $success = FALSE;
        }

        if ($success) {
            if (!$this->users->validate($this->input->post('username'), $this->input->post('password')))
                $this->errors[] = "WRONG USER/PASS FOOL!!";
            else {
                $this->session->set_userdata(array(
                        'username'      => $username,
                        'logged_in'     => TRUE
                ));
            }

            redirect('/roomlist');
        }

        $this->display();
    }
}