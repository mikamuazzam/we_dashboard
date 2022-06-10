<?php

	class Crm_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
    public function chart_list($core,$bulan='',$tahun='')
    {
        $sql = "select corebisnis,jumlah,
                    case when jumlah <=40 then 'red' 
                    when jumlah between 41 and 60 then'#ded43c'
                    when jumlah between 61 and 80 then '#6b4c1e' 
                    when jumlah between 81 and 100 then '#1e6b24' 
                    when jumlah > 100 then '#3cb5de' else 'grey' end warna from 
                    ( SELECT core_bisnis corebisnis,cast(pencapaian/target*100 as integer) as jumlah
                     from performance where divisi='$core' and bulan='$bulan' and tahun='$tahun')a";
                $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function chart_list_val($core,$bulan='',$tahun='')
    {
        
        $sql = "SELECT  core_bisnis  corebisnis,pencapaian/1000000 jum from performance 
                where divisi='$core'  and bulan='$bulan' and tahun='$tahun'";
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
                             when bulan=5 then 'Mei'
                             when bulan=6 then 'Jun'
                             end as  bulan ,tahun FROM `performance` 
                    where divisi ='$core' group by bulan,tahun; ";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function comp_list(){
        $sql = "SELECT name ,sum(size)/1000000 jumlah FROM deals where name not like '%Rina%'
                and stage not in('CANCEL','NEW PROGRESS') group by name order by sum(size) desc LIMIT 0,10";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function deal_list(){
        $sql = "SELECT `owner_fullname` salesname,sum(Size)/1000000 jumlah FROM `deals` group by `Owner_Fullname` order by sum(size)desc";
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
        if($stage=='won') 
        {
            $sql = "SELECT count(*)jum,stage from deals where stage in ('INVOICE SENT','AGING','PAYMENT (CASH IN)','WON (PO)')";
        }
        else if($stage=='New Progress') 
        {
            $sql = "SELECT count(*)jum,stage from deals where stage in ('New Progress','MEETING HELD')";
        }
        else
        {
            $sql = "SELECT count(*)jum,stage from deals where stage = '$stage' ";
        }
       
        $query=$this->db->query($sql);
        $result = $query->row();

        return $result;

    }
    public function divisi_perbulan(){
        $sql = " SELECT sum(pencapaian)/1000000 as jum,
                            case when bulan=1 then 'Jan' 
                             when bulan =2 then 'Feb'
                             when bulan=3 then 'Mar'
                             when bulan=4 then 'Apr'
                             when bulan=5 then 'Mei'
                             when bulan=6 then 'Jun'
                             end as  bulan ,tahun FROM `performance` group by bulan,tahun";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    public function divisi(){
        $sql = "SELECT sum(pencapaian)/1000000 as jum,divisi FROM `performance` group by divisi";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    public function sum_pencapaian(){
        
        $sql = "SELECT sum(pencapaian)/1000000 as jum FROM `performance` where divisi in('HS','POPULIS','WE','Q1','WEA');";
        $query=$this->db->query($sql);
        $result = $query->row();

        return $result;
    }
    public function list_acara($bulan='',$tahun=''){
        
        if(empty($bulan)) $bulan=date('m');
        if(empty($tahun)) $tahun=date('Y');
        $sql = "SELECT tanggal,start_time,finish_time,deskripsi acara,present,status, 
        case when tanggal between CURRENT_DATE and CURRENT_DATE+ 3 then 'pink' end as warna 
        from cal_event where month(tanggal)= '$bulan' and year(tanggal)='$tahun' order by tanggal ";  
        $query=$this->db->query($sql); 
        return $query->result_array();

    }
    
    }
?>
