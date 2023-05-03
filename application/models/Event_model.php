<?php

	class Event_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}

    public function list_acara($bulan='',$tahun=''){
        
        if(empty($bulan)) $bulan=date('m');
        if(empty($tahun)) $tahun=date('Y');
        $sql = "SELECT  tanggal,start_time,finish_time,deskripsi acara,present,status, 
        case when tanggal between CURRENT_DATE and CURRENT_DATE+ 3 then 'pink' end as warna 
        from cal_event where month(tanggal)= '$bulan' and year(tanggal)='$tahun' order by tanggal ";  
        $query=$this->db->query($sql); 
        return $query->result_array();

    }
    public function list_event2(){
        $sql = "select b.name tipe_award,tema,schedule, budget,tipe_id,a.id as event_id,ROUND(bobot, 2) as persen ,
                    case when DATEDIFF(schedule,CURRENT_DATE)  <=7 and bobot <= 80 then 'red' end as warna , sales,event_id
                    from events a 
                    left join tipe_events b on b.id=a.tipe_id 
                    left join (SELECT sum(bobot)/6 as bobot,a.event_id 
                            from daily_tasks a 
                            inner join detail_workflows b on a.detail_id=b.id
                            where status = 'done' and a.workflow_id != 8 and a.status_id=1 group by 2) c on a.id=c.event_id 
                    left join (select sum(amount_po) as sales,id_product from deals where  id_stage in (3,5,6,7) group by 2) d on d.id_product=a.product_id
                    where a.status_id=1 and schedule >= CURRENT_DATE";  
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql); 
         return $query->result();
    }
    public function list_event(){
        
        $sql = "select b.name tipe_award,tema,schedule, FORMAT(budget,0) as budget,tipe_id,a.id as event_id,ROUND(bobot, 2) as persen ,
                case when DATEDIFF(schedule,CURRENT_DATE)  <=7 and bobot < 90 then 'red' end as warna 
                from events a 
                left join tipe_events b on b.id=a.tipe_id 
                left join (SELECT sum(bobot)/6 as bobot,a.event_id 
                        from daily_tasks a 
                    inner join detail_workflows b on a.detail_id=b.id
                        where status = 'done' and a.workflow_id != 8 and a.status_id=1 group by 2) c on a.id=c.event_id 
                where a.status_id=1 and schedule >= CURRENT_DATE";  
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql); 
        return $query->result_array();

    }
    public function list_event_det($event_id){
        
        $sql = "SELECT sum(bobot)as bobot,c.name nama_workflow from daily_tasks a 
        inner join detail_workflows b on a.detail_id=b.id
         inner join workflows c on a.workflow_id=c.id
          where a.event_id=$event_id and a.status='done' group by 2";  
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql); 
        return $query->result_array();

    }

    

}


?>