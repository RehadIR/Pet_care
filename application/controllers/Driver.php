<?php
class Driver extends CI_Controller 
{
	public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	
	//load database libray manually
	$this->load->database();
	//load Model
	$this->load->model('Driver_Model');
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
		$d_id = $this->session->userdata('d_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
		//load login user details
		$result['data']=$this->Driver_Model->viewdrecords($user);
		$this->load->view('Driver/dashboard',$result);
	}
	}

	function assigned()
	{
	
		$user = $this->session->userdata('user');
		$d_id = $this->session->userdata('d_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	
			$con = mysql_connect("localhost","root","") or die (mysql_error());
        	mysql_select_db("petcare", $con) or die (mysql_error());
			$qry1="select * from assign WHERE  d_id='$d_id'";
			$res1=mysql_query($qry1) or die(mysql_error());
			$rw1=mysql_fetch_array($res1);
			$loc=$rw1['location'];
			$req_id=$rw1['req_id'];
	
	
	$result['data']=$this->Driver_Model->viewassignrecords($d_id);
	
	$this->load->view('Driver/assgined',$result);
	}
	}
	
	public function unapprovereq()
	{
		$user = $this->session->userdata('user');
		$d_id = $this->session->userdata('d_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
		$ass_id=$this->input->get('ass_id');
		
		$this->Driver_Model->unapprovereq($ass_id);
		
		redirect("Driver/assigned");
		}
	}
	
	public function approvereq()
	{
		$user = $this->session->userdata('user');
		$d_id = $this->session->userdata('d_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
		$ass_id=$this->input->get('ass_id');
		$req_id=$this->input->get('req_id');
		//$this->Driver_Model->approvereq($ass_id);
		$this->Driver_Model->approvereq($ass_id,$req_id,$d_id);
		
		redirect("Driver/assigned");
		}
	}
	
	public function addlocation()
	{
    	$user = $this->session->userdata('user');
		$d_id = $this->session->userdata('d_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	
		$ass_id=$this->input->get('ass_id');
		$req_id=$this->input->get('req_id');
		
		$this->form_validation->set_rules('location','Location','required');
		
		if($this->form_validation->run() == FALSE)
		{

		echo $result['data']=$this->Driver_Model->viewassignrecordss($d_id,$req_id);
		
		$this->load->view('Driver/location',$result);

		}
		else
		{
			
			$locat=$this->input->post('location');
			$ass_id=$this->input->post('ass_id');
			$d_id=$this->input->post('d_id');
			$st=$this->input->post('status');
			$price=$this->input->post('price');
			$b_id=$this->input->post('b_id');
			
			$this->Driver_Model->viewloc($ass_id,$d_id);
			
			$con = mysql_connect("localhost","root","") or die (mysql_error());
        mysql_select_db("petcare", $con) or die (mysql_error());
			$qry1="select * from assign WHERE ass_id='".$ass_id."' and d_id='$d_id'";
			$res1=mysql_query($qry1) or die(mysql_error());
			$rw1=mysql_fetch_array($res1);
			$loc=$rw1['location'];
			$req_id=$rw1['req_id'];
			
			$location=$loc."<br>".$locat;
			$con = mysql_connect("localhost","root","") or die (mysql_error());
        mysql_select_db("petcare", $con) or die (mysql_error());
			$qry1="select * from breeder WHERE b_id='".$b_id."' ";
			$res1=mysql_query($qry1) or die(mysql_error());
			$rw1=mysql_fetch_array($res1);
			echo $amount=$rw1['account'];
			//$req_id=$rw1['req_id'];
			
			//$location=$loc."<br>".$locat;
			echo $st;
			$this->Driver_Model->updateloc($ass_id,$d_id,$location,$st,$price,$amount,$b_id,$req_id);
			
			redirect('Driver/assigned');
		}
		}
	}
	
	function message()
	{
		$user = $this->session->userdata('user');
		$d_id = $this->session->userdata('d_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	$bd_id = $this->session->userdata('bd_id');
	$result['data']=$this->Driver_Model->viewmsgrecords($bd_id);
	$this->load->view('Driver/message',$result);
	}
	}
	public function addreply()
	{
    	$user = $this->session->userdata('user');
		$d_id = $this->session->userdata('d_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
				$bd_id = $this->session->userdata('bd_id');
				
				$mes_id=$this->input->get('mes_id');
				
					$this->form_validation->set_rules('reply','Reply','required');
					
					if($this->form_validation->run() == FALSE)
					{
			
					$result['data']=$this->Driver_Model->viewmsgidrecords($mes_id);
					
					$this->load->view('Driver/replyadd',$result);
			
					}
					else
					{
						
						$reply=$this->input->post('reply');
						$mes_id=$this->input->post('mes_id');
						
						$this->Driver_Model->addreply($reply,$mes_id);
						
						redirect('Driver/message');
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