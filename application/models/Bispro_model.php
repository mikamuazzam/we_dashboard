<?php

	class Bispro_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
    public function chart_rechart_re($cbid,$bulan,$tahun){
      
        $sql = "select sum(pendapatan) jum ,'revenue' as nama ,'#809fff' as warna
        from bisnis_income where bulan=$bulan and tahun=$tahun and core_bisnis_id=$cbid
        union All
        SELECT sum(nominal)jum,'expenses' as nama,'#7575a3' as warna FROM `bisnis_expanditure` 
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
        $sql = "select tahun,nama_core_bisnis nm,
                    SUM(if(tahun =$lyear ,jum,0)) as `ly`, 
                    SUM(if(tahun =$tahun ,jum,0)) as `now` 
                    from (
                         SELECT sum(pencapaian)/1000000 jum,tahun,id_core_bisnis cb 
                         FROM performance where id_divisi=$divisi $where
                         and tanggal <= '$d' 
                         and tahun=$lyear  and bulan=$bulan group by tahun,id_core_bisnis
                         union all 
                         SELECT sum(pencapaian)/1000000,tahun,id_core_bisnis FROM performance
                          where id_divisi=$divisi $where  and tanggal <= '$d' 
                          and tahun=$tahun and bulan=$bulan
                           group by tahun,id_core_bisnis)a 
                 inner join core_bisnis on cb =id 
                 group by 2;";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    public function chart_we_mtd($divisi,$bulan,$tahun){
        $day=date('d');
        $lmonth = date('m', strtotime('-1 month'));
        
        if($bulan==1) $lyear=$tahun-1; else $lyear=$tahun;
        if($divisi==1) { $where=" and id_core_bisnis in(1,2,3)"; }
        if($divisi==2) { $where=" and id_core_bisnis in(7,8,9)"; }
        $sql = "select bulan,nama_core_bisnis nm,
                    SUM(if(bulan =$lmonth ,jum,0)) as `lm`, 
                    SUM(if(bulan =$bulan ,jum,0)) as `now` 
                    from (
                         SELECT sum(pencapaian)/1000000 jum,bulan,id_core_bisnis cb 
                         FROM performance where id_divisi=$divisi $where
                         and tanggal <= '$day' 
                         and tahun=$lyear  and bulan=$lmonth group by bulan,tahun,id_core_bisnis
                         union all 
                         SELECT sum(pencapaian)/1000000,bulan,id_core_bisnis FROM performance
                          where id_divisi=$divisi $where  and tanggal <= '$day' 
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
      
        $sql = "select tahun,name nm,
                    SUM(if(tahun =$lyear ,jum,0)) as `ly`, 
                    SUM(if(tahun =$tahun ,jum,0)) as `now` 
                    from (
                         SELECT sum(pencapaian)/1000000 jum,tahun,name 
                         FROM performance_ae a
                         inner join employee_ae b on a.employee_id =b.id 
                         where  tanggal <= '$d' and tahun=$lyear  and bulan=$bulan
                         group by tahun,employee_id
                         union all 
                         SELECT sum(pencapaian)/1000000,tahun,name 
                         FROM performance_ae c
                         inner join employee_ae d  on c.employee_id =d.id 

                         where tanggal <= '$d'   and tahun=$tahun and bulan=$bulan
                           group by tahun,employee_id)a 
                 group by 2;";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }

    public function chart_ae_mtd($bulan,$tahun){
        $day=date('d');
        $lmonth = date('m', strtotime('-1 month'));
        
        if($bulan==1) $lyear=$tahun-1; else $lyear=$tahun;
      
        $sql = "select bulan,name nm,
                    SUM(if(bulan =$lyear ,jum,0)) as `ly`, 
                    SUM(if(bulan =$tahun ,jum,0)) as `now` 
                    from (
                         SELECT sum(pencapaian)/1000000 jum,bulan,name 
                         FROM performance_ae a
                         inner join employee_ae b on a.employee_id =b.id 
                         where  tanggal <= '$d' and tahun=$lyear  and bulan=$lmonth
                         group by tahun,employee_id
                         union all 
                         SELECT sum(pencapaian)/1000000,bulan,name 
                         FROM performance_ae c
                         inner join employee_ae d  on c.employee_id =d.id 

                         where tanggal <= '$d'   and tahun=$tahun and bulan=$bulan
                           group by bulan,tahun,employee_id)a 
                 group by 2;";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    
}

?>
