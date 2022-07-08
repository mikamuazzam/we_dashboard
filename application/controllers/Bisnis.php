<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bisnis extends CI_Controller {

            function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('bisnis_model');
        $this->load->model('employee_model');
        $this->load->model('settings_model');
        $this->load->model('notice_model');

        $this->load->model('leave_model');
    }

    public function index()
    {
            #Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
        redirect('bisnis/Bisnis');
        $data=array();
        #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
                    $this->load->view('login');
    }
    function bisnis(){
        
        if($this->session->userdata('user_login_access') != False) {
           
            $data['venue_list'] = $this->bisnis_model->list_acara();
            $data['sum_pencapaian'] = $this->bisnis_model->sum_pencapaian();

        $this->load->view('backend/bisnis',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }
    }
    
    function list_acara()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        

        $this->load->model('bisnis_model');
        $data= $this->bisnis_model->list_acara($bulan,$tahun);
        echo json_encode($data);
    } 
    function ae_new_persen()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        

        $this->load->model('bisnis_model');
        $data= $this->bisnis_model->ae_new_persen($bulan,$tahun);
        echo json_encode($data);
    } 
    function ae_new_value()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        

        $this->load->model('bisnis_model');
        $data= $this->bisnis_model->ae_new_value($bulan,$tahun);
        echo json_encode($data);
    }
    function ae_persen()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        

        $this->load->model('bisnis_model');
        $data= $this->bisnis_model->ae_persen($bulan,$tahun);
        echo json_encode($data);
    } 
    function ae_value()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        

        $this->load->model('bisnis_model');
        $data= $this->bisnis_model->ae_value($bulan,$tahun);
        echo json_encode($data);
    }  

    
    function comp_list()
    {
        $this->load->model('bisnis_model');
        $data= $this->bisnis_model->comp_list();
        echo json_encode($data);
    }
    function deal_list()
    {
        $this->load->model('bisnis_model');
        $data= $this->bisnis_model->deal_list();
        echo json_encode($data);
    }
    function get_div()
    {
        $this->load->model('bisnis_model');
        $data= $this->bisnis_model->divisi();
        echo json_encode($data);
    }
    function get_div_month()
    {
        $this->load->model('bisnis_model');
        $data= $this->bisnis_model->divisi_perbulan();
        echo json_encode($data);
    }



}