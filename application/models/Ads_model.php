<?php

	class Ads_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}


    
    public function get_deposit($website){
        $sql = "SELECT tanggal_deposit,deposit FROM ads_deposit where status=0 and website=$website";
        $query=$this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function get_sisa($website){
        $sql = "SELECT sum(laba) revenue FROM programmatics where  website=$website 
        and dataadd >= (select tanggal_deposit from ads_deposit 
        where website=$website and status=0 and partner_id=4)";
        $query=$this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function get_balance(){
        $sql = "SELECT tanggal_deposit,c.website_name,c.id,sum(laba) revenue,deposit,deposit-sum(laba)sisa,
                    sisa_slot FROM programmatics a inner join ads_deposit b on a.website=b.website 
            inner join master_website c on a.website=c.id where status=0 and partner_id=4 group by 2,3 order by c.id";
         $query=$this->db->query($sql);
         return $query->result();
    }
   
    public function ads_list($bulan,$tahun,$partner){
        
        $draw = (int) $this->input->post('draw');
		$limit = (int) $this->input->post('length');
		$offset = (int) $this->input->post('start');
		$search = '%'.$this->input->post('search[value]').'%';
        if(!empty($search)) $filter=" and website_name like '%$search%' "; else $filter='';

      
        $sql = "SELECT  dataadd,clicks,ctr,cpc,cpm,case when partner_id=4 then '-' else fillrate end as fillrate,laba,website_name,c.name
                FROM programmatics  a
                inner join master_website b on a.website =b.id 
                inner join master_partner c on a.partner_id=c.id
                where  month(dataadd)=$bulan and year(dataadd)=$tahun and partner_id=$partner $filter
                order by dataadd desc
                LIMIT $limit OFFSET $offset ";
        
        $query=$this->db->query($sql);
        return $query->result_array();

    }
    public function ads_view($bulan,$tahun,$partner)
    {
    
        $sql="SELECT dataadd, 
                SUM(case when website=1 then laba else 0 end) as 'we', 
                SUM(case when website=2 then laba else 0 end) as 'hs', 
                SUM(case when website=3 then laba else 0 end) as 'pp' ,
                SUM(case when website=6 then laba else 0 end) as 'nw',
                SUM(case when website=4 then laba else 0 end) as 'kj' ,
                SUM(case when website=5 then laba else 0 end) as 'wf' 
               from programmatics where month(dataadd)=$bulan and year(dataadd)=$tahun 
               and partner_id=$partner group by 1";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    public function ads_revenue($kurs,$tahun)
    {
    
        $sql="SELECT DATE_FORMAT(dataadd, '%b') bulan, 
                  SUM(case when website=1 then case when kurs='IDR' then laba else laba *(select kurs from kurs)end  else 0 end) as 'we', 
                 SUM(case when website=2 then case when kurs='IDR' then laba else laba *(select kurs from kurs)end  else 0 end) as  'hs', 
                SUM(case when website=3 then case when kurs='IDR' then laba else laba *(select kurs from kurs)end  else 0 end) as  'pp',
                 SUM(case when website=6 then case when kurs='IDR' then laba else laba *(select kurs from kurs)end  else 0 end) as  'nw',
                 SUM(case when website=4 then case when kurs='IDR' then laba else laba *(select kurs from kurs)end  else 0 end) as  'kj' ,
                 SUM(case when website=5 then case when kurs='IDR' then laba else laba *(select kurs from kurs)end  else 0 end) as  'wf'  ,kurs
               from programmatics a
               inner join master_partner b on a.partner_id=b.id
               where  year(dataadd)=$tahun  and (dataadd > '2022-07-01')
               group by 1 order by month(dataadd) ";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    public function monthly_revenue($bulan,$tahun)
    {
    
        $sql="SELECT DATE_FORMAT(dataadd, '%b') bulan, website_name,
            SUM(case when kurs='IDR' then laba else laba *(select kurs from kurs)end ) laba  
                from programmatics a
                inner join master_partner c on a.partner_id=c.id
               inner join master_website b on a.website=b.id
                where  month(dataadd)=$bulan and   year(dataadd)=$tahun 
                 group by 1,2 order by month(dataadd) ";
        $query=$this->db->query($sql);
        
        return $query->result_array();
    }
    function sum_laba($website)
    {
        $sql="SELECT sum(laba) as laba,website_name,kurs FROM programmatics a
                inner join master_website b on a.website= b.id
                inner join master_partner c on a.partner_id=c.id
                where month(dataadd)=month(CURRENT_DATE) and year(dataadd)= year(CURRENT_DATE)
                and website=$website 
                group by website,kurs";
        $query=$this->db->query($sql);
        return $query->result();
    }
    function sum_laba_all()
    {
        $sql="SELECT sum(laba) as laba,kurs FROM programmatics a
                inner join master_website b on a.website= b.id
                inner join master_partner c on a.partner_id=c.id
                where month(dataadd)=month(CURRENT_DATE) and year(dataadd)= year(CURRENT_DATE)
                
                group by kurs";
        $query=$this->db->query($sql);
        return $query->result();
    }
    function avail_slot()
    {
        $sql="SELECT website_name,c.name FROM `slot_ads` a 
        inner join master_website b on a.website_id=b.id 
        inner join master_slot c on a.slot_id=c.id where status=0;";

        $query=$this->db->query($sql);
        return $query->result();
    }
    function partner_list()
    {
        $sql="SELECT id,name from master_partner";

        $query=$this->db->query($sql);
        return $query->result();
    }
    function slot_partner_list()
    {
        $sql="SELECT website_name,c.name mob_top,d.name mob_in_article1,
                e.name mob_in_article2, f.name mob_in_article3,
                g.name mob_sticky_bottom,h.name mob_in_imagebanner, 
                i.name mob_nativead,j.name mob_video 
                from ads_slot_partner a 
                inner join master_website b on a.website_id=b.id 
                inner join master_partner c on a.mob_top=c.id 
                inner join master_partner d on a.mob_in_article1=d.id 
                inner join master_partner e on a.mob_in_article2=e.id 
                inner join master_partner f on a.mob_in_article3=f.id 
                inner join master_partner g on a.mob_sticky_bottom=g.id 
                inner join master_partner h on a.mob_in_imagebanner=h.id 
                inner join master_partner i on a.mob_nativead=i.id 
                inner join master_partner j on a.mob_video=j.id
                order by a.id";

        $query=$this->db->query($sql);
        return $query->result();
    }
    function partner_revenue($month,$year,$partner)
    {
        $sql="SELECT sum(case when kurs='IDR' then laba else laba *(select kurs from kurs)end)laba,b.website_name ,kurs
        from programmatics a 
        inner join master_website b on a.website=b.id 
        inner join master_partner c on a.partner_id=c.id
        where year(dataadd)=$year and month(dataadd)=$month and partner_id=$partner group by 2,3;";

        $query=$this->db->query($sql);
        return $query->result();
    }
    function partner_monthly($month,$year)
    {
        $sql="SELECT sum(laba)laba,b.name,b.kurs,case when b.kurs='USD' then sum(laba)*c.kurs else sum(laba) end as rupiah
        from programmatics a 
        inner join master_partner b on a.partner_id=b.id
        left join kurs c on b.kurs=c.curr
        where year(dataadd)=$year and month(dataadd)=$month  group by 2;";

        $query=$this->db->query($sql);
        return $query->result();
    }
    public function get_kurs(){
        $sql = "SELECT kurs FROM kurs where status=1 ";
        $query=$this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function total_rupiah($month,$year){
        $sql = "SELECT FORMAT(sum(rupiah), 0) total
                from (SELECT sum(laba)laba,b.name,b.kurs,case when b.kurs='USD' then sum(laba)*c.kurs else sum(laba) end as rupiah
                from programmatics a 
                inner join master_partner b on a.partner_id=b.id
                left join kurs c on b.kurs=c.curr
                where year(dataadd)=$year and month(dataadd)=$month  group by 2)a;";
        $query=$this->db->query($sql);
        $result = $query->row();
        $result= $result->total;
        return $result;
    }
   

}
?>