<?php

class Users extends MY_Model {
    protected $_tableName;

    // Constructor
    function __construct() {
        $this->_tableName = 'users';
        parent::__construct($this->_tableName, 'id');
    }

    // validates the user based on their username and password
    // returns the correct user data if they exist in the database
    // returns null otherwise
    public function getByUsrPass($username, $password) {
        $query = $this->db->select('*')
            ->from($this->_tableName)
            ->where('username', $username)
            ->where("BINARY `password` = '" . $password . "'", NULL, FALSE)
            ->get();

        if ($query->num_rows() < 1)
            return null;
        return $query->row();
    }

    // gets a single user from its userid
    public function getByID($userid) {
        return $this->get($userid);
    }

    // gets a single user from its username
    public function getByUserName($username) {
        $this->db->where('username', $username);
        $query = $this->db->get($this->_tableName);
        if ($query->num_rows() < 1)
            return null;
        return $query->row();
    }
}
