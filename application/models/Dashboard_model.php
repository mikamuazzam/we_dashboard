<?php

	class Dashboard_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
   
    public function get_rank(){
        $sql = "SELECT * FROM web_rank  ORDER BY `tanggal` DESC LIMIT 1";
        $query=$this->db->query($sql);
        $result = $query->row();

        return $result;
    }

    public function chart_list_we($website){
        $sql = "SELECT DATE_FORMAT(tanggal, '%d %M') tgl ,$website nilai FROM web_rank  
        where DATE(tanggal) > DATE_SUB(CURDATE(), INTERVAL 7 DAY) order by tanggal    LIMIT 7";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
  
    public function chart_web(){
        $sql = "SELECT DATE_FORMAT(tanggal, '%d %M') tgl,we,hs,populis,we_tv FROM web_rank  ORDER BY `tanggal` desc  LIMIT 7";
        $query=$this->db->query($sql);
        
        return $query->result();

    }
    public function chart_web_last(){
        $sql = "SELECT DATE_FORMAT(tanggal, '%d %M') tgl,we,hs,populis,we_tv,konten_jatim FROM web_rank ORDER BY `tanggal`  desc LIMIT 1,1";
        $query=$this->db->query($sql);
        $result = $query->row();
        return $result;
    }
       
    }
?>