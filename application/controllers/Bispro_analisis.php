<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bispro_analisis extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->database();
        
        $this->load->model('login_model');
        $this->load->model('bispro_analisis_model');
        $this->load->model('employee_model');
        $this->load->model('settings_model');
        $this->load->model('notice_model');

        $this->load->model('leave_model');
    }

    public function index()
    {
            #Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
        redirect('bispro_analisis/Bispro_analisis');

        

        $data=array();
        
        #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
                    $this->load->view('login');
    }
    function bispro_analisis(){
        
        if($this->session->userdata('user_login_access') != False) {

            $this->load->model('bispro_analisis_model');
            $data['web_name'] = $this->bispro_analisis_model->master_website();
            $data['expenses'] = $this->bispro_analisis_model->master_expanditure();
            $this->load->view('backend/bispro_analisis',$data);

            }
            else{
                redirect(base_url() , 'refresh');
            }
    }
    function chart_re()
    {
        
        $this->load->model('bispro_analisis_model');
        $cbid=$_REQUEST['cb_id'];
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
      
        if($cbid == 10 || $cbid==4 || $cbid==11 || $cbid==16 || $cbid==19|| $cbid==18)
        {
            if($cbid==4)$website=1;
            if($cbid==10)$website=2;
            if($cbid==11)$website=3;
            if($cbid==16)$website=4;
            if($cbid==19)$website=6;
            if($cbid==18)$website=11;
            $data= $this->bispro_analisis_model->chart_rechart_programmatics($cbid,$bulan,$tahun,$website);
        }
        else
        {
            $data= $this->bispro_analisis_model->chart_rechart_re($cbid,$bulan,$tahun);
        }
        
        echo json_encode($data);
    }
    function chart_re_v2()
    {
        
        $this->load->model('bispro_analisis_model');
        $cbid=$_REQUEST['cb_id'];
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        $lweb=$_REQUEST['list_web'];
        $lexp=$_REQUEST['list_exp'];
        if($cbid == 10 || $cbid==4 || $cbid==11 || $cbid==16 || $cbid==19|| $cbid==18)
        {
            if($cbid==4)$website=1;
            if($cbid==10)$website=2;
            if($cbid==11)$website=3;
            if($cbid==16)$website=4;
            if($cbid==19)$website=6;
            if($cbid==18)$website=11;
            $data= $this->bispro_analisis_model->chart_rechart_programmatics2($cbid,$bulan,$tahun,$website,$lweb,$lexp);
        }
        else
        {
            $data= $this->bispro_analisis_model->chart_rechart_re2($cbid,$bulan,$tahun,$lweb,$lexp);
        }
        
        echo json_encode($data);
    }
    
}