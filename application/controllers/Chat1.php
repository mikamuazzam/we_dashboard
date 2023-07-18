 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

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
            redirect('chat/Chat');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}
    function chat(){
        if($this->session->userdata('user_login_access') != False) {
        $this->load->model('event_model');
        
        
        $data['list_chat'] = $this->event_model->list_chat();
        $this->load->view('backend/chat',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }            
    }
 
   
   
    
}