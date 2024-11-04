<?php
class Trainer extends CI_Controller 
{
	public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	
	//load database libray manually
	$this->load->database();
	//load Model
	$this->load->model('Trainer_Model');
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
		$result['data']=$this->Trainer_Model->viewtrecords($user);
		$this->load->view('Trainer/dashboard',$result);
	}

	function message()
	{
	$t_id = $this->session->userdata('t_id');
	$result['data']=$this->Trainer_Model->viewmsgrecords($t_id);
	$this->load->view('Trainer/message',$result);
	}
	
	function bmessage()
	{
	$t_id = $this->session->userdata('t_id');
	$result['data']=$this->Trainer_Model->viewbmsgrecords($t_id);
	$this->load->view('Trainer/bmessage',$result);
	}
	
	public function addreply()
	{
    $user = $this->session->userdata('user');
	$t_id = $this->session->userdata('t_id');
	
	$mes_id=$this->input->get('mes_id');
	
		$this->form_validation->set_rules('reply','Reply','required');
		
		if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->Trainer_Model->viewmsgidrecords($mes_id);
		
		$this->load->view('Trainer/replyadd',$result);

		}
		else
		{
			
			$reply=$this->input->post('reply');
			$mes_id=$this->input->post('mes_id');
			
			$this->Trainer_Model->addreply($reply,$mes_id);
			
			redirect('Trainer/message');
		}
		
	}
	
	public function addbreply()
	{
    $user = $this->session->userdata('user');
	$t_id = $this->session->userdata('t_id');
	
	$mes_id=$this->input->get('mes_id');
	
		$this->form_validation->set_rules('reply','Reply','required');
		
		if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->Trainer_Model->viewmsgidrecords($mes_id);
		
		$this->load->view('Trainer/replybadd',$result);

		}
		else
		{
			
			$reply=$this->input->post('reply');
			$mes_id=$this->input->post('mes_id');
			
			$this->Trainer_Model->addreply($reply,$mes_id);
			
			redirect('Trainer/bmessage');
		}
		
	}
	
	function training()
	{
	$u_id = $this->session->userdata('u_id');
	$result['data']=$this->Trainer_Model->viewtrnrecords($u_id);
	$this->load->view('Trainer/training',$result);
	}
	
	
	 public function Logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
	         
	
}
?>