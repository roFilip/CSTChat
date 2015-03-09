<?php

class Login extends Application
{
    function __construct()
    {
        parent::__construct();
        $this->errors = array();
    }

    function index()
    {
        if ($this->input->post('button_signin'))
        {
            if ($this->confirm())
                redirect('/roomlist');
        }
        else if ($this->input->post('button_create'))
        {
            if ($this->create())
                $this->errors[] = "Account created!";
        }

        $this->data['title'] = 'Login';
        $this->data['pagebody'] = 'login';

        $errmsg = '';
        if (count($this->errors) > 0)
        {
            foreach ($this->errors as $error)
            {
                $errmsg .= $error . '<br/>';
            }
            $errmsg .= '<br/>';
        }

        $this->data['errmsg'] = $errmsg;
        $this->data['post_username'] = $this->input->post('username');
        $this->data['post_password'] = '';

        $this->render();
    }

    private function confirm()
    {
        $success = TRUE;

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if (empty($username))
        {
            $this->errors[] = "Enter your username.";
            $success = FALSE;
        }
        else if (empty($password))
        {
            $this->errors[] = "Enter your password.";
            $success = FALSE;
        }

        if ($success)
        {
            $user = $this->users->getByUsrPass($username, $password);
            
            if ($user == null)
            {
                $this->session->unset_userdata('userid');
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('userpic');

                $this->errors[] = "The username or password you entered is incorrect.";
                $success = FALSE;
            }
            else
            {
                $this->session->set_userdata(array(
                        'userid'    => $user->id,
                        'username'  => $user->username,
                        'userpic'   => $user->picture
                ));
            }
        }

        return $success;
    }

    private function create()
    {
        $success = TRUE;

        $user = $this->users->create();

        $user->username = $this->input->post('username');
        $user->password = $this->input->post('password');
        $user->picture = $this->do_upload($this->input->post('picture'));

        if (empty($user->username))
        {
            $this->errors[] = "Enter your username.";
            $success = FALSE;
        }
        else if (empty($user->password))
        {
            $this->errors[] = "Enter your password.";
            $success = FALSE;
        }
        else if (!$user->picture)
        {
            $this->errors[] = "Picture not found.";
            $success = FALSE;
        }

        if ($success)
        {
            if (!$this->users->getByUserName($user->username))
                $this->users->add($user);
            else
                $this->users->update($user);
        }

        return $success;
    }

    public function do_upload($path)
    {
        $config = array(
        'upload_path' => $path,
        'allowed_types' => "gif|jpg|png|jpeg|pdf",
        'overwrite' => TRUE,
        'max_size' => "131072000",
        'max_height' => "25",
        'max_width' => "25"
        );

        $this->load->library('upload', $config);

        if($this->upload->do_upload())
        {
            return $this->upload->data();
        }
        else
        {
            return null;
        }
    }
}
