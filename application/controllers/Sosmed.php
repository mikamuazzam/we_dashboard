 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sosmed extends CI_Controller {

	    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('sosmed_model'); 
        $this->load->model('employee_model');
        $this->load->model('settings_model');    
        $this->load->model('notice_model');    
          
        $this->load->model('leave_model');    
    }
    
	public function index()
	{
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
            redirect('sosmed/Sosmed');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}
    function Sosmed(){
        if($this->session->userdata('user_login_access') != False) {
        $this->load->model('sosmed_model');
		
        $data['yt_we']=$this->sosmed_model->get_laba(11); 
        $data['tiktok_we']=$this->sosmed_model->get_laba(12); 
        $data['sosmed_all']=$this->sosmed_model->get_laba_all(1); 
        $data['avg_rev']=$this->sosmed_model->total_perbulan();
        $this->load->view('backend/sosmed',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }            
    }
 
   
    function total_perbulan()
    {
        
        $this->load->model('ads_model');
        $data= $this->sosmed_model->total_perbulan();
        echo json_encode($data);
    }
   
    
    
    
}