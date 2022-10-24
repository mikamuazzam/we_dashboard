<?php

	class Ads_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
   
    public function get_rank(){
        $sql = "SELECT * FROM web_rank  ORDER BY `tanggal` DESC LIMIT 1";
        $query=$this->db->query($sql);
        $result = $query->row();

        return $result;
    }

    
    public function get_deposit($website){
        $sql = "SELECT tanggal_deposit,deposit FROM ads_deposit where status=0 and website=$website";
        $query=$this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function get_sisa($website){
        $sql = "SELECT sum(laba) revenue FROM programmatics where  website=$website 
        and dataadd >= (select tanggal_deposit from ads_deposit where website=$website and status=0)";
        $query=$this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function get_balance(){
        $sql = "SELECT tanggal_deposit,c.website_name,c.id,sum(laba) revenue,deposit,deposit-sum(laba)sisa,
                    sisa_slot FROM programmatics a inner join ads_deposit b on a.website=b.website 
            inner join master_website c on a.website=c.id where status=0 group by 2,3 order by c.id";
         $query=$this->db->query($sql);
        
         return $query->result();
    }
   
    public function ads_list($bulan,$tahun,$website){
        
        $draw = (int) $this->input->post('draw');
		$limit = (int) $this->input->post('length');
		$offset = (int) $this->input->post('start');
		$search = '%'.$this->input->post('search[value]').'%';
        if(!empty($search)) $filter=" and website_name like '%$search%' "; else $filter='';

      
        $sql = "SELECT  dataadd,views,clicks,ctr,cpc,cpm,laba,website_name
                FROM programmatics  a
                inner join master_website b on a.website =b.id 
                where  month(dataadd)=$bulan and year(dataadd)=$tahun $filter
                order by dataadd desc
                LIMIT $limit OFFSET $offset ";
        
        $query=$this->db->query($sql);
        return $query->result_array();

    }
    public function ads_view($bulan,$tahun,$website)
    {
    
        $sql="SELECT dataadd, 
                SUM(case when website=1 then laba else 0 end) as 'we', 
                SUM(case when website=2 then laba else 0 end) as 'hs', 
                SUM(case when website=3 then laba else 0 end) as 'pp' ,
                SUM(case when website=6 then laba else 0 end) as 'nw',
                SUM(case when website=4 then laba else 0 end) as 'kj' ,
                SUM(case when website=5 then laba else 0 end) as 'wf' 
               from programmatics where month(dataadd)=$bulan and year(dataadd)=$tahun  group by 1";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    public function ads_revenue($bulan,$tahun)
    {
    
        $sql="SELECT MONTHNAME(dataadd)bulan, 
                SUM(case when website=1 then laba else 0 end) as 'we', 
                SUM(case when website=2 then laba else 0 end) as 'hs', 
                SUM(case when website=3 then laba else 0 end) as 'pp',
                SUM(case when website=6 then laba else 0 end) as 'nw',
                SUM(case when website=4 then laba else 0 end) as 'kj' ,
                SUM(case when website=5 then laba else 0 end) as 'wf'  
               from programmatics where  year(dataadd)=$tahun group by 1 order by month(dataadd) ";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    public function monthly_revenue($bulan,$tahun)
    {
    
        $sql="SELECT MONTHNAME(dataadd)bulan, website_name,laba  
               from programmatics a
               inner join master_website b on a.website=b.id
                where  month(dataadd)=$bulan and   year(dataadd)=$tahun group by 1,2 order by month(dataadd) ";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
}
?>