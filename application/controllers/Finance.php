 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller {

	    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('finance_model'); 
        $this->load->model('employee_model');
        $this->load->model('settings_model');    
        $this->load->model('notice_model');    
          
        $this->load->model('leave_model');    
    }
    
	public function index()
	{
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
            redirect('finance/Finance');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}
    function Finance(){
        if($this->session->userdata('user_login_access') != False) {
        $this->load->model('finance_model');
		
       
        $data['jum_new']=$this->finance_model->jum_inv(1);
        $data['jum_sent']=$this->finance_model->jum_inv(2);
        $data['jum_aging']=$this->finance_model->jum_inv(3);
        $data['jum_cash']=$this->finance_model->jum_inv(4);
        $data['total_po']=$this->finance_model->total_po();
        $data['status_list']=$this->finance_model->status_list();
        $this->load->view('backend/finance',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }            
    }
 
   
   
    function inv_list()
    {
        
        
        $this->load->model('finance_model');
        $data= $this->finance_model->inv_list();
        echo json_encode($data);
    }
    function tot_cashout()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
       

        $this->load->model('finance_model');
        $data= $this->finance_model->cashout($bulan,$tahun);
        echo json_encode($data);
    }
    function tot_cashin()
    {
        $bulan=$_REQUEST['bulan'];
        $tahun=$_REQUEST['tahun'];
       

        $this->load->model('finance_model');
        $data= $this->finance_model->cashin($bulan,$tahun);
        echo json_encode($data);
    }

    function inv_pie()
    {

        $this->load->model('finance_model');
        $data= $this->finance_model->inv_pie();
        echo json_encode($data);
    }
    
}