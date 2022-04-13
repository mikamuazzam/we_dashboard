<?php

	class Crm_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
   
    
    
    public function chart_list($core)
    {
        $month=date('m')-1;
        $sql = "select corebisnis,jumlah,
                    case when jumlah <=40 then '#691f15' 
                    when jumlah between 41 and 60 then'#ded43c'
                    when jumlah between 61 and 80 then '#6b4c1e' 
                    when jumlah between 81 and 100 then '#1e6b24' 
                    when jumlah > 100 then '#3cb5de' else 'grey' end warna from 
                    ( SELECT core_bisnis corebisnis,cast(pencapaian/target*100 as integer) as jumlah
                     from performance where divisi='$core' and bulan='$month')a";
                $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function chart_list_val($core)
    {
        $month=date('m')-1;
        $sql = "SELECT  core_bisnis  corebisnis,pencapaian/1000000 jum from performance 
                where divisi='$core'  and bulan='$month'";
                $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function chart_month_val($core)
    {
       
        $sql = "SELECT sum(pencapaian)/1000000 jum,sum(target)/1000000 jum_target ,
                        case when bulan=1 then 'Jan' 
                             when bulan =2 then 'Feb'
                             when bulan=3 then 'Mar'
                             when bulan=4 then 'Apr'
                             end as  bulan ,tahun FROM `performance` 
                    where divisi ='$core' group by bulan,tahun; ";
                $query=$this->db->query($sql);
        
        return $query->result_array();

    }

    

    public function comp_list(){
        $sql = "SELECT name ,sum(size)/1000000 jumlah FROM deals group by name order by sum(size) desc LIMIT 0,10";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function deal_list(){
        $sql = "SELECT `owner fullname` salesname,sum(Size)/1000000 jumlah FROM `deals` group by `Owner Fullname` order by sum(size)desc";
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
        $sql = "SELECT sum(pencapaian)/1000000 as jum,divisi FROM `performance` group by divisi";
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