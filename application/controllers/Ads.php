 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends CI_Controller {

	    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('ads_model'); 
        $this->load->model('employee_model');
        $this->load->model('settings_model');    
        $this->load->model('notice_model');    
          
        $this->load->model('leave_model');    
    }
    
	public function index()
	{
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
            redirect('ads/Ads');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}
    function Ads(){
        if($this->session->userdata('user_login_access') != False) {
        $this->load->model('ads_model');
		
        $data['balance_list'] = $this->ads_model->get_balance();
        $data['laba_we']=$this->ads_model->get_sisa(1);
        $data['laba_hs']=$this->ads_model->get_sisa(2);
        $data['laba_pp']=$this->ads_model->get_sisa(3);
        $data['laba_kj']=$this->ads_model->get_sisa(4);
        $data['laba_nw']=$this->ads_model->get_sisa(6);
        $data['laba_wf']=$this->ads_model->get_sisa(5);

        $data['slaba_we']=$this->ads_model->sum_laba_rupiah(1);
        $data['slaba_hs']=$this->ads_model->sum_laba_rupiah(2);
        $data['slaba_pp']=$this->ads_model->sum_laba_rupiah(3);
        $data['slaba_kj']=$this->ads_model->sum_laba_rupiah(4);
        $data['slaba_nw']=$this->ads_model->sum_laba_rupiah(6);
        $data['slaba_wf']=$this->ads_model->sum_laba_rupiah(5);
        $data['slaba_trivia']=$this->ads_model->sum_laba_rupiah(11);
        $data['laba_all']=$this->ads_model->sum_laba_all();
        $data['avail_slot']=$this->ads_model->avail_slot();
        $data['partner_list']=$this->ads_model->partner_list();
        $data['slot_partner_list']=$this->ads_model->slot_partner_list();
        $data['nilai_kurs']=$this->ads_model->get_kurs();
        $data['avg_rev']=$this->ads_model->total_perbulan();
        $data['forecast']=$this->ads_model->total_forecast();

        $this->load->view('backend/ads',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }            
    }
 
   
   
    function ads_list()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        $partner=$_REQUEST['partner'];

        $this->load->model('ads_model');
        $data= $this->ads_model->ads_list($bulan,$tahun,$partner);
        echo json_encode($data);
    }

    function ads_balance()
    {
       
        $this->load->model('ads_model');
        $data= $this->ads_model->get_balance();
        echo json_encode($data);
    }

    function ads_view()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        $partner=$_REQUEST['partner'];
        $this->load->model('ads_model');
        $data= $this->ads_model->ads_view($bulan,$tahun,$partner);
        echo json_encode($data);
    }  
    function ads_revenue()
    {
        $kurs=$_REQUEST['kurs'];
        $tahun=$_REQUEST['tahun'];
        
        $this->load->model('ads_model');
        $data= $this->ads_model->ads_revenue($kurs,$tahun);
        echo json_encode($data);
    }  
    function partner_revenue()
    {
        $partner=$_REQUEST['partner'];
        $tahun=$_REQUEST['tahun'];
        $bulan=$_REQUEST['bulan'];
        $this->load->model('ads_model');
        $data= $this->ads_model->partner_revenue($bulan,$tahun,$partner);
        echo json_encode($data);
    }  
    function partner_monthly()
    {
        
        $tahun=$_REQUEST['tahun'];
        $bulan=$_REQUEST['bulan'];
        $this->load->model('ads_model');
        $data= $this->ads_model->partner_monthly($bulan,$tahun);
        echo json_encode($data);
    }  
    function monthly_revenue()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        
        $this->load->model('ads_model');
        $data= $this->ads_model->monthly_revenue($bulan,$tahun);
        echo json_encode($data);
    }  
    function get_kurs()
    {
       
        $this->load->model('ads_model');
        $data= $this->ads_model->get_kurs();
        echo json_encode($data);
    }  
    function total_rupiah()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        $this->load->model('ads_model');
        $data= $this->ads_model->total_rupiah($bulan,$tahun);
        echo json_encode($data);
    }

    function total_perbulan()
    {
        
        $this->load->model('ads_model');
        $data= $this->ads_model->total_perbulan();
        echo json_encode($data);
    }
    
    
}