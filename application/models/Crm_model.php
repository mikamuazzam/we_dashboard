<?php

	class Crm_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
   
    
    
    public function chart_list($core)
    {
        $sql = "SELECT  core_bisnis  corebisnis,pencapaian, case when pencapaian <=40 then '#691f15'
                when pencapaian between 41 and 60 then'#ded43c'
                when pencapaian between 61 and 80 then '#6b4c1e' 
                when pencapaian between 81 and 100 then '#1e6b24'
                when pencapaian > 100 then '#3cb5de' else 'grey' end warna from performance 
                where divisi='$core'  and bulan=3";
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
        $sql = "SELECT count(DISTINCT(`name`)) jum from deals";
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
        $sql = "SELECT sum(pencapaian)/count(*) as jum,divisi FROM `performance` where bulan=3 group by divisi";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    public function list_acara(){
        $sql = "SELECT tanggal,start_time,finish_time,deskripsi acara,present from cal_event order by tanggal desc";
        $query=$this->db->query($sql);
        return $query->result();

    }
    
    }
?>