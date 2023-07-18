<?php

	

    class Chat_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
    
        public function saveMessage($sender, $message)
        {
           
            $sql = "insert into chat (`from`,message,sent) value('$sender','$message',CURRENT_TIMESTAMP())";  
            $query=$this->db->query($sql); 
           
        }
    
        public function getMessages()
        {
            $sql = "SELECT b.first_name,a.id,a.from,a.to,a.message,a.sent,b.first_name,b.em_image,date(a.sent) as tgl,time(sent) as jam
                    from chat a inner join employee b on a.from = b.id order by sent ";  
            $query=$this->db->query($sql); 
            return $query->result_array();

        }
    }
?>