<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bispro extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->database();
        
        $this->load->model('login_model');
        $this->load->model('bispro_model');
        $this->load->model('employee_model');
        $this->load->model('settings_model');
        $this->load->model('notice_model');

        $this->load->model('leave_model');
    }

    public function index()
    {
            #Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
        redirect('bispro/Bispro');
        $data=array();
        #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
                    $this->load->view('login');
    }
    function bispro(){
        
        if($this->session->userdata('user_login_access') != False) {
           
            $this->load->view('backend/bispro');
            }
            else{
                redirect(base_url() , 'refresh');
            }
    }
    function chart_re()
    {
        $this->load->model('bispro_model');
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
            $data= $this->bispro_model->chart_rechart_programmatics($cbid,$bulan,$tahun,$website);
        }
        else
        {
            $data= $this->bispro_model->chart_rechart_re($cbid,$bulan,$tahun);
        }
        
        echo json_encode($data);
    }
    function chart_re_programmatics()
    {
        $this->load->model('bispro_model');
        $cbid=$_REQUEST['cb_id'];
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        $data= $this->bispro_model->chart_rechart_programmatics($cbid,$bulan,$tahun);
        echo json_encode($data);
    }
    function chart_we_ytd()
    {
        $this->load->model('bispro_model');
        $divisi=$_REQUEST['divid'];
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        $data= $this->bispro_model->chart_we_ytd($divisi,$bulan,$tahun);
        echo json_encode($data);
    }

    function chart_we_mtd()
    {
        $this->load->model('bispro_model');
        $divisi=$_REQUEST['divid'];
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        $data= $this->bispro_model->chart_we_mtd($divisi,$bulan,$tahun);
        echo json_encode($data);
    }
   
    function chart_ae_ytd()
    {
        $this->load->model('bispro_model');
       
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        $data= $this->bispro_model->chart_ae_ytd($bulan,$tahun);
        echo json_encode($data);
    }

    function chart_ae_mtd()
    {
        $this->load->model('bispro_model');
       
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        $data= $this->bispro_model->chart_ae_mtd($bulan,$tahun);
        echo json_encode($data);
    }

    function chart_award_ytd()
    {
        $this->load->model('bispro_model');
        $corebisnis=$_REQUEST['corebisnis'];
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        $data= $this->bispro_model->chart_award_ytd($corebisnis,$bulan,$tahun);
        echo json_encode($data);
    }
    function chart_award_mtd()
    {
        $this->load->model('bispro_model');
        $corebisnis=$_REQUEST['corebisnis'];
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        $data= $this->bispro_model->chart_award_mtd($corebisnis,$bulan,$tahun);
        echo json_encode($data);
    }

}