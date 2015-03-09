<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class ChatRoom extends Application {
    
    function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->data['pagebody'] = 'chatroom';
    }

	function display($roomnum)
    {
        $this->data['pagebody'] = 'chatroom';
        // retrieve all of the chats available
        $source = $this->chat->some('room_id', $roomnum);

        $this->session->set_userdata('currentRoom', $roomnum);

        $chats = array();

        // populate the chats array
        foreach ($source as $record) {
            $user = $this->users->getByID($record->usr_id);
            
            $chats[] = array(
                'pic' => base64_encode($user->picture),
                'who' =>   $user->username,
                'what' =>   $record->text
            );
         }

        $this->data['chat'] = $chats;
        $this->data = array_merge($this->data, $chats);

            // render the page with the newly added data
        $this->render();
    }
    
    function add()
    {
        $currentRoom = $this->session->userdata('currentRoom');
        $msg = $this->chat->create();
        $msg->usr_id = $this->session->userdata('userid');
        $msg->text = $this->input->post('msg');
        $msg->room_id = $currentRoom;

        $this->chat->add($msg);

        redirect('/roomlist/'.$currentRoom);
    }
}

/* End of file roomlist.php */
/* Location: ./application/controllers/RoomList.php */