<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Chat extends CI_Model {

    // The data comes from http://www.quotery.com/top-100-funny-quotes-of-all-time/?PageSpeed=noscript
    var $data = array(
        array('id' => '1', 'who' => 'Student1', 'pic' => 'profile_placeholder_25.png',
            'what' => 'I need ze help on win32 plis!.'),
        array('id' => '2', 'who' => 'Student2', 'pic' => 'profile_placeholder_25.png',
            'what' => 'Im struggling as well.'),
        array('id' => '3', 'who' => 'Student1', 'pic' => 'profile_placeholder_25.png',
            'what' => 'How are you supposed to get the text from an edit box??'),
        array('id' => '4', 'who' => 'Student2', 'pic' => 'profile_placeholder_25.png',
            'what' => ' idk... black magic?”'),
        array('id' => '5', 'who' => 'Student2', 'pic' => 'profile_placeholder_25.png',
            'what' => 'it always works!')
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