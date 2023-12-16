 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sosmed extends CI_Controller {

	    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('sosmed_model'); 
        $this->load->model('employee_model');
        $this->load->model('settings_model');    
        $this->load->model('notice_model');    
          
        $this->load->model('leave_model');    
    }
    
	public function index()
	{
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
            redirect('sosmed/Sosmed');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}
    function Sosmed(){
        if($this->session->userdata('user_login_access') != False) {
        $this->load->model('sosmed_model');
		
        $data['yt_we']=$this->sosmed_model->get_laba(11); 
        $data['tiktok_we']=$this->sosmed_model->get_laba(12); 
        $data['sosmed_all']=$this->sosmed_model->get_laba_all(1); 
        $data['avg_rev']=$this->sosmed_model->total_perbulan();
        $data['email']=$this->confirm_mail_send();
        $this->load->view('backend/sosmed',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }            
    }
 
   
    function total_perbulan()
    {
        
        $this->load->model('ads_model');
        $data= $this->sosmed_model->total_perbulan();
        echo json_encode($data);
    }
   
    function confirm_mail_send(){
		$config = Array( 
		'protocol' => 'smtp', 
		'smtp_host' => 'ssl://smtp.gmail.com', 
		'smtp_port' => 465, 
		'smtp_user' => 'ndensme@gmail.com', 
		'smtp_pass' => 'Mauliaihsan07',
        'smtp_crypto' => 'ssl'
		); 		  
         $from_email = "ndensme@gmail.com"; 
         $to_email = 'mikamuazzam@gmail.com'; 
   

        
         //Load email library 
         $this->load->library('email',$config); 
   
         $this->email->from($from_email, 'Dotdev'); 
         $this->email->to($to_email);
         $this->email->subject('Confirm Your Account'); 
		 $message	 =	"Confirm Your Account";
		 $message	.=	"Click Here : ".base_url()."Confirm_Account?C=dd" .'</br>'; 
         $this->email->message($message); 
   
         //Send mail 
         if($this->email->send()){ 
         	$this->session->set_flashdata('feedback','Kindly check your email To reset your password');
		 }
         else {
         $this->session->set_flashdata("feedback","Error in sending Email."); 
		 }			
	}
    
    
}