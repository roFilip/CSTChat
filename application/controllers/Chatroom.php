<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class ChatRoom extends Application {

	
    
    function __construct() {
        parent::__construct();
        //$this->load->library('session');
    }
    
    
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
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

        echo $this->session->userdata('currentRoom');
        
        $chats = array();

        // populate the chats array
        foreach ($source as $record) {
            
            
             $chats[] = array(
                'who' =>   $record->usr_id,
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
		$currentRoom = $this->input->get('currentRoom');
	    $msg = $this->chat->create();
	    $msg->usr_id = 1;
	    $msg->text = $this->input->post('msg');
	    $msg->room_id = $currentRoom;

	    $this->chat->add($msg);

	    redirect('/roomlist/'.$currentRoom);
  	}

}

/* End of file roomlist.php */
/* Location: ./application/controllers/RoomList.php */