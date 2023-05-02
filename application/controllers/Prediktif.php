 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prediktif extends CI_Controller {

	    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('prediktif_model'); 
        $this->load->model('employee_model');
        $this->load->model('settings_model');    
        $this->load->model('notice_model');    
          
        $this->load->model('leave_model');    
    }
    
	public function index()
	{
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
            redirect('prediktif/Prediktif');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}
    function Prediktif(){
        if($this->session->userdata('user_login_access') != False) {
        $this->load->model('prediktif_model');
		
        $data['yt_we']=$this->prediktif_model->get_laba(11); 
        $data['tiktok_we']=$this->prediktif_model->get_laba(12); 
        $data['sosmed_all']=$this->prediktif_model->get_laba_all(1); 
        #$data['avg_rev']=$this->prediktif_model->total_perbulan();
        $this->load->view('backend/prediktif',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }            
    }
 
   
    function prediktif_now()
    {
        
        $this->load->model('prediktif_model');
        $data= $this->prediktif_model->prediktif_now();
        echo json_encode($data);
    }
    function prediktif_cb()
    {
        $cbid=$_REQUEST['cb'];
        $this->load->model('prediktif_model');
        $data= $this->prediktif_model->prediktif_cb($cbid);
        echo json_encode($data);
    }
   
    
    
    
}