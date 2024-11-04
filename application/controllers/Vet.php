<?php
class Vet extends CI_Controller 
{
	public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	
	//load database libray manually
	$this->load->database();
	//load Model
	$this->load->model('Vet_Model');
	//load Helper
	$this->load->helper('url');
	//load validation
    $this->load->library('form_validation');
	// Load session library
    $this->load->library('session');
	ob_start();
	}

	
	
	public function index()
	{
		$user = $this->session->userdata('user');
		$v_id = $this->session->userdata('v_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
		//load login user details
		$result['data']=$this->Vet_Model->viewvrecords($user);
		$this->load->view('Vet/dashboard',$result);
		}
	}
	function certificate()
	{
	$user = $this->session->userdata('user');
		$v_id = $this->session->userdata('v_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	$result['data']=$this->Vet_Model->viewcertreq($v_id);
	$this->load->view('Vet/certificate',$result);}
	}
	function addapprove()
	{
	
		$user = $this->session->userdata('user');
		$v_id = $this->session->userdata('v_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
		$this->form_validation->set_rules('date','date ','required');
			
		if($this->form_validation->run() == FALSE)
		{
	
		$result['data']=$this->Vet_Model->pet_Certdet($v_id);
		
		$this->load->view('Vet/add_certdet',$result);
	
		}
		else
		{
		$date=$this->input->post('date');
				$p_id=$this->input->post('p_id');		
		
		
		$con = mysql_connect("localhost","root","") or die (mysql_error());
			mysql_select_db("petcare", $con) or die (mysql_error());
				$qry1="select * from request where p_id='$p_id'  ";
				$res1=mysql_query($qry1) or die(mysql_error());
				$rw1=mysql_fetch_array($res1);
				echo $price=$rw1['price'];
				
		$con = mysql_connect("localhost","root","") or die (mysql_error());
			mysql_select_db("petcare", $con) or die (mysql_error());
				$qry2="select * from request where p_id='$p_id'  ";
				$res2=mysql_query($qry2) or die(mysql_error());
				$rw2=mysql_fetch_array($res2);
				echo $fees=$rw2['fees'];
		$result['data']=$this->Vet_Model->addcertapp($v_id,$date,$p_id,$price,$fees);
		//$this->Vet_Model->addcertapp($v_id,$date,$p_id)
		redirect('Vet/certificate',$result);
		}}
	}
	function message()
	{
		$user = $this->session->userdata('user');
		$v_id = $this->session->userdata('v_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	$result['data']=$this->Vet_Model->viewmsgrecords($v_id);
	$this->load->view('Vet/message',$result);
	}
	}
	
	function bmessage()
	{
		$user = $this->session->userdata('user');
		$v_id = $this->session->userdata('v_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	$result['data']=$this->Vet_Model->viewbmsgrecords($v_id);
	$this->load->view('Vet/bmessage',$result);
	}
	}
	
	public function addreply()
	{
	$user = $this->session->userdata('user');
		$v_id = $this->session->userdata('v_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
    $user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	
	$mes_id=$this->input->get('mes_id');
	
		$this->form_validation->set_rules('reply','Reply','required');
		
		if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->Vet_Model->viewmsgidrecords($mes_id);
		
		$this->load->view('Vet/replyadd',$result);

		}
		else
		{
			
			$reply=$this->input->post('reply');
			$mes_id=$this->input->post('mes_id');
			
			$this->Vet_Model->addreply($reply,$mes_id);
			
			redirect('Vet/message');
		}
		}
	}
	
	public function addbreply()
	{
	$user = $this->session->userdata('user');
		$v_id = $this->session->userdata('v_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
    $user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	
	$mes_id=$this->input->get('mes_id');
	
		$this->form_validation->set_rules('reply','Reply','required');
		
		if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->Vet_Model->viewmsgidrecords($mes_id);
		
		$this->load->view('Vet/replybadd',$result);

		}
		else
		{
			
			$reply=$this->input->post('reply');
			$mes_id=$this->input->post('mes_id');
			
			$this->Vet_Model->addreply($reply,$mes_id);
			
			redirect('Vet/bmessage');
		}
		}
	}
	
	 public function Logout()
    {
        $this->session->unset_userdata($user);
		$this->load->driver('cache');
        $this->session->sess_destroy();
        
		$this->cache->clean();ob_clean();
        redirect('login');
    }
	         
	
}
?>