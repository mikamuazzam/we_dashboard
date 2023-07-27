<?php

	class Income_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
    
    public function list_event(){
        
       

        $sql = "SELECT tema,id,schedule from events where status_id=1 and partner_id=6 ";  
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql); 
         return $query->result();

    }
   
    
       
}


?>