<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Chat extends MY_Model { 

    // Constructor
    public function __construct() {
        parent::__construct('messages', 'id');
    }

    // retrieve a single chat
    public function getSingle($which) {
        // iterate over the data until we find the one we want
       return $this->get($which);
    }

    // retrieve all of the chat
    public function getAll() {
        return $this->all();
    }
}