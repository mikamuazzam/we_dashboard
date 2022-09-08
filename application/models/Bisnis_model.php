<?php

	class Bisnis_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
   
   
    public function comp_list(){
        
        $sql = "SELECT case when company_name like '%BPDPKS%' then 'BPDPKS' else company_name end as name ,
                sum(size)/1000000 jumlah FROM deals a 
                inner join companies b on a.id_company =b.id 
                where company_name not like '%Rina%'
                and id_stage not in(1,4) group by company_name order by sum(size) desc 
                LIMIT 0,10";
         $db2 = $this->load->database('db2', TRUE);
         $query=$db2->query($sql);
        
        return $query->result_array();

    }
    public function comp_list_tabel(){
        
        $draw = (int) $this->input->post('draw');
		$limit = (int) $this->input->post('length');
		$offset = (int) $this->input->post('start');
		$search = '%'.$this->input->post('search[value]').'%';
        if(!empty($search)) $filter=" and company_name like '%$search%'"; else $filter='';

        $sql = "SELECT  case when company_name like '%BPDPKS%' then 'BPDPKS' else company_name end as name ,
                FORMAT(sum(size),0) jumlah
                FROM deals a
                inner join companies b on a.id_company =b.id where company_name not like '%Rina%'
                and id_stage not in(1,4) $filter  group by company_name order by sum(size) desc 
                LIMIT $limit OFFSET $offset ";
         $db2 = $this->load->database('db2', TRUE);
         $query=$db2->query($sql);
        return $query->result_array();

    }
   
    public function companies(){
        $sql = "SELECT count(DISTINCT(`id_company`)) jum from deals";
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql);

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
    public function ae_new_quartal(){
    
        $sql = "select name,
        sum(case when bulanke in(1,2,3) then jumlah/3 else 0 end) as q1 ,
        sum(case when bulanke in(4,5,6) then jumlah/3 else 0 end) as q2,
        sum(case when bulanke in(7,8,9) then jumlah/3 else 0 end) as q3,
        sum(case when bulanke in(10,11,12) then jumlah/3 else 0 end) as q4
        from (
       SELECT name,case when target=0 then cast(pencapaian/pencapaian *100 as integer) else 
                   cast(pencapaian/target *100 as integer)end  as jumlah,bulan,
                   TIMESTAMPDIFF(MONTH, hiredate,CURRENT_DATE()) masa_kerja,TIMESTAMPDIFF(MONTH, hiredate,DATE(CONCAT_WS('-', 2022, bulan, 1)))+1 as bulanke
                       FROM `performance_ae` a inner join employee_ae b on employee_id=b.id
                       where TIMESTAMPDIFF(MONTH, hiredate,CURRENT_DATE()) <=12 order by name,bulan
         )a group by name;";
         $query=$this->db->query($sql); 
         return $query->result_array();


    }
    public function divisi_quartal($tahun,$divisi){
    
        $sql = "select name,sum(jumlah) as jumlah
		from (
		SELECT case when bulan in(1,2,3) then 'q1'
            when bulan in(4,5,6) then 'q2'
            when bulan in(7,8,9) then 'q3'
            when bulan in(10,11,12) then 'q4'
		 end  as name,
		sum(pencapaian)/1000000 as jumlah,bulan
           from performance a inner join divisi b on a.id_divisi = b.id 
        where id_core_bisnis not in (4,10) and a.id_divisi=$divisi and tahun='$tahun' group by bulan)a
    group by name;";
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
