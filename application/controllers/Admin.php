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
        
        $rooms = $this->roomlists->all();
        
        foreach($rooms as $record) {
            if ($record->link == "Private") {
                $record->link = "Cannot Join";
            } else {
                $record->link = "Join";
            }
        }
        // render the page with the newly added data
        $this->data['rooms'] = $rooms;
        
        $users = $this->users->all();
        
        // render the page with the newly added data
        $this->data['users'] = $users;
        
        $this->render();
    }
    
    function addUser() {
        
    }
    
    function present($user) {
        $message = '';
        if (count($this->errors) > 0) {
          foreach ($this->errors as $booboo)
            $message .= $booboo;
        }
        $this->data['message'] = $message;
  
        $this->data['fid'] = makeTextField('ID#', 'id', $quote->id, 
                "Unique quote identifier, system-assigned",10,10,true);
        $this->data['fwho'] = makeTextField('Author', 'who', $quote->who);
        $this->data['fmug'] = makeTextField('Picture', 'mug', $quote->mug);
        $this->data['fwhat'] = makeTextArea('The Quote', 'what', $quote->what);
        $this->data['pagebody'] = 'quote_edit';
        $this->data['fsubmit'] = makeSubmitButton('Process Quote', 
                "Click here to validate the quotation data", 'btn-success');
        $this->render();
    }
    
    function confirm() {
        $record = $this->quotes->create();
        // Extract submitted fields
        $record->id = $this->input->post('id');
        $record->who = $this->input->post('who');
        $record->mug = $this->input->post('mug');
        $record->what = $this->input->post('what');   
        
        if (empty($record->who))
            $this->errors[] = 'You must specify an author.';
        if (strlen($record->what) < 20)
            $this->errors[] = 'A quotation must be at least 20 characters long.';
        
        if (count($this->errors) > 0) {
            $this->present($record);
            return; // make sure we don't try to save anything
        }
  
        if (empty($record->id)) 
            $this->quotes->add($record);
        else 
            $this->quotes->update($record);
        redirect('/admin');
    }
}
