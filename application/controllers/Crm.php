<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crm extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->database();
        
        $this->load->model('login_model');
        $this->load->model('crm_model');
        $this->load->model('employee_model');
        $this->load->model('settings_model');
        $this->load->model('notice_model');

        $this->load->model('leave_model');
    }

    public function index()
    {
            #Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
        redirect('crm/Crm');
        $data=array();
        #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
                    $this->load->view('login');
    }
    function crm(){
        
        if($this->session->userdata('user_login_access') != False) {
            $data['comp'] = $this->crm_model->companies();
            $data['deals_all'] = $this->crm_model->deals(10);
            $data['deals_new'] = $this->crm_model->deals(1);
            $data['deals_won'] = $this->crm_model->deals(3);
            $data['deals_lost'] = $this->crm_model->deals(4);
            $data['deals_inv'] = $this->crm_model->deals(5);
            $data['venue_list'] = $this->crm_model->list_acara();
          

        $this->load->view('backend/crm',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }
    }
    
    function sum_pencapaian()
    {
        
        $tahun=$_REQUEST['tahun'];
        

        $this->load->model('crm_model');
        $data= $this->crm_model->sum_pencapaian($tahun);
        echo json_encode($data);
    } 
    function list_acara()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        

        $this->load->model('crm_model');
        $data= $this->crm_model->list_acara($bulan,$tahun);
        echo json_encode($data);
    } 
    function chart_month_q1_val()
    {
        $this->load->model('crm_model');
        $tahun=$_REQUEST['tahun'];
        $data= $this->crm_model->chart_month_val('Q1',$tahun);
        echo json_encode($data);
    } 
    function chart_month_pop_val()
    {
        $this->load->model('crm_model');
        $tahun=$_REQUEST['tahun'];
        $data= $this->crm_model->chart_month_val('3',$tahun);
        echo json_encode($data);
    } 
    
    
    function chart_month_hs_val()
    {
        $this->load->model('crm_model');
        $tahun=$_REQUEST['tahun'];
        $data= $this->crm_model->chart_month_val('2',$tahun);
        echo json_encode($data);
    }  
    function chart_web()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        $divisi=$_REQUEST['divisi'];

        $this->load->model('crm_model');
        $data= $this->crm_model->chart_list($divisi,$bulan,$tahun);
        echo json_encode($data);
    } 
    function chart_web_val()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        $divisi=$_REQUEST['divisi'];

        $this->load->model('crm_model');
        $data= $this->crm_model->chart_list_val($divisi,$bulan,$tahun);
        echo json_encode($data);
    }  
    function chart_month_we_val()
    {
        $this->load->model('crm_model');
        $tahun=$_REQUEST['tahun'];
        $data= $this->crm_model->chart_month_val('1',$tahun);
        echo json_encode($data);
    }  
    function comp_list()
    {
        $this->load->model('crm_model');
        $data= $this->crm_model->comp_list();
        echo json_encode($data);
    }
    function deal_list()
    {
        $this->load->model('crm_model');
        $data= $this->crm_model->deal_list();
        echo json_encode($data);
    }
    function get_div()
    {
        $this->load->model('crm_model');
        $tahun=$_REQUEST['tahun'];
        $data= $this->crm_model->divisi($tahun);
        echo json_encode($data);
    }
    function get_div_month()
    {
        $this->load->model('crm_model');
        $tahun=$_REQUEST['tahun'];
        $data= $this->crm_model->divisi_perbulan($tahun);
        echo json_encode($data);
    }

    function chart_we_ytd()
    {
        $this->load->model('crm_model');
        $divisi=$_REQUEST['divid'];
        $data= $this->crm_model->chart_we_ytd($divisi);
        echo json_encode($data);
    }

}