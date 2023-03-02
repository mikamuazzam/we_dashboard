<?php

	class Bispro_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
    public function chart_rechart_re($cbid,$bulan,$tahun){
      
        $sql = "select sum(pendapatan)/1000000 jum ,'revenue' as nama ,'#BB6A04' as warna
        from bisnis_income where bulan=$bulan and tahun=$tahun and core_bisnis_id=$cbid
        union All
        SELECT sum(nominal)/1000000 jum,'expenses' as nama,'#F3D8B7' as warna FROM `bisnis_expanditure` 
        WHERE bulan=$bulan and tahun=$tahun and core_bisnis_id=$cbid 
         ";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    public function chart_rechart_programmatics($cbid,$bulan,$tahun,$website){
      
        $sql = "select sum(case when kurs='IDR' then laba else laba *(select kurs from kurs)end)/1000000 jum ,'revenue' as nama ,'#BB6A04' as warna
                from programmatics a
                inner join master_website b on a.website=b.id 
                inner join master_partner c on a.partner_id=c.id
                where month(dataadd)=$bulan and year(dataadd)=$tahun and website=$website
        union All
        SELECT sum(nominal)/1000000 jum,'expenses' as nama,'#F3D8B7' as warna FROM `bisnis_expanditure` 
        WHERE bulan=$bulan and tahun=$tahun and core_bisnis_id=$cbid 
         ";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    public function chart_we_ytd($divisi,$bulan,$tahun){
        $d=date('d');
        
        $lyear=$tahun-1;
        if($divisi==1) { $where=" and id_core_bisnis in(1,2,3)"; }
        if($divisi==2) { $where=" and id_core_bisnis in(7,8,9)"; }
        $mname= date('M', mktime(0, 0, 0, $bulan, 10)); 
        if($bulan != date('m')) 
        {
            $where2 =" ";
            $judul= $mname.' '.$lyear.' VS '.$mname.' '.$tahun;
        }
        else
        {
             $where2=" and tanggal <= '$d' ";
             $judul= $d.' '.$mname.' '.$lyear.' VS '.$d.' '.$mname.' '.$tahun;
        }
        $sql = "select tahun,nama_core_bisnis nm, '$judul' title,
                    SUM(if(tahun =$lyear ,jum,0)) as `ly`, 
                    SUM(if(tahun =$tahun ,jum,0)) as `now` 
                    from (
                         SELECT sum(pencapaian)/1000000 jum,tahun,id_core_bisnis cb 
                         FROM performance where id_divisi=$divisi $where
                         $where2
                         and tahun=$lyear  and bulan=$bulan group by tahun,id_core_bisnis
                         union all 
                         SELECT sum(pencapaian)/1000000,tahun,id_core_bisnis FROM performance
                          where id_divisi=$divisi $where  $where2
                          and tahun=$tahun and bulan=$bulan
                           group by tahun,id_core_bisnis)a 
                 inner join core_bisnis on cb =id 
                 group by 2;";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    public function chart_we_mtd($divisi,$bulan,$tahun){
        $day=date('d');
        $lmonth = $bulan-1;
        if($bulan==1)$lmonth=12;
        
        if($bulan==1) $lyear=$tahun-1; else $lyear=$tahun;
        if($divisi==1) { $where=" and id_core_bisnis in(1,2,3)"; }
        if($divisi==2) { $where=" and id_core_bisnis in(7,8,9)"; }

      
        $mname= date('M', mktime(0, 0, 0, $bulan, 10)); 
        $lmname= date('M', mktime(0, 0, 0, $lmonth, 10)); 
        if($bulan != date('m')) 
        {
            $where2 =" ";
            $judul= $lmname.' '.$lyear.' VS '.$mname.' '.$tahun;
        }
        else
        {
             $where2=" and tanggal <= '$day' ";
             $judul= $day.' '.$lmname.' '.$lyear.' VS '.$day.' '.$mname.' '.$tahun;
        }
       

        $sql = "select bulan,nama_core_bisnis nm, '$judul' title,
                    SUM(if(bulan =$lmonth ,jum,0)) as `lm`, 
                    SUM(if(bulan =$bulan ,jum,0)) as `now` 
                    from (
                         SELECT sum(pencapaian)/1000000 jum,bulan,id_core_bisnis cb 
                         FROM performance where id_divisi=$divisi $where
                         $where2  
                         and tahun=$lyear  and bulan=$lmonth group by bulan,tahun,id_core_bisnis
                         union all 
                         SELECT sum(pencapaian)/1000000,bulan,id_core_bisnis FROM performance
                          where id_divisi=$divisi $where  $where2 
                          and tahun=$tahun and bulan=$bulan
                           group by bulan,tahun,id_core_bisnis)a 
                 inner join core_bisnis on cb =id 
                 group by 2;";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }


    public function chart_ae_ytd($bulan,$tahun){
        $d=date('d');
        
        $lyear=$tahun-1;
       
        $mname= date('M', mktime(0, 0, 0, $bulan, 10)); 
        if($bulan != date('m')) 
        {
            $where =" ";
            $judul= $mname.' '.$lyear.' VS '.$mname.' '.$tahun;
        }
        else
        {
             $where=" and tanggal <= '$d' ";
             $judul= $d.' '.$mname.' '.$lyear.' VS '.$d.' '.$mname.' '.$tahun;
        }

        $sql = "select tahun,name nm, '$judul' title,
                    SUM(if(tahun =$lyear ,jum,0)) as `ly`, 
                    SUM(if(tahun =$tahun ,jum,0)) as `now` 
                    from (
                         SELECT sum(pencapaian)/1000000 jum,tahun,name 
                         FROM performance_ae a
                         inner join employee_ae b on a.employee_id =b.id 
                         where  tahun=$lyear  and bulan=$bulan $where
                         group by tahun,employee_id
                         union all 
                         SELECT sum(pencapaian)/1000000,tahun,name 
                         FROM performance_ae c
                         inner join employee_ae d  on c.employee_id =d.id 
                         where tahun=$tahun and bulan=$bulan $where
                           group by tahun,employee_id)a 
                 group by 2;";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }

    public function chart_ae_mtd($bulan,$tahun){
        $day=date('d');
        $lmonth = $bulan-1;
        if($bulan==1)$lmonth=12;
        
        if($bulan==1) $lyear=$tahun-1; else $lyear=$tahun;
              
        $mname= date('M', mktime(0, 0, 0, $bulan, 10)); 
        $lmname= date('M', mktime(0, 0, 0, $lmonth, 10)); 
        if($bulan != date('m')) 
        {
            $where2 =" ";
            $judul= $lmname.' '.$lyear.' VS '.$mname.' '.$tahun;
        }
        else
        {
             $where2=" and tanggal <= '$day' ";
             $judul= $day.' '.$lmname.' '.$lyear.' VS '.$day.' '.$mname.' '.$tahun;
        }
       
      
        $sql = "select bulan,name nm,'$judul' title,
                    SUM(if(bulan =$lmonth ,jum,0)) as `ly`, 
                    SUM(if(bulan =$bulan ,jum,0)) as `now` 
                    from (
                         SELECT sum(pencapaian)/1000000 jum,bulan,name 
                         FROM performance_ae a
                         inner join employee_ae b on a.employee_id =b.id 
                         where   tahun=$lyear  and bulan=$lmonth $where2
                         group by tahun,employee_id
                         union all 
                         SELECT sum(pencapaian)/1000000,bulan,name 
                         FROM performance_ae c
                         inner join employee_ae d  on c.employee_id =d.id 

                         where    tahun=$tahun and bulan=$bulan $where2
                           group by bulan,tahun,employee_id)a 
                 group by 2;";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    
}

?>
