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
        
        $data['list_event1'] = $this->event_model->list_event2(1);
        $data['list_event2'] = $this->event_model->list_event2(2);
        $data['list_event3'] = $this->event_model->list_event2(3);
        $data['list_event4'] = $this->event_model->list_event2(4);
        $data['list_chat'] = $this->event_model->list_chat();
        $this->load->view('backend/event',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }            
    }
 
   
    function list_acara()
    {
        $bulan=$_REQUEST['bulan'];
        

        $this->load->model('event_model');
        $data= $this->event_model->list_acara($bulan);
        echo json_encode($data);
    } 
   
    function list_event()
    {
        //$bulan=$_REQUEST['bulan'];
        $this->load->model('event_model');
        $data= $this->event_model->list_event2(1);
        echo json_encode($data);
    } 

    function sum_event()
    {
        $bulan=$_REQUEST['bulan'];

        $this->load->model('event_model');
        $data= $this->event_model->sum_event($bulan);
        echo json_encode($data);
    } 

    function list_eventdet()
    {
        $event_id=$_REQUEST['event_id'];

        $this->load->model('event_model');
        $data= $this->event_model->list_event_det($event_id);
        echo json_encode($data);
    } 

    function list_task_det()
    {
        $event_id=$_REQUEST['event_id'];
        $workflowid=$_REQUEST['workflowid'];
        $this->load->model('event_model');
        $data= $this->event_model->list_task_det($event_id,$workflowid);
        echo json_encode($data);
    } 
   
    function det_sales()
    {
        $prod_id=$_REQUEST['prod_id'];

        $this->load->model('event_model');
        $data= $this->event_model->det_sales($prod_id);
        echo json_encode($data);
    } 

    function det_potensi()
    {
        $event_id=$_REQUEST['event_id'];

        $this->load->model('event_model');
        $data= $this->event_model->det_potensi($event_id);
        echo json_encode($data);
    } 

    function det_budget()
    {
        $event_id=$_REQUEST['event_id'];

        $this->load->model('event_model');
        $data= $this->event_model->det_budget($event_id);
        echo json_encode($data);
    } 

    function det_deal()
    {
        $prod_id=$_REQUEST['prod_id'];

        $this->load->model('event_model');
        $data= $this->event_model->det_deal($prod_id);
        echo json_encode($data);
    } 
    function det_eval()
    {
        $event_id=$_REQUEST['event_id'];

        $this->load->model('event_model');
        $data= $this->event_model->det_eval($event_id);
        echo json_encode($data);
    } 

    function send_chat ()
    {
        $user_id=$_REQUEST['user_id'];
        $pesan=$_REQUEST['msg'];

        $this->load->model('event_model');
        $data= $this->event_model->send_chat($user_id,$pesan);
        echo json_encode($data);
    }

    function list_chat ()
    {
       

        $this->load->model('event_model');
        $data= $this->event_model->list_chat();
        echo json_encode($data);
    }
    
}