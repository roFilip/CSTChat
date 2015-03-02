<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class RoomLists extends MY_Model {
    /*This will be a model for roomlists*/
    // The data comes from http://www.quotery.com/top-100-funny-quotes-of-all-time/?PageSpeed=noscript
    var $data;
    
    // Constructor
    public function __construct() {
        parent::__construct('rooms', 'id');
        $data = $this->getAll();
    }

    // retrieve a single chat
    public function getSingle($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record) {
            if ($record['id'] == $which) {
                return $record;
            }
        }
        return null;
    }
    // retrieve all of the chat
    public function getAll() {
        return $this->all();
    }
}
