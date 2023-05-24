<?php

	class Event_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}

    public function sum_event($bulan){

        $curr_month=date('m');
        $curr_year=date('Y');
        if($bulan==1) { $month=$curr_month; $tahun=$curr_year;}
        if($bulan==2) { $month=$curr_month +1; $tahun=$curr_year; if($curr_month==12) $tahun = $curr_year+1;}
        if($bulan==3) { $month=$curr_month +2; $tahun=$curr_year; if($curr_month==11)$tahun = $curr_year+1;}

        if($month > 12) $month= $month-12;

        $sql = "SELECT count(*) as jum,name as nama,sum(sales)/1000000 as rev,
                case when b.id = 3 then '#FAA491' 
                     when b.id= 4 then  '#91E8FA'
                     when b.id=5 then  '#AEFA91'
                     when b.id=6 then  '#F291FA' else 'blue' end as warna from events a 
                inner join tipe_events b on a.tipe_id=b.id 
                left join (select sum(amount_po) as sales,id_product from deals where  id_stage in (3,5,6,7) group by 2) d on d.id_product=a.product_id
                where month(SCHEDULE)=$month and year(schedule)=$tahun and status_id=1 group by tipe_id";  
        $db2 = $this->load->database('db2', TRUE); 
        $query=$db2->query($sql); 
        return $query->result_array();


    }
    public function list_acara($bulan){
        
        $curr_month=date('m');
        $curr_year=date('Y');
        if($bulan==1) { $month=$curr_month; $tahun=$curr_year;}
        if($bulan==2) { $month=$curr_month +1; $tahun=$curr_year; if($curr_month==12) $tahun = $curr_year+1;}
        if($bulan==3) { $month=$curr_month +2; $tahun=$curr_year; if($curr_month==11)$tahun = $curr_year+1;}

        if($month > 12) $month= $month-12;
        $sql = "SELECT  tanggal,start_time,finish_time,deskripsi acara,present,status, 
        case when tanggal between CURRENT_DATE and CURRENT_DATE+ 3 then '#FDB3D7' end as warna 
        from cal_event where month(tanggal)= '$month' and year(tanggal)='$tahun' order by tanggal ";  
        $query=$this->db->query($sql); 
        return $query->result_array();

    }
    public function list_event2($bulan){
        $curr_month=date('m');
        $curr_year=date('Y');
        if($bulan==1) { $month=$curr_month; $tahun=$curr_year;}
        if($bulan==2) { $month=$curr_month +1; $tahun=$curr_year; if($curr_month==12) $tahun = $curr_year+1;}
        if($bulan==3) { $month=$curr_month +2; $tahun=$curr_year; if($curr_month==11)$tahun = $curr_year+1;}

        if($month > 12) $month= $month-12;

        $sql = "select b.name tipe_award,tema,schedule, budget,tipe_id,a.id as event_id,ROUND(bobot, 2) as persen ,
                        case when DATEDIFF(schedule,CURRENT_DATE) > 0 then DATEDIFF(schedule,CURRENT_DATE) else 0 end as 'day',
                        case when DATEDIFF(schedule,CURRENT_DATE)  between 7 and 22 and  bobot <= 21 then 'red'
                            when DATEDIFF(schedule,CURRENT_DATE)  between 3 and 7  and bobot <= 60 then 'red'
                            when DATEDIFF(schedule,CURRENT_DATE)  between 1 and 3 and bobot <= 90 then 'red'
                            when schedule < CURRENT_DATE then 'green'
                        else '' end as warna , 
                        case when DATEDIFF(schedule,CURRENT_DATE)  between 7 and 22  then '21%'
                        when DATEDIFF(schedule,CURRENT_DATE)  between 3 and 7  then '60%'
                        when DATEDIFF(schedule,CURRENT_DATE)  between 1 and 3 then '90%'
                        when schedule < CURRENT_DATE then '100%'
                        else '5%' end as benchmark,
                        sales,event_id
                    from events a 
                    left join tipe_events b on b.id=a.tipe_id 
                    left join (SELECT case when schedule < CURRENT_DATE then sum(bobot)/7 else sum(bobot)/6 end as bobot,a.event_id 
                            from daily_tasks a 
                            inner join detail_workflows b on a.detail_id=b.id
                            inner join events e on e.id=a.event_id
                            where a.status = 'done' and a.workflow_id != 8 and a.status_id=1 group by 2) c on a.id=c.event_id 
                    left join (select sum(amount_po) as sales,id_product from deals where  id_stage in (3,5,6,7) group by 2) d on d.id_product=a.product_id
                    where a.status_id=1 and month(schedule)=$month and year(schedule)=$tahun order by schedule";  
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql); 
         return $query->result();
    }
    /*public function list_event(){
        
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

    }*/
    public function list_event_det($event_id){
        
        
        $sql = "SELECT name as nama,case when bobot is null then 0 else bobot end as progress,e.id as workflowid,
                        case when DATEDIFF((SELECT schedule from events where id=$event_id),CURRENT_DATE) > 0 then DATEDIFF((SELECT schedule from events where id=$event_id),CURRENT_DATE) else 0 end as 'day',
                        case when DATEDIFF((SELECT schedule from events where id=$event_id),CURRENT_DATE)  between 7 and 22 then H22
                            when DATEDIFF((SELECT schedule from events where id=$event_id),CURRENT_DATE)  between 3 and 7   then H7
                            when DATEDIFF((SELECT schedule from events where id=$event_id),CURRENT_DATE)  between 1 and 3  then H3
                            when (SELECT schedule from events where id=$event_id) < CURRENT_DATE then Hplus
                        else '0' end as bm ,
                        case when DATEDIFF((SELECT schedule from events where id=$event_id),CURRENT_DATE)  between 7 and 22 and bobot < H22 then '#FDB3D7'
                            when DATEDIFF((SELECT schedule from events where id=$event_id),CURRENT_DATE)  between 3 and 7  and bobot < H7 then '#FDB3D7'
                            when DATEDIFF((SELECT schedule from events where id=$event_id),CURRENT_DATE)  between 1 and 3  and bobot < H3 then '#FDB3D7'
                        
                            when (SELECT schedule from events where id=$event_id) < CURRENT_DATE and bobot < 100 then '#FDB3D7'
                        else '' end as warna 
                     from workflows e 
                     left join (SELECT sum(bobot)as bobot,c.name nama_workflow,c.id workflowid 
                                from daily_tasks a 
                                inner join detail_workflows b on a.detail_id=b.id 
                                inner join workflows c on a.workflow_id=c.id 
                                where a.event_id=$event_id and a.status='done' and a.status_id=1 group by 2,3)d
                                 on d.workflowid=e.id
                ";  
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql); 
        return $query->result_array();

    }

    public function list_task_det($event_id,$workflowid){
        
        $q="SELECT tipe_id from events where id=$event_id ";
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($q);
        $result = $query->row();
        $tipe_id=$result->tipe_id;

        
        if($workflowid == 4 || $workflowid==5 || $workflowid ==6 || $workflowid ==8  ) 
        {
           $q_add='';
            if ($tipe_id==6 && $workflowid ==5 ) $q_add=" and tipe_event_id =6"; 
        $sql = "SELECT detail,bobot,case when stt_det is null then 'Not Yet' else stt_det end as stt ,kegiatan
                FROM `detail_workflows` a 
                    left join (select detail_id det_id,status stt_det,kegiatan from daily_tasks 
                                where event_id=$event_id and status_id=1  and status='done')b on a.id = b.det_id 
                where workflow_id=$workflowid  $q_add;
                "; 
        }
        else
        {
            $sql = "SELECT detail,bobot,case when stt_det is null then 'Not Yet' else stt_det end as stt ,kegiatan
            FROM `detail_workflows` a 
                left join (select detail_id det_id,status stt_det,kegiatan from daily_tasks 
                            where event_id=$event_id and status_id=1 and status='done' )b on a.id = b.det_id 
            where workflow_id=$workflowid and tipe_event_id= $tipe_id            "; 
   
        } 
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql); 
        return $query->result_array();

    }

    

}


?>