<?php
class Boarding extends CI_Controller 
{
	public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	
	//load database libray manually
	$this->load->database();
	//load Model
	$this->load->model('Boarding_Model');
	//load Helper
	$this->load->helper('url');
	//load validation
    $this->load->library('form_validation');
	// Load session library
    $this->load->library('session');
	}

	
	
	public function index()
	{
		$user = $this->session->userdata('user');
		//load login user details
		$result['data']=$this->Boarding_Model->viewbdrecords($user);
		$this->load->view('Boarding/dashboard',$result);
	}

	function message()
	{
	$bd_id = $this->session->userdata('bd_id');
	$result['data']=$this->Boarding_Model->viewmsgrecords($bd_id);
	$this->load->view('Boarding/message',$result);
	}
	
	public function addreply()
	{
    $user = $this->session->userdata('user');
	$bd_id = $this->session->userdata('bd_id');
	
	$mes_id=$this->input->get('mes_id');
	
		$this->form_validation->set_rules('reply','Reply','required');
		
		if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->Boarding_Model->viewmsgidrecords($mes_id);
		
		$this->load->view('Boarding/replyadd',$result);

		}
		else
		{
			
			$reply=$this->input->post('reply');
			$mes_id=$this->input->post('mes_id');
			
			$this->Boarding_Model->addreply($reply,$mes_id);
			
			redirect('Boarding/message');
		}
		
	}
	
	
	 public function Logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
	         
	
}
?>