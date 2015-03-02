<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RoomList extends Application {

    function __construct() {
        parent::__construct();
        $this->load->helper('formfields');
    }

    public function index()
    {
        $this->data['pagebody'] = 'roomlist';

        // retrieve all of the rooms available
        $source = $this->roomlists->all();

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

        $this->data['message'] = $message;
        
        $this->data['pagebody'] = 'room_create';
        $this->data['fid'] = makeTextField('ID#', 'id', $room->id, 
                "Unique quote identifier, system-assigned",10,10,true);
        $this->data['fname'] = makeTextField('Room Name', 'name', $room->name);
        $this->data['fvisibility'] = makeTextField('Visibility', 'link', $room->link);
        $this->data['fsubmit'] = makeSubmitButton('Process Room', 
                "Click here to validate the room data", 'btn-success');
        $this->render();
    }
    
    function confirm() {
        $record = $this->roomlists->create();
        // Extract submitted fields
        $record->id = $this->input->post('id');
        $record->name = $this->input->post('name');
        $record->link = $this->input->post('link');
        
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