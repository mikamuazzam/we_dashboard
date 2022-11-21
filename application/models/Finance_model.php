<?php

	class Finance_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
    }
    
    
    function jum_inv($status)
    {
        
        if($status==1) $filter="and a.created_at >='2022-10-31'";
        else
         $filter="and a.inv_date >='2022-10-31'";

            $sql="SELECT count(*)as jum,sum(a.amount_po) as amount
                    from invoices a where status_data=1 
                    and inv_status_id=$status $filter group by inv_status_id";
        
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql);
        $result = $query->row();
        return $result;
    }
    public function inv_list(){
        
        $draw = (int) $this->input->post('draw');
		$limit = (int) $this->input->post('length');
		$offset = (int) $this->input->post('start');
		$search = '%'.$this->input->post('search[value]').'%';
        if(!empty($search)) $filter=" and (d.name like '%$search%' or e.company_name like '%$search%' or c.name like '%$search%')"; else $filter='';

        $sql = "SELECT e.company_name,d.name as productname, a.amount_po,a.inv_number,
                    a.created_at,a.inv_date ,c.name as status_inv, a.inv_desc remarks,exp_inv_date,a.inv_status_id  FROM `invoices` a 
                    inner join deals b on a.deals_id=b.id 
                    inner join inv_status c on c.id=a.inv_status_id 
                    inner join products d on d.id= a.product_id
                    inner join companies e on b.id_company = e. id
                    where status_data=1  $filter and  (inv_status_id = 1 and  a.created_at >='2022-10-31' ) or (inv_status_id > 1 and a.inv_date >='2022-10-31') 
                LIMIT $limit OFFSET $offset ";
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql);
      
        
        return $query->result_array();

    }
    public function inv_pie(){
        
        $sql = "SELECT count(*)as jum,sum(a.amount_po) as amount,b.name 
                from invoices a
                inner join inv_status b on a.inv_status_id=b.id where status_data=1 
                        and (inv_status_id=1 and a.created_at >='2022-10-31') or( a.inv_date >='2022-10-31') 
                        group by b.name;";
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql);
      
        
        return $query->result_array();

    }
    function cashout($month,$year)
    {
        
        $sql="SELECT FORMAT(sum(nominal), 0) jumlah from cash_outs where month(tanggal_transaksi)=$month 
                and year(tanggal_transaksi)=$year";
        
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql);
        $result = $query->row();
        $result= $result->jumlah;
        return $result;
    }

    function total_po()
    {
        
        $sql="SELECT count(*)as jumlah FROM deals where id_stage in(3,5,6,7) and created_at >'2022-09-30';";
        
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql);
        $result = $query->row();
        $result= $result->jumlah;
        return $result;
    }

    function cashin($month,$year)
    {
        
        $sql="SELECT FORMAT(sum(nominal_cash_in), 0) jumlah from cash_in where month(cash_in_date)=$month 
                and year(cash_in_date)=$year";
        
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql);
        $result = $query->row();
        $result= $result->jumlah;
        if(empty($result))$result=0;
        return $result;
    }
    function status_list()
    {
        
        $sql="SELECT id,name from inv_status";
        
        $db2 = $this->load->database('db2', TRUE);
        $query=$db2->query($sql);
      
        
        return $query->result();
    }
}
?>