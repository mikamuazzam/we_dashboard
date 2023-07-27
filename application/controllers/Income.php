 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income extends CI_Controller {

	    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('event_model'); 
        $this->load->model('employee_model');
        $this->load->model('settings_model');    
        $this->load->model('notice_model');    
          
        $this->load->model('leave_model');    
    }
    
	public function index()
	{
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
            redirect('income/Income');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}
    function income(){
        if($this->session->userdata('user_login_access') != False) {
        $this->load->model('income_model');
        
        
        $this->load->view('backend/income');
        }
        else{
            redirect(base_url() , 'refresh');
        }            
    }
 
   
    function list_event()
    {
        $this->load->model('income_model');
        $data= $this->income_model->list_event();
        echo json_encode($data);
    } 
   
    
    
}