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
        $website=$_REQUEST['website'];

        $this->load->model('ads_model');
        $data= $this->ads_model->ads_list($bulan,$tahun,$website);
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
        $website=$_REQUEST['website'];
        $this->load->model('ads_model');
        $data= $this->ads_model->ads_view($bulan,$tahun,$website);
        echo json_encode($data);
    }  
    function ads_revenue()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        
        $this->load->model('ads_model');
        $data= $this->ads_model->ads_revenue($bulan,$tahun);
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
    
    
}