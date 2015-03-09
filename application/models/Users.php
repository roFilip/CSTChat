<?php

class Users extends MY_Model {
    protected $_tableName;

    // Constructor
    function __construct($tablename = 'users') {
        parent::__construct($tablename);
        $this->_tableName = $tablename;
    }

    // validates the user based on their username and password
    // returns the correct user data if they exist in the database
    // returns null otherwise
    public function validate($username, $password) {
        $query = $this->db->select('*')
            ->from($this->_tableName)
            ->where('username', $username)
            ->where("BINARY `password` = '" . $password . "'", NULL, FALSE)
            ->get();

        if ($query->num_rows() < 1)
            return null;
        return $query->row();
    }
}
