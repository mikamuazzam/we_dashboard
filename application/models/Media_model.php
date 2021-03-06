<?php

	class Media_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
   
    public function get_rank(){
        $sql = "SELECT * FROM web_rank  ORDER BY `tanggal` DESC LIMIT 1";
        $query=$this->db->query($sql);
        $result = $query->row();

        return $result;
    }

    public function chart_list_we(){
        $sql = "SELECT DATE_FORMAT(tanggal, '%d %M') tgl ,we_nilai we FROM web_rank  
        where DATE(tanggal) > DATE_SUB(CURDATE(), INTERVAL 7 DAY) order by tanggal    LIMIT 7";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function chart_list_populis(){
        $sql = "SELECT DATE_FORMAT(tanggal, '%d %M') tgl ,populis_nilai populis FROM web_rank  
        where DATE(tanggal) > DATE_SUB(CURDATE(), INTERVAL 7 DAY)  order by tanggal   LIMIT 7";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function chart_list_hs(){
        $sql = "SELECT DATE_FORMAT(tanggal, '%d %M') tgl ,hs_nilai hs FROM web_rank  
        where DATE(tanggal) > DATE_SUB(CURDATE(), INTERVAL 7 DAY)  order by tanggal   LIMIT 7";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function chart_list_tv(){
        $sql = "SELECT DATE_FORMAT(tanggal, '%d %M') tgl ,we_tv tv FROM web_rank  
        where DATE(tanggal) > DATE_SUB(CURDATE(), INTERVAL 7 DAY) order by tanggal    LIMIT 7";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function chart_list(){
        $sql = "SELECT DATE_FORMAT(tanggal, '%d %M') tgl ,we_tv tv FROM web_rank  
        where DATE(tanggal) > DATE_SUB(CURDATE(), INTERVAL 7 DAY) order by tanggal    LIMIT 7";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function chart_web(){
        $sql = "SELECT DATE_FORMAT(tanggal, '%d %M') tgl,we,hs,populis,konten_jatim,we_tv FROM web_rank  ORDER BY `tanggal` desc  LIMIT 7";
        $query=$this->db->query($sql);
        
        return $query->result();

    }
    public function chart_web_last(){
        $sql = "SELECT DATE_FORMAT(tanggal, '%d %M') tgl,we,hs,populis,konten_jatim,we_tv FROM web_rank ORDER BY `tanggal`  desc LIMIT 1,1";
        $query=$this->db->query($sql);
        $result = $query->row();
        return $result;
    }
       
    }
?>