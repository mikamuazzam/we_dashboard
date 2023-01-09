<?php

	class Dashboard_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
   
    public function get_rank(){
        $sql = "SELECT * FROM web_rank  ORDER BY `tanggal` DESC LIMIT 1";
        $query=$this->db->query($sql);
        $result = $query->row();

        return $result;
    }

    public function chart_list_we(){
        $sql = "SELECT DATE_FORMAT(tanggal, '%M') tgl ,we,hs,populis,konten_jatim FROM web_rank  
        where tanggal >'2022-08-01'  order by tanggal    LIMIT 12";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function chart_list_medsos($website){
        $sql = " SELECT dataadd tgl, rank
                    FROM `ranks_ig` where website_id=$website and DATE_SUB(DATE(NOW()), INTERVAL 7 DAY);
        ";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
     
    public function chart_web(){
        $sql = "SELECT DATE_FORMAT(tanggal, '%M') tgl,we,hs,populis,konten_jatim,we_finance,news_worthy 
                FROM web_rank   where tanggal >'2022-05-01' ORDER BY `tanggal`   LIMIT 12";
        $query=$this->db->query($sql);
        
        return $query->result();

    }
    public function chart_web_last(){
        $sql = "SELECT DATE_FORMAT(tanggal,'%M') tgl,we,hs,populis,konten_jatim,we_finance,news_worthy FROM web_rank ORDER BY `tanggal`  desc LIMIT 1,1";
        $query=$this->db->query($sql);
        $result = $query->row();
        return $result;
    }
       
    }
?>