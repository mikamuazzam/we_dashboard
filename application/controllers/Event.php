 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

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
            redirect('event/Event');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}
    function event(){
        if($this->session->userdata('user_login_access') != False) {
        $this->load->model('event_model');
        
        $data['list_event'] = $this->event_model->list_event2();
        $this->load->view('backend/event',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }            
    }
 
   
    function list_acara()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
        

        $this->load->model('event_model');
        $data= $this->event_model->list_acara($bulan,$tahun);
        echo json_encode($data);
    } 
   
    function list_event()
    {
      
        $this->load->model('event_model');
        $data= $this->event_model->list_event();
        echo json_encode($data);
    } 

    function list_eventdet()
    {
        $event_id=$_REQUEST['event_id'];

        $this->load->model('event_model');
        $data= $this->event_model->list_event_det($event_id);
        echo json_encode($data);
    } 
   
    
    
    
}