<?php

	class Bispro_analisis_model extends CI_Model{


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
    
    function master_website()
    {
        $sql = "select  id,website_name from master_website  ";
        $query=$this->db->query($sql);
        
        return $query->result();
    }

    function master_expanditure()
    {
        $sql = "select  kategori_id ,name from bisnis_expanditure a
                inner join mst_expanditure b on a.kategori_id=b.id  group by 1,2";
        $query=$this->db->query($sql);
        
        return $query->result();
    }
    public function chart_rechart_re2($cbid,$bulan,$tahun,$lweb,$lexp){
        
        $lexp = str_replace("[",'',$lexp);
        $lexp = str_replace("]",'',$lexp);
        $sql = "select sum(pendapatan)/1000000 jum ,'revenue' as nama ,'#BB6A04' as warna
        from bisnis_income where bulan=$bulan and tahun=$tahun and core_bisnis_id=$cbid
        union All
        SELECT sum(nominal)/1000000 jum,'expenses' as nama,'#F3D8B7' as warna FROM `bisnis_expanditure` 
        WHERE bulan=$bulan and tahun=$tahun and core_bisnis_id=$cbid  and kategori_id  in($lexp)
         ";
        
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    public function chart_rechart_programmatics2($cbid,$bulan,$tahun,$website,$lweb,$lexp){
      
        $lexp = str_replace("[",'',$lexp);
        $lexp = str_replace("]",'',$lexp);
        $sql = "select sum(case when kurs='IDR' then laba else laba *(select kurs from kurs)end)/1000000 jum ,'revenue' as nama ,'#BB6A04' as warna
                from programmatics a
                inner join master_website b on a.website=b.id 
                inner join master_partner c on a.partner_id=c.id
                where month(dataadd)=$bulan and year(dataadd)=$tahun and website=$website
        union All
        SELECT sum(nominal)/1000000 jum,'expenses' as nama,'#F3D8B7' as warna FROM `bisnis_expanditure` 
        WHERE bulan=$bulan and tahun=$tahun and core_bisnis_id=$cbid and kategori_id  in($lexp)
         "; 
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    
}

?>
