<?php

	class Bisnis_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
   
   
    public function comp_list(){
        
        
        $sql = "SELECT name ,sum(size)/1000000 jumlah FROM deals where name not like '%Rina%'
                and stage not in('CANCEL','NEW PROGRESS') group by name order by sum(size) desc 
                LIMIT 0,10";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function comp_list_tabel(){
        
        $draw = (int) $this->input->post('draw');
		$limit = (int) $this->input->post('length');
		$offset = (int) $this->input->post('start');
		$search = '%'.$this->input->post('search[value]').'%';
        if(!empty($search)) $filter=" and name like '%$search%'"; else $filter='';

        $sql = "SELECT name ,FORMAT(sum(size),0) jumlah FROM deals where name not like '%Rina%'
                and stage not in('CANCEL','NEW PROGRESS') $filter  group by name order by sum(size) desc 
                LIMIT $limit OFFSET $offset ";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
   
    public function companies(){
        $sql = "SELECT count(DISTINCT(`name`)) jum from deals";
        $query=$this->db->query($sql);
        $result = $query->row();

        return $result;
    }
    
   
    
    public function sum_pencapaian(){
        
        $sql = "SELECT sum(pencapaian)/1000000 as jum FROM `performance`  where id_divisi != 5 ";
        $query=$this->db->query($sql);
        $result = $query->row();

        return $result;
    }
    public function list_acara($bulan='',$tahun=''){
        
        if(empty($bulan)) $bulan=date('m');
        if(empty($tahun)) $tahun=date('Y');
        $sql = "SELECT tanggal,start_time,finish_time,deskripsi acara,present,status, 
        case when tanggal between CURRENT_DATE and CURRENT_DATE+ 3 then 'pink' end as warna ,
        cost,revenue,cast(revenue/cost *100 as integer) as value
        from cal_event where month(tanggal)= '$bulan' and year(tanggal)='$tahun' order by tanggal ";  
        $query=$this->db->query($sql); 
        return $query->result_array();

    }
    public function ae_new_persen($bulan='',$tahun=''){
        
        if(empty($bulan)) $bulan=date('m');
        if(empty($tahun)) $tahun=date('Y');
       
        $sql = "select  name,jumlah,
                case when jumlah <=40 then 'red' 
                when jumlah between 41 and 60 then'#ded43c'
                when jumlah between 61 and 80 then '#6b4c1e' 
                when jumlah between 81 and 100 then '#1e6b24' 
                when jumlah > 100 then '#3cb5de' else 'grey' end warna from 
                ( SELECT name,cast(pencapaian/target *100 as integer)as jumlah
                FROM `performance_ae` a inner join employee_ae b on employee_id=b.id
                where TIMESTAMPDIFF(MONTH, hiredate,CURRENT_DATE()) <=12 and bulan=$bulan and tahun=$tahun )a";
         $query=$this->db->query($sql); 
         return $query->result_array();


    }
    public function ae_new_value($bulan='',$tahun=''){
        
        if(empty($bulan)) $bulan=date('m');
        if(empty($tahun)) $tahun=date('Y');
       
        $sql = "SELECT name,pencapaian/1000000 as jumlah,target/1000000 as target
                FROM `performance_ae` a inner join employee_ae b on employee_id=b.id
                where TIMESTAMPDIFF(MONTH, hiredate,CURRENT_DATE()) <=12 and bulan=$bulan 
                and tahun=$tahun ";
         $query=$this->db->query($sql); 
         return $query->result_array();


    }
    public function ae_persen($bulan='',$tahun=''){
        
        if(empty($bulan)) $bulan=date('m');
        if(empty($tahun)) $tahun=date('Y');
       
        $sql = "select  name,jumlah,
                case when jumlah <=40 then 'red' 
                when jumlah between 41 and 60 then'#ded43c'
                when jumlah between 61 and 80 then '#6b4c1e' 
                when jumlah between 81 and 100 then '#1e6b24' 
                when jumlah > 100 then '#3cb5de' else 'grey' end warna from 
                ( SELECT name,cast(pencapaian/target *100 as integer)as jumlah
                FROM `performance_ae` a inner join employee_ae b on employee_id=b.id
                where TIMESTAMPDIFF(MONTH, hiredate,CURRENT_DATE()) > 12 and bulan=$bulan and tahun=$tahun )a";
         $query=$this->db->query($sql); 
         return $query->result_array();


    }
    public function ae_value($bulan='',$tahun=''){
        
        if(empty($bulan)) $bulan=date('m');
        if(empty($tahun)) $tahun=date('Y');
       
        $sql = "SELECT name,pencapaian/1000000 as jumlah,target/1000000 as target
                FROM `performance_ae` a inner join employee_ae b on employee_id=b.id
                where TIMESTAMPDIFF(MONTH, hiredate,CURRENT_DATE()) > 12 and bulan=$bulan 
                and tahun=$tahun ";
         $query=$this->db->query($sql); 
         return $query->result_array();


    }
    
    
    public function chart_list_val($core,$bulan='',$tahun='')
    {
       
        
        $sql = "SELECT  nama_core_bisnis  corebisnis,pencapaian/1000000 jum,target/1000000 as target from performance a
                inner join divisi b on a.id_divisi = b.id
                inner join core_bisnis c on a.id_core_bisnis = c.id
                where id_core_bisnis not in (4,10) and id_divisi =$core  and bulan='$bulan' and tahun='$tahun'";
                $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    
}
?>
