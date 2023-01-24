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
    }
?>
