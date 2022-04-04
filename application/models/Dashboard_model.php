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

    public function chart_list(){
        $sql = "SELECT DATE_FORMAT(tanggal, '%d %M') tgl,we_nilai we,hs_nilai hs,populis_nilai populis,topcore,we_tv FROM web_rank  where tanggal >'2022-03-27' ORDER BY `tanggal` LIMIT 7";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function chart_web(){
        $sql = "SELECT DATE_FORMAT(tanggal, '%d %M') tgl,we,hs,populis,topcore,we_tv FROM web_rank  ORDER BY `tanggal` desc  LIMIT 7";
        $query=$this->db->query($sql);
        
        return $query->result();

    }
    public function chart_web_last(){
        $sql = "SELECT DATE_FORMAT(tanggal, '%d %M') tgl,we,hs,populis,topcore,we_tv FROM web_rank ORDER BY `tanggal`  desc LIMIT 1,1";
        $query=$this->db->query($sql);
        $result = $query->row();
        return $result;
    }
       
    }
?>