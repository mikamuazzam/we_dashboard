<?php

	class Crm_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
    public function chart_list($core,$bulan='',$tahun='')
    {
        if($core=='4') $core= "4,5";
        
        $sql = "select  corebisnis,jumlah,
                    case when jumlah <=40 then 'red' 
                    when jumlah between 41 and 60 then'#ded43c'
                    when jumlah between 61 and 80 then '#6b4c1e' 
                    when jumlah between 81 and 100 then '#1e6b24' 
                    when jumlah > 100 then '#3cb5de' else 'grey' end warna from 
                    ( SELECT nama_core_bisnis corebisnis,cast(pencapaian/target*100 as integer) as jumlah
                     from performance a
                     inner join divisi b on a.id_divisi = b.id
                     inner join core_bisnis c on a.id_core_bisnis = c.id
                     where id_divisi in ($core) and bulan='$bulan' and tahun='$tahun')a";
                $query=$this->db->query($sql); 
        
        return $query->result_array();

    }
    public function chart_list_val($core,$bulan='',$tahun='')
    {
        if($core=='4') $core= "4,5";
        
        $sql = "SELECT  nama_core_bisnis  corebisnis,pencapaian/1000000 jum from performance a
                inner join divisi b on a.id_divisi = b.id
                inner join core_bisnis c on a.id_core_bisnis = c.id
                where id_divisi in ($core)  and bulan='$bulan' and tahun='$tahun'";
                $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function chart_month_val($core)
    {
        if($core=='Q1') $core= "4,5";
      
        $sql = "SELECT sum(pencapaian)/1000000 jum,sum(target)/1000000 jum_target ,
                        case when bulan=1 then 'Jan' 
                             when bulan =2 then 'Feb'
                             when bulan=3 then 'Mar'
                             when bulan=4 then 'Apr'
                             when bulan=5 then 'Mei'
                             when bulan=6 then 'Jun'
                             when bulan=7 then 'Jul'
                             when bulan=8 then 'Aug'
                             when bulan=9 then 'Sep'
                             when bulan=10 then 'Oct'
                             when bulan=11 then 'Nov'
                             when bulan=12 then 'Dec'
                             end as  bulan ,tahun FROM `performance` a
                        inner join divisi b on a.id_divisi = b.id
                    where id_divisi  in ($core) group by bulan,tahun; ";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function comp_list(){
        $sql = "SELECT case when company_name like '%BPDPKS%' then 'BPDPKS' else company_name end as name,
                sum(size)/1000000 jumlah FROM deals a
                inner join companies b on a.id_company =b.id where company_name not like '%Rina%'
                and id_stage not in(1,4) group by company_name order by sum(size) desc LIMIT 0,10";
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql);
        
        return $query->result_array();

    }
    public function deal_list(){
        $sql = "SELECT `author` salesname,sum(Size)/1000000 jumlah FROM `deals`
        where  id_stage not in(1,4) group by `author` order by sum(size)desc";
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
    public function deals($stage){
        if($stage=='10') 
        {
            $sql = "SELECT count(*)jum,id_stage from deals where id_stage !=4 ";
        }
        else if($stage=='1') 
        {
            $sql = "SELECT count(*)jum,id_stage from deals where id_stage in (1,2)";
        }
        else
        {
            $sql = "SELECT count(*)jum,id_stage from deals where id_stage = '$stage' ";
        }
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql);
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
                             when bulan=7 then 'Jul'
                             when bulan =8 then 'Aug'
                             when bulan=9 then 'Sep'
                             when bulan=10 then 'Oct'
                             when bulan=11 then 'Nov'
                             when bulan=12 then 'Dec'
                             end as  bulan ,tahun FROM `performance` 
                             group by bulan,tahun";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    public function divisi(){
        $sql = "SELECT sum(pencapaian)/1000000 as jum,nama_divisi divisi 
            FROM `performance` a
            inner join divisi b on a.id_divisi =b.id
        
            group by nama_divisi";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    public function sum_pencapaian(){
        
        $sql = "SELECT sum(pencapaian)/1000000 as jum FROM `performance` ";
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
