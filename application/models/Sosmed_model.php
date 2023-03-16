<?php

	class Sosmed_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}

    function get_laba($partner)
    {
        $sql="SELECT sum(laba) as laba  FROM programmatics 
                where month(dataadd)=month(CURRENT_DATE) and year(dataadd)= year(CURRENT_DATE)
                and website=1  and partner_id=$partner
                ";
        $query=$this->db->query($sql);
        $result = $query->row();
        $laba= $result->laba;
        return $laba;
    }
    function get_laba_all($website)
    {
        $sql="SELECT sum(laba) as laba  FROM programmatics 
                where month(dataadd)=month(CURRENT_DATE) and year(dataadd)= year(CURRENT_DATE)
                and website=$website and partner_id in(11,12)
                ";
        $query=$this->db->query($sql);
        $result = $query->row();
        $laba= $result->laba;
        return $laba;
    }
    
    public function total_perbulan(){
        $sql="SELECT sum(laba) as laba,
                MONTHNAME(dataadd)bulan,year(dataadd)tahun FROM programmatics 
                where dataadd >= (LAST_DAY(NOW() - INTERVAL 1 MONTH) + INTERVAL 1 DAY ) - INTERVAL 3 MONTH 
                and partner_id in(11,12)
                group by MONTHNAME(dataadd),year(dataadd) order by year(dataadd),month(dataadd) LIMIT 0,2;
               ";
       $query=$this->db->query($sql);
       return $query->result();
    }

}
?>