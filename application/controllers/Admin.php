<?php

/**
 * Description of Admin
 *
 * @author Thomas
 */
class Admin extends Application {
    
    function __construct()
    {
	parent::__construct();
        $this->load->helper('formfields');
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        $this->data['pagebody'] = 'admin_list'; 
        
        $rooms = $this->roomlists->getAll();
      
        // render the page with the newly added data
        $this->data['rooms'] = $rooms;
        
        $users = $this->users->all();
        
        // render the page with the newly added data
        $this->data['users'] = $users;
        
        $this->render();
    }
    
    function updateRoom($roomno) {
        $room = $this->roomlists->create();
        $room->id = $roomno;
        $this->present($room, $roomno);
    }
    
    function deleteRoom($roomno) {
        $this->roomlists->delete($roomno);
        redirect('/admin');
    }

      public function addroom() {
        $room = $this->roomlists->create();
        $this->present($room);
    }
    
    function present($room) {
        $this->data['pagebody'] = 'room_create';
        $this->data['class'] = 'admin';
        
        $message = '';
        $this->data['message'] = $message;
        
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
        
        redirect('/admin');
    }
    
    function updateUser($userno) {
        
    }
    
    function deleteUser($userno) {
        $this->users->delete($userno);
    }
}
