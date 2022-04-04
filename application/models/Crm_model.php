<?php

	class Crm_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
   
    
    
    public function chart_list(){
        $sql = "SELECT CONCAT(divisi,' ', core_bisnis ) as corebisnis,pencapaian from performance";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }

    public function comp_list(){
        $sql = "SELECT name ,sum(size)/1000000 jumlah FROM deals group by name order by sum(size) desc LIMIT 0,10";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function deal_list(){
        $sql = "SELECT owner_fullname salesname,sum(Size)/1000000 jumlah FROM `deals` group by Owner_Fullname order by sum(size)desc";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    
    public function companies(){
        $sql = "SELECT count(*) jum,`name` from companies";
        $query=$this->db->query($sql);
        $result = $query->row();

        return $result;

    }
    public function deals($stage){
        
        $sql = "SELECT count(*)jum,stage from deals where stage='$stage' ";
        $query=$this->db->query($sql);
        $result = $query->row();

        return $result;

    }
    
    public function divisi(){
        $sql = "SELECT sum(pencapaian)/count(*) as jum,divisi FROM `performance` group by divisi";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    public function list_acara(){
        $sql = "SELECT tanggal,start_time,finish_time,deskripsi acara,venue from cal_event order by tanggal";
        $query=$this->db->query($sql);
        return $query->result();

    }
    
    }
?>