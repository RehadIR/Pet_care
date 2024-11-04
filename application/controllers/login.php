<?php
class Login extends CI_Controller 
{
	public function __construct()
	{
	//call CodeIgniter's default Constructor
        parent::__construct();
		$this->load->database();
		$this->load->model('Login_Model');
		$this->load->helper('url');
		$this->load->library('form_validation');
        $this->load->library('session');
		ob_start();
	}

	
	
	 public function index()
	 {
	    $this->form_validation->set_rules('role','User Role','required');
	 	$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','password','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
		}
		else
		{
		    $role = $this->input->post('role');
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$status=1;
			
			 if($role==6)
		     { 
			 $result['data']=$this->Login_Model->dcheck($status,$user,$pass);
			    if($result['data']==1)  
					{  
						//$this->session->set_userdata(array('user'=>$user));
						//adding data to session 
                        $this->session->set_userdata(array('user'=>$user));  
						redirect('Driver/index', $result); 
					}  
					else
					{  
						$data['error'] = 'Your Account is Invalid';  
						$this->load->view('login.php', $result);  
					} 
			 }
			 elseif($role==5)
		     { 
			 $result['data']=$this->Login_Model->check($status,$user,$pass);
			    if($result['data']==1)  
					{  
						$this->session->set_userdata(array('user'=>$user));  
						redirect('User/index', $result); 
					}  
					else
					{  
						$data['error'] = 'Your Account is Invalid';  
						$this->load->view('login.php', $data);  
					} 
			 }
			 elseif($role==4)
		     { 
			 $result['data']=$this->Login_Model->bdcheck($status,$user,$pass);
			    if($result['data']==1)  
					{  
						$this->session->set_userdata(array('user'=>$user));  
						redirect('Boarding/index', $result); 
					}  
					else
					{  
						$data['error'] = 'Your Account is Invalid';  
						$this->load->view('login.php', $data);  
					} 
			 }
			 elseif($role==3)
		     { 
			 $result['data']=$this->Login_Model->tcheck($status,$user,$pass);
			    if($result['data']==1)  
					{  
						$this->session->set_userdata(array('user'=>$user));  
						redirect('Trainer/index', $result); 
					}  
					else
					{  
						$data['error'] = 'Your Account is Invalid';  
						$this->load->view('login.php', $data);  
					} 
			 }
			  elseif($role==2)
		     { 
			 $result['data']=$this->Login_Model->vcheck($status,$user,$pass);
			    if($result['data']==1)  
					{  
						$this->session->set_userdata(array('user'=>$user));  
						redirect('Vet/index', $result); 
					}  
					else
					{  
						$data['error'] = 'Your Account is Invalid';  
						$this->load->view('login.php', $data);  
					} 
			 }
			 
			 else 
			 {
			 $result['data']=$this->Login_Model->bcheck($status,$user,$pass);
			 
			      if($result['data']==1)  
					{  
						  
						$this->session->set_userdata(array('user'=>$user));
						redirect('Breeder/index', $result); 
					}  
					else
					{  
						$data['error'] = 'Your Account is Invalid';  
						$this->load->view('login.php', $data);  
					} 
			 }
			
		}
	 }
	 
	public function reg()
	 {
	    $this->form_validation->set_rules('role','Role','required');
	 	$this->form_validation->set_rules('name','Full Name','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('mobile','Mobile','required|max_length[10]');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run() == FALSE)
		{
				$this->load->view('registration');
		}
		else
		{
		    $role=$this->input->post('role');
			$name=$this->input->post('name');
			$gender=$this->input->post('gender');
			$email=$this->input->post('email');
			$mobile=$this->input->post('mobile');
			$address=$this->input->post('address');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			
			/*$result['data']= $this->Login_Model->insert_details($role,$name,$gender,$email,$mobile,$address,$username,$password);
			if($result['data']==1)  
					{  
						
						redirect('User/index'); 
					}  
					else
					{  
						$data['success'] = 'Your Account Successfully Created';  
						$this->load->view('registration', $data);  
					}*/ 
		   if($role==5)
		     { 
			  $result['data']= $this->Login_Model->insert_details($name,$gender,$email,$mobile,$address,$username,$password);
			 }
		   elseif($role==4)
		     { 
			  $result['data']= $this->Login_Model->insert_bddetails($name,$gender,$email,$mobile,$address,$username,$password);
			 }
		   elseif($role==3)
		     { 
			  $result['data']= $this->Login_Model->insert_tdetails($name,$gender,$email,$mobile,$address,$username,$password);
			 }
		  elseif($role==2)
		     { 
			  $result['data']= $this->Login_Model->insert_vdetails($name,$gender,$email,$mobile,$address,$username,$password);
			 }
			else
			{
			 $result['data']= $this->Login_Model->insert_bdetails($name,$gender,$email,$mobile,$address,$username,$password);
			}
			
			if($result['data']==1)  
					{  
						//redirect them to the index page
                       $this->load->view('registration');
					}  
					else
					{  
						$data['success'] = 'Your Account Successfully Created, Please wait for Approval';  
						$this->load->view('registration', $data);  
					} 
		}
	 }

	 public function Logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
	         
	
}
?>