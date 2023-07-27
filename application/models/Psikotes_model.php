<?php

	class Psikotes_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
    
    public function list_detailscore($detail){
        
        $sql = "SELECT a.nama,a.aspek,a.detail,a.score,a.deskripsi,b.warna
                   from psikotes a
                 inner join mst_aspek b on a.detail=b.detail and a.ranges=b.score
                 WHERE  a.detail='$detail' order by 1";  
       
        $query=$this->db->query($sql); 
        return $query->result_array();

    }
    public function list_aspek($aspek){
    
        $sql = "SELECT  score,description deskripsi,warna
        from mst_aspek where detail='$aspek' order by score ";  
        $query=$this->db->query($sql); 
        return $query->result_array();

    }
    function detail_list()
    {
        $sql="SELECT aspek from mst_aspek group by aspek order by aspek";

        $query=$this->db->query($sql);
        return $query->result();
    }
    
       
}


?>