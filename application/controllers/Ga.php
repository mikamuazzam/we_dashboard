 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ga extends CI_Controller {

	    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model');
        $this->load->model('settings_model');    
        $this->load->model('notice_model');    
          
        $this->load->model('leave_model');    
    }
    
	public function index()
	{
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
            redirect('ga/Ga');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}
    function Ga(){
        if($this->session->userdata('user_login_access') != False) {
          
            $this->load->view('backend/ga');
        }
        else{
            redirect(base_url() , 'refresh');
        }            
    }

   
    
    
}