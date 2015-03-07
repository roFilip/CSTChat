<?php

class Users extends CI_Model {
    protected $_tableName;

    // Constructor
    public function __construct() {
        parent::__construct();
        $this->_tableName = 'users';
    }

    // validates the user based on their username and password
    public function validate($username, $password) {
        $query = $this->db->select('*')
                  ->from($this->_tableName)
                  ->like('username', $username)
                  ->like('password', $password)
                  ->get();
        if ($query->num_rows() < 1)
            return false;
        return true;
    }
}
