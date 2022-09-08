<?php

	class Jprof_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
   
   
    public function comp_list(){
        
        $sql = "SELECT instansi name,sum(pencapaian)/1000000 jumlah FROM `performance_jprof` 
                    group by instansi
                    order by sum(pencapaian) desc LIMIT 0,10;";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    public function comp_list_tabel(){
        
        $draw = (int) $this->input->post('draw');
		$limit = (int) $this->input->post('length');
		$offset = (int) $this->input->post('start');
		$search = '%'.$this->input->post('search[value]').'%';
        if(!empty($search)) $filter=" where  instansi like '%$search%'"; else $filter='';

        $sql = "SELECT  instansi as name ,FORMAT(sum(pencapaian),0) jumlah FROM performance_jprof
                 $filter  group by instansi order by sum(pencapaian) desc 
                LIMIT $limit OFFSET $offset ";
        $query=$this->db->query($sql);
        
        return $query->result_array();

    }
   
    public function companies(){
        $sql = "SELECT count(DISTINCT(`id_company`)) jum from deals";
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql);
        $result = $query->row();

        return $result;
    }
    
    public function sum_pencapaian(){
        
        $sql = "SELECT sum(pencapaian)/1000000 as jum FROM `performance`  where id_divisi != 5 ";
        $query=$this->db->query($sql);
        $result = $query->row();

        return $result;
    }
   
    
    public function chart_list_val($core,$bulan='',$tahun='')
    {    
        $sql = "SELECT sum(pencapaian)/1000000 jum,170000000/1000000 as target 
                    from performance_jprof where id_core_bisnis =$core and bulan='$bulan' and tahun='$tahun';";
                $query=$this->db->query($sql);
        
        return $query->result_array();

    }
    
}
?>
