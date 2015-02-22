<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class RoomLists extends CI_Model {

    /*This will be a model for roomlists*/
    // The data comes from http://www.quotery.com/top-100-funny-quotes-of-all-time/?PageSpeed=noscript
    var $data = array(
        array('id' => '1', 'name' => 'Room1', 'capacity' => '10/10', 'link' => ''),
        array('id' => '2', 'name' => 'Term Project', 'capacity' => '0/10', 'link' => 'Join'),
        array('id' => '3', 'name' => 'COMP34711', 'capacity' => '7/10', 'link' => 'Invite Ionly'),
        array('id' => '4', 'name' => 'C++', 'capacity' => '2/10', 'link' => 'Join')
    );

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // retrieve a single chat
    public function get($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
            if ($record['id'] == $which)
                return $record;
        return null;
    }

    // retrieve all of the chat
    public function all() {
        return $this->data;
    }

  

}
