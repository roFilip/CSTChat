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
        array('id' => '1', 'who' => 'Student1', 'pic' => 'profile_placeholder_25.png', 'where'=>'/chatroom',
            'what' => 'I need ze help on win32 plis!.', 'position' => 'rightchat'),
        array('id' => '2', 'who' => 'Student2', 'pic' => 'profile_placeholder_25.png', 'where'=>'/chatroom',
            'what' => 'Im struggling as well.', 'position' => 'leftchat'),
        array('id' => '3', 'who' => 'student1', 'pic' => 'profile_placeholder_25.png', 'where'=>'/chatroom',
            'what' => 'How are you supposed to get the text from an edit box??', 'position' => 'rightchat'),
        array('id' => '4', 'who' => 'student2', 'pic' => 'profile_placeholder_25.png', 'where'=>'/chatroom',
            'what' => ' idk... black magic?”', 'position' => 'leftchat'),
        array('id' => '5', 'who' => 'student2', 'pic' => 'profile_placeholder_25.png', 'where'=>'/chatroom',
            'what' => 'it always works!', 'position' => 'leftchat')
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
