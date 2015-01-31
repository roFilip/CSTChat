<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChatRoom extends Application {
    
        function __construct() {
            parent::__construct();
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
                
                $source = $this->chat->all();
                
                $chats = array();
                foreach ($source as $record) {
                    $chats[] = array('who' => $record['who'], 'pic' => $record['pic'], 'href' => $record['where'], 'what' => $record['what'], 'position' => $record['position']);
                }
                $this->data['chat'] = $chats;
                
                $this->data = array_merge($this->data, $source);
                
		$this->render();
	}
}

/* End of file roomlist.php */
/* Location: ./application/controllers/RoomList.php */