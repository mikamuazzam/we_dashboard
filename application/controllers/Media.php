 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

	    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('media_model'); 
        $this->load->model('employee_model');
        $this->load->model('settings_model');    
        $this->load->model('notice_model');    
          
        $this->load->model('leave_model');    
    }
    
	public function index()
	{
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
            redirect('media/Media');
            $data=array();
            #$data['settingsvalue'] = $this->media_model->GetSettingsValue();
			$this->load->view('login');
	}
    function Media(){
        if($this->session->userdata('user_login_access') != False) {
            $data['rank'] = $this->media_model->get_rank();
            $data['web_list'] = $this->media_model->chart_web();
            $data['rank_last'] = $this->media_model->chart_web_last();
        $this->load->view('backend/media',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }            
    }

   
    function chart_web()
    {
        $this->load->model('media_model');
        $data= $this->media_model->chart_list();
        echo json_encode($data);
    }
    function chart_web_we()
    {
        $this->load->model('media_model');
        $data= $this->media_model->chart_list_we();
        echo json_encode($data);
    }
    function chart_web_populis()
    {
        $this->load->model('media_model');
        $data= $this->media_model->chart_list_populis();
        echo json_encode($data);
    }
    function chart_web_hs()
    {
        $this->load->model('media_model');
        $data= $this->media_model->chart_list_hs();
        echo json_encode($data);
    }
    function chart_web_tv()
    {
        $this->load->model('media_model');
        $data= $this->media_model->chart_list_tv();
        echo json_encode($data);
    }


    
    
}