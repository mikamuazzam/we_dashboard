 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Psikotes extends CI_Controller {

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
            redirect('psikotes/Psikotes');
            $data=array();
           
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}
    function Psikotes(){
        if($this->session->userdata('user_login_access') != False) {
        $this->load->model('psikotes_model');
        $data=array();
        $data['detail_list']=$this->psikotes_model->detail_list();
        
        $this->load->view('backend/psikotes',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }            
    }
 
   
    function list_detailscore()
    {
        $aspek=$_REQUEST['aspek'];
        $this->load->model('psikotes_model');
        $data= $this->psikotes_model->list_detailscore($aspek);
        echo json_encode($data);
    } 
    function list_aspek()
    {
        $aspek=$_REQUEST['aspek'];
        $this->load->model('psikotes_model');
        $data= $this->psikotes_model->list_aspek($aspek);
        echo json_encode($data);
    } 
   
    
    
}