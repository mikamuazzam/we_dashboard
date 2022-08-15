<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jprof extends CI_Controller {

            function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('jprof_model');
        $this->load->model('employee_model');
        $this->load->model('settings_model');
        $this->load->model('notice_model');

        $this->load->model('leave_model');
    }

    public function index()
    {
            #Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
        redirect('jprof/Jprof');
        $data=array();
        #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
                    $this->load->view('login');
    }
    
    
    function chart_web_val()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        $divisi=$_REQUEST['divisi'];

        $this->load->model('jprof_model');
        $data= $this->jprof_model->chart_list_val($divisi,$bulan,$tahun);
        echo json_encode($data);
    }  
    function jprof(){
        
        if($this->session->userdata('user_login_access') != False) {
            $data['sum_pencapaian'] = $this->jprof_model->sum_pencapaian();

        $this->load->view('backend/jprof',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }
    }
    
   
   
    
    function comp_list()
    {
       
        $this->load->model('jprof_model');
        $data= $this->jprof_model->comp_list();
        echo json_encode($data);
    }
    function comp_list_tabel()
    {
       
        $this->load->model('jprof_model');
        $data= $this->jprof_model->comp_list_tabel();
        echo json_encode($data);
    }
   


}