<?php

	class Prediktif_model extends CI_Model{


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
    
    public function prediktif_now(){
        $m = 5;
        $y = 2023;
        $sql="SELECT sum(case when nama ='prediktif' then val else 0 end) as 'prediktif',
                sum(case when nama ='revenue' then val else 0 end) as 'revenue',
                cb 
              from (
                    SELECT sum(value)/1000000 as val ,
                        case when nama_core_bisnis like 'Seminar%' then 'seminar' 
                            when nama_core_bisnis like 'Iklan%' then 'iklan' 
                            when nama_core_bisnis like 'Award%' then 'award' else nama_core_bisnis end as cb ,'prediktif' as nama
                        FROM prediktif a inner join core_bisnis b on a.corebisnis=b.id 
                            where bulan=$m and tahun=$y group by bulan,tahun,corebisnis
                        union ALL
                        select sum(pendapatan)/1000000 val ,case when nama_core_bisnis like 'Seminar%' then 'seminar' 
                                    when nama_core_bisnis like 'Iklan%' then 'iklan' 
                                    when nama_core_bisnis like 'Award%' then 'award' else nama_core_bisnis end as cb ,'revenue' as nama 
                        from bisnis_income c
                        inner join core_bisnis d on c.core_bisnis_id=d.id
                            where bulan=$m and tahun=$y and core_bisnis_id in(1,2,3)
                        group by core_bisnis_id,bulan,tahun)
                a group by cb
               ";
        $query=$this->db->query($sql);
        
        return $query->result();
    }
    public function prediktif_cb($cb){
        $m = date('m');
        $y = date('Y');
        $sql="SELECT sum(case when nama ='prediktif' then val else 0 end) as 'prediktif',
                sum(case when nama ='revenue' then val else 0 end) as 'revenue',
                cb,bulan,tahun ,namabulan
              from (
                    SELECT sum(value)/1000000 as val ,
                        case when nama_core_bisnis like 'Seminar%' then 'seminar' 
                            when nama_core_bisnis like 'Iklan%' then 'iklan' 
                            when nama_core_bisnis like 'Award%' then 'award' else nama_core_bisnis end as cb ,
                            'prediktif' as nama,MONTHNAME(STR_TO_DATE(bulan, '%m')) namabulan,tahun ,bulan
                        FROM prediktif a inner join core_bisnis b on a.corebisnis=b.id 
                            where bulan in(2,3,4) and tahun=$y and corebisnis=$cb group by bulan,tahun,corebisnis
                        union ALL
                        select sum(pendapatan)/1000000 val ,case when nama_core_bisnis like 'Seminar%' then 'seminar' 
                                    when nama_core_bisnis like 'Iklan%' then 'iklan' 
                                    when nama_core_bisnis like 'Award%' then 'award' else nama_core_bisnis end as cb ,
                                    'revenue' as nama ,MONTHNAME(STR_TO_DATE(bulan, '%m'))namabulan ,tahun,bulan
                        from bisnis_income c
                        inner join core_bisnis d on c.core_bisnis_id=d.id
                            where bulan in(2,3,4) and tahun=$y and core_bisnis_id  =$cb
                        group by core_bisnis_id,bulan,tahun)
                a group by cb,bulan,tahun order by bulan
               ";//echo $sql;
        $query=$this->db->query($sql);
        
        return $query->result();
    }

}
?>