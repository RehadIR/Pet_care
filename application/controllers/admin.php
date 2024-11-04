<?php
class Admin extends CI_Controller 
{
	public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	
	//load database libray manually
	$this->load->database();
	
	
	//load Model
	$this->load->model('Admin_Model');
	//load Helper
	$this->load->helper('url');
	//load validation
    $this->load->library('form_validation');
	$this->load->library('session');
	ob_start();

	}

	
	public function index()
	{
		
		if($this->input->post('login'))
		{
			$user=$this->input->post('username');
			$p=$this->input->post('password');
			
			$result['data']=$this->Admin_Model->check($user,$p);
	
			/*$que=$this->db->query("select * from admin where username='".$user."' and password='$p'");
			$row = $que->num_rows();*/
			if($result['data']==1)
			{
				$user = array(
                        'user'  => $user,
                        'logged_in' => TRUE
                    );
                    
                    $this->session->set_userdata($user);

					if($data==true)
					{
						$this->session->set_flashdata('error', "Sorry,  Failed to Login.");
                    }	
					else
					{
						$this->session->set_flashdata('success', "Logined Succesfully");
					
					}
			redirect('admin/dashboard');
			}
			else
			{
		$data['error']="<h3 style='color:red'>Invalid Login Details</h3>";
			}	
		}
		$this->load->view('admin/login',@$data);		
	}
	
	function dashboard()
	{
		$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$this->load->view('admin/dashboard');
	}
	}
	
/* User Management */	
	
	function breeder()
	{
	//$id=1;
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$result['data']=$this->Admin_Model->viewbrecords();
	$this->load->view('admin/breeder',$result);}
	}
	
	public function unapprovebdata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$b_id=$this->input->get('b_id');
		
		$this->Admin_Model->unapprovebrecords($b_id);
		
		redirect("admin/breeder");}
	}
	
	public function approvebdata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$b_id=$this->input->get('b_id');
		
		$this->Admin_Model->approvebrecords($b_id);
		
		redirect("admin/breeder");
	}
	}
    function vet()
	{
	//$id=2;
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$result['data']=$this->Admin_Model->viewvrecords();
	$this->load->view('admin/vet',$result);
	}}
	public function editevet()
	{		
		$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$v_id=$this->input->get('v_id');
		$result['data']=$this->Admin_Model->viewevet($v_id);
		$this->load->view('admin/vetedit',$result);}
	}
	public function editvet()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
			$v_id=$this->input->post('v_id');
			$name=$this->input->post('name');
			$gender=$this->input->post('gender');
			$email=$this->input->post('email');
			$contactno=$this->input->post('contactno');
			$address=$this->input->post('address');
			//$place=$this->input->post('place');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$result['data1']=$this->Admin_Model->update_vet($v_id,$name,$gender,$email,$contactno,$address,$username,$password);
			if($result['data1']==true)
			{
			echo '<script Type="javascript">alert("updated successfully")</script>';
			}
			else
			{
			echo '<script>alert("ERROR")</script>';
			}
			
			
			$result['data']=$this->Admin_Model->viewddrecords();
	
			redirect('admin/vet',$result);
	}	
	}
	public function deletevet()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$v_id=$this->input->get('v_id');
		
		$this->Admin_Model->deletevet($v_id);
		
		redirect("admin/vet");
	}
	
	}
	
	public function unapprovevdata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$v_id=$this->input->get('v_id');
		
		$this->Admin_Model->unapprovevrecords($v_id);
		
		redirect("admin/vet");
	}
	}
	public function approvevdata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$v_id=$this->input->get('v_id');
		
		$this->Admin_Model->approvevrecords($v_id);
		
		redirect("admin/vet");
	}}
	
	function trainer()
	{
	//$id=3;
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$result['data']=$this->Admin_Model->viewtrecords();
	$this->load->view('admin/trainer',$result);
	}}
	
	public function unapprovetdata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$t_id=$this->input->get('t_id');
		
		$this->Admin_Model->unapprovetrecords($t_id);
		
		redirect("admin/trainer");}
	}
	
	public function approvetdata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$t_id=$this->input->get('t_id');
		
		$this->Admin_Model->approvetrecords($t_id);
		
		redirect("admin/trainer");
	}}
	
	function user()
	{
	//$id=5;
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$result['data']=$this->Admin_Model->viewurecords();
	$this->load->view('admin/users',$result);}
	}
	
	public function unapprovedata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$u_id=$this->input->get('u_id');
		
		$this->Admin_Model->unapproverecords($u_id);
		
		redirect("admin/user");}
	}
	
	public function approvedata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$u_id=$this->input->get('u_id');
		
		$this->Admin_Model->approverecords($u_id);
		
		redirect("admin/user");}
	}
	function boarding()
	{
	//$id=4;
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$result['data']=$this->Admin_Model->viewbdrecords();
	$this->load->view('admin/boarding',$result);
	}}
	
	public function unapprovebddata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$bd_id=$this->input->get('bd_id');
		
		$this->Admin_Model->unapprovebdrecords($bd_id);
		
		redirect("admin/boarding");}
	}
	
	public function approvebddata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$bd_id=$this->input->get('bd_id');
		
		$this->Admin_Model->approvebdrecords($bd_id);
		
		redirect("admin/boarding");}
	}
	
	
	function driver()
	{
	//$id=6;
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$result['data']=$this->Admin_Model->viewdrecords();
	$this->load->view('admin/driver',$result);}
	}
	
	public function adddriver()
	{
$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('contactno','Contact No','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run() == FALSE)
		{

       // $b_id = $this->session->userdata('b_id');
		$result['data']=$this->Admin_Model->viewddrecords();
		$this->load->view('Admin/add_driver',$result);

		}
		else
		{
            //$b_id = $this->session->userdata('b_id');
			$name=$this->input->post('name');
			$gender=$this->input->post('gender');
			$email=$this->input->post('email');
			$contactno=$this->input->post('contactno');
			$address=$this->input->post('address');
			$place=$this->input->post('place');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			
			$this->Admin_Model->add_driver($name,$gender,$email,$contactno,$address,$place,$username,$password);
			$result['data']=$this->Admin_Model->viewdrecords();
	
			redirect('admin/driver',$result);
		}
		
	}}
	
	public function edrdata()
	{		
		$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$d_id=$this->input->get('d_id');
		$result['data']=$this->Admin_Model->viewedrecords($d_id);
		$this->load->view('admin/driveredit',$result);}
	}
	public function editdriver()
	{
		$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {	$d_id=$this->input->post('d_id');
			$name=$this->input->post('name');
			$gender=$this->input->post('gender');
			$email=$this->input->post('email');
			$contactno=$this->input->post('contactno');
			$address=$this->input->post('address');
			$place=$this->input->post('place');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$result['data1']=$this->Admin_Model->update_driver($d_id,$name,$gender,$email,$contactno,$address,$place,$username,$password);
			if($result['data1']==true)
			{
			echo '<script Type="javascript">alert("updated successfully")</script>';
			}
			else
			{
			echo '<script>alert("ERROR")</script>';
			}
			
			
			$result['data']=$this->Admin_Model->viewddrecords();
	
			redirect('admin/driver',$result);
		
	}}
	public function deletedrdata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {	$d_id=$this->input->get('d_id');
		
		$this->Admin_Model->deletedrdata($d_id);
		
		redirect("admin/driver");}
	}
	
	
	
	public function unapprovedrdata()
	{
		$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$d_id=$this->input->get('d_id');
		
		$this->Admin_Model->unapprovedrrecords($d_id);
		
		redirect("admin/driver");}
	}
	
	public function approvedrdata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$d_id=$this->input->get('d_id');
		
		$this->Admin_Model->approvedrrecords($d_id);
		
		redirect("admin/driver");}
	}
	
	
	/* Product Category Management */
	
	function category()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$result['data']=$this->Admin_Model->viewcatrecords();
	$this->load->view('admin/category',$result);
	}
	}
	public function addcategory()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {

		$this->form_validation->set_rules('cat_name','Category Name','required');
		
		if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->Admin_Model->viewcatrecords();
		$this->load->view('admin/catadd',$result);

		}
		else
		{

			$cat_name=$this->input->post('cat_name');
			
			$this->Admin_Model->addcat($cat_name);
			
			redirect('admin/category');
		}
		
	}}
	
	public function unapprove()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$cat_id=$this->input->get('cat_id');
		
		$this->Admin_Model->unapprove($cat_id);
		
		redirect("admin/category");}
	}
	
	public function approve()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$cat_id=$this->input->get('cat_id');
		
		$this->Admin_Model->approve($cat_id);
		
		redirect("admin/category");}
	}
	
	public function editdata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$cat_id=$this->input->get('cat_id');
		
		$result['data']=$this->Admin_Model->displayrecordsById($cat_id);
		
		$this->load->view('admin/catedit',$result);	
	
			if($this->input->post('update'))
			{
			
			$cat_name=$this->input->post('cat_name');
			
			$cat_id=$this->input->post('cat_id');
			
			$this->Admin_Model->updaterecords($cat_name,$cat_id);
			
			redirect("admin/category");
			
			}}
	}
	
	public function deletedata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$cat_id=$this->input->get('cat_id');
		
		$this->Admin_Model->deleterecords($cat_id);
		
		redirect("admin/category");
	}}
	
	/* Pets Category Management */
	
	function pcategory()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$result['data']=$this->Admin_Model->viewpcatrecords();
	$this->load->view('admin/pcategory',$result);
	}}
	
	public function addpcategory()
	{
$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$this->form_validation->set_rules('cat_name','Category Name','required');
		
		if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->Admin_Model->viewpcatrecords();
		$this->load->view('admin/pcatadd',$result);

		}
		else
		{

			$cat_name=$this->input->post('cat_name');
			
			$this->Admin_Model->addpcat($cat_name);
			
			redirect('admin/pcategory');
		}
		}
	}
	
	public function unapprovepcat()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$pcat_id=$this->input->get('pcat_id');
		
		$this->Admin_Model->unapprovepcat($pcat_id);
		
		redirect("admin/pcategory");}
	}
	
	public function approvepcat()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$pcat_id=$this->input->get('pcat_id');
		
		$this->Admin_Model->approvepcat($pcat_id);
		
		redirect("admin/pcategory");}
	}
	
	public function peditdata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$pcat_id=$this->input->get('pcat_id');
		
		$result['data']=$this->Admin_Model->displayrecordspById($pcat_id);
		
		$this->load->view('admin/pcatedit',$result);	
	
			if($this->input->post('update'))
			{
			
			$pcat_name=$this->input->post('pcat_name');
			
			$pcat_id=$this->input->post('pcat_id');
			
			$this->Admin_Model->updateprecords($pcat_name,$pcat_id);
			
			redirect("admin/pcategory");
			
			}
	}}
	
	public function pdeletedata()
	{
		$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$pcat_id=$this->input->get('pcat_id');
		
		$this->Admin_Model->deleteprecords($pcat_id);
		
		redirect("admin/pcategory");
	}
	}
	/* Pet Management */
     
	 function pet()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$result['data']=$this->Admin_Model->viewpetrecords();
	$this->load->view('admin/pet',$result);
	}}

   public function unapprovepet()
	{
		$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$p_id=$this->input->get('p_id');
		
		$this->Admin_Model->unapprovepet($p_id);
		
		redirect("admin/pet");}
	}
	
	public function approvepet()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$p_id=$this->input->get('p_id');
		
		$this->Admin_Model->approvepet($p_id);
		
		redirect("admin/pet");}
	}
	
	/* Product Management */
     
	 function product()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$result['data']=$this->Admin_Model->viewproductrecords();
	$this->load->view('admin/product',$result);
	}
	}
	public function addproduct()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {

		$this->form_validation->set_rules('cat_id','Category Name','required');
		$this->form_validation->set_rules('p_name','Product Name','required');
		$this->form_validation->set_rules('price','Product Price','required');
		$this->form_validation->set_rules('quantity','Product Quantity','required');
		$this->form_validation->set_rules('descp','Product Description','required');
		//$this->form_validation->set_rules('p_img','Product Image','required');
		
		if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->Admin_Model->viewproductrecords();
		
		 //load product category records details
		$result['data1']=$this->Admin_Model->viewpcattrecords();
		
		$this->load->view('admin/productadd',$result,$result['data1']);

		}
		else
		{

            $config['allowed_types']='jpg|png';
			$config['upload_path']='./assets_admin/images';
			$this->load->library('upload',$config);
			if($this->upload->do_upload('p_img'))
			{
				print_r($this->upload->data());
			}
			else
			{
				print_r($this->upload->display_errors());
			}
			
			$cat_id=$this->input->post('cat_id');
			$p_name=$this->input->post('p_name');
			$price=$this->input->post('price');
			$quantity=$this->input->post('quantity');
			$descp=$this->input->post('descp');
			$pic=$this->upload->data('client_name');
			
			$this->Admin_Model->addproduct($cat_id,$p_name,$price,$quantity,$descp,$pic);
			
			redirect('admin/product');
		}
		}
	}
	
	 public function unapprovepdct()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$pdct_id=$this->input->get('pdct_id');
		
		$this->Admin_Model->unapprovepdct($pdct_id);
		
		redirect("admin/product");
	}
	}
	public function approvepdct()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$pdct_id=$this->input->get('pdct_id');
		
		$this->Admin_Model->approvepdct($pdct_id);
		
		redirect("admin/product");
	}
	}
	public function pdcteditdata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$pdct_id=$this->input->get('pdct_id');
		
		$result['data']=$this->Admin_Model->displayrecordspdctById($pdct_id);		 
		
		//load product category records details
		$result['data1']=$this->Admin_Model->viewpcattrecords();
		
		$this->load->view('admin/pdctedit',$result,$result['data1']);	
	
			if($this->input->post('update'))
			{
			
			$cat_id=$this->input->post('cat_id');
			$p_name=$this->input->post('p_name');
			$price=$this->input->post('price');
			$quantity=$this->input->post('quantity');
			$descp=$this->input->post('descp');
			
			$pdct_id=$this->input->post('pdct_id');
			
			$this->Admin_Model->updatepdctrecords($cat_id,$p_name,$price,$quantity,$descp,$pdct_id);
			
			redirect("admin/product");
			
			}
	}
	}
	public function pdctdeletedata()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$pdct_id=$this->input->get('pdct_id');
		
		$this->Admin_Model->deletepdctrecords($pdct_id);
		
		redirect("admin/product");}
	}
	
	
	/*  */
	function notify()
	{
	//$id=2;
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$result['data']=$this->Admin_Model->viewnotify();
	$this->load->view('admin/notify',$result);
	}}
	
	function report()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	//$id=2;
	$result['data']=$this->Admin_Model->viewreport();
	$this->load->view('admin/report',$result);
	}}
	
	function complaint()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	//$id=3;
	$result['data']=$this->Admin_Model->viewcomplaint();
	$this->load->view('admin/complaint',$result);
	}}
	
	
	function addreply()
	{
		$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		$comp_id=$this->input->get('comp_id');
		
		$result['data']=$this->Admin_Model->displayrecordsById($comp_id);
		$this->load->view('admin/complaint_reply',$result);	
	
		if($this->input->post('update'))
		{

		$reply=$this->input->post('reply');
		$this->Admin_Model->updaterecords($reply,$comp_id);
		
		redirect("admin/complaint");
		}
	}}
	
	function agency()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$result['data']=$this->Admin_Model->viewagrecords();
	$this->load->view('admin/agency',$result);
	}}
	
	function message()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$result['data']=$this->Admin_Model->viewmessage();
	$this->load->view('admin/message',$result);
	}}
	function pets_cert()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$result['data']=$this->Admin_Model->viewcert();
	$this->load->view('admin/pet_cert',$result);
	}
	}
	public function viewcert()
	{
		$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
		
		$p_id=$this->input->get('p_id');
		$result['data']=$this->Admin_Model->view_cert($p_id);
		$this->load->view('Admin/view_cert',$result);
		}
	}
	function view_feedbacks()
	{
	$user = $this->session->userdata('user');
        if($user != TRUE || empty($user))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('admin'); # Login view
        }
        else
        {
	$result['data']=$this->Admin_Model->view_feedbacks();
	$this->load->view('admin/view_feedback',$result);}
	}
	
	
	
	
	 public function Logout()
    {
        $this->session->unset_userdata($user);
	$this->load->driver('cache');
        $this->session->sess_destroy();
        
		$this->cache->clean();ob_clean();
        redirect('admin');
    }
	
}
?>