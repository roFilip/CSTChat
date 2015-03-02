<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RoomList extends Application {

    function __construct() {
        parent::__construct();
        $this->load->helper('formfields');
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
        $this->data['pagebody'] = 'roomlist';

        // retrieve all of the rooms available
        $source = $this->roomlists->all();

        // populate the rooms array
        /*foreach ($source as $record)
        {
            array_push($record, "Not Full");
        }*/

        // render the page with the newly added data
        $this->data['rooms'] = $source;
        $this->render();
    }
        
    public function add() {
        $room = $this->roomlists->create();
        $this->present($room);
    }
    
    function present($room) {
        $message = '';
        /*if (count($this->errors) > 0) {
          foreach ($this->errors as $booboo)
            $message .= $booboo;
        }*/
        $this->data['message'] = $message;
        
        $this->data['pagebody'] = 'room_create';
        $this->data['fid'] = makeTextField('ID#', 'id', $room->id, 
                "Unique quote identifier, system-assigned",10,10,true);
        $this->data['fname'] = makeTextField('Room Name', 'name', $room->name);
        $this->data['fsubmit'] = makeSubmitButton('Process Room', 
                "Click here to validate the room data", 'btn-success');
        $this->render();
    }
    
    function confirm() {
        $record = $this->roomlists->create();
        // Extract submitted fields
        $record->id = $this->input->post('id');
        $record->name = $this->input->post('name');
        
        /*if (strlen($record->name) < 1) {
            $this->errors[] = "Name must be 1 character or more";
        }*/
        /*if (count($this->errors) > 0) {
            $this->present($record);
            return; // make sure we don't try to save anything
        }*/
        if (empty($record->id)) {
            $this->roomlists->add($record);
        } else { 
            $this->roomlists->update($record);
        }
        
        redirect('/roomlist');
    }
}

/* End of file roomlist.php */
/* Location: ./application/controllers/RoomList.php */