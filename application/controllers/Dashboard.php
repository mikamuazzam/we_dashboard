 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
            redirect('dashboard/Dashboard');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}
    function Dashboard(){
        if($this->session->userdata('user_login_access') != False) {
            $data['rank'] = $this->dashboard_model->get_rank();
            $data['web_list'] = $this->dashboard_model->chart_web();
            $data['rank_last'] = $this->dashboard_model->chart_web_last();
            
        $this->load->view('backend/dashboard',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    function chart_web()
    {
        $this->load->model('dashboard_model');
        $data= $this->dashboard_model->chart_list();
        echo json_encode($data);
    }

    
    
}