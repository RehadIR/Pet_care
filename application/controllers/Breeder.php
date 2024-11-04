<?php
class Breeder extends CI_Controller 
{
	public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	
	//load database libray manually
	$this->load->database();
	//load Model
	$this->load->model('Breeder_Model');
	//load Helper
	//$this->load->helper('url');
	$this->load->helper(array('form', 'url', 'html'));
	//load validation
    $this->load->library('form_validation');
	// Load session library
    $this->load->library('session');
	$this->load->helper('security');
	//$this->load->library('session');
	ob_start();

	}

	
	
	public function index()
	{
		$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
		//load login user details
		$result['data']=$this->Breeder_Model->viewbrecords($user);
		$this->load->view('Breeder/dashboard',$result);}
	}
/*********************************************************************************/	 
	 function pet()
	{
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	
	$result['data']=$this->Breeder_Model->viewpetrecords($b_id);
	$this->load->view('Breeder/pet',$result);}
	}
	
	function videoadd()
	{
	
	  $user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			#user not logged in
			$this->session->set_flashdata('error', 'Session has Expired');
			redirect('login'); # Login view
		}
		else
		{
		
		$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		
		$p_id=$this->input->get('p_id');
		
	    $result['data']=$this->Breeder_Model->viewpetdrecords($p_id);
		
		$this->load->view('Breeder/addvideo',$result);
		//redirect("EI/student?id=".$inst_cid);
	
	    }}
		
		
		/* Add Video Management */
public function videoadded()
	{
        
		$this->form_validation->set_rules('petvideo','Pet Video','required');
		
		if($this->form_validation->run() == FALSE)
		{
		
				$p_id=$this->input->get('p_id');
		
	$result['data']=$this->Breeder_Model->viewpetdrecords($p_id);
		
		$this->load->view('Breeder/addvideo',$result);
		}
		else
		{
		
		    $config['allowed_types']='wmv|mp4|avi|mov';
			$config['max_size']             = 10000;
			$config['upload_path']='./assets_admin/petuploads';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			//$pic="";
			echo $i=$this->upload->do_upload('petvideo');
			if($this->upload->do_upload('petvideo'))
			{
				echo $pic=$this->upload->data('client_name');
			}
			else
			{
				print_r($this->upload->display_errors());
			}
	
			$b_id=$this->input->post('b_id');
			$p_id=$this->input->post('p_id');
	
			
			$this->Breeder_Model->addvideoo($b_id,$p_id,$pic);

		    redirect("Breeder/pet");

		
		}
	}
	
		/*$this->form_validation->set_rules('petvideo','Pet Video','required');
		
		if($this->form_validation->run() == FALSE)
		{

		$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		
		$p_id=$this->input->get('p_id');
		
	    $result['data']=$this->Breeder_Model->viewpetdrecords($p_id);
		
		$this->load->view('Breeder/addvideo',$result);

		}
		else
		{

			$config['upload_path']='./assets_admin/uploads';
			$config['allowed_types']='wmv|mp4|avi|mov';
			$config['max_size']             = 102400;
			
			$this->load->library('upload', $config);
			//$this->upload->initialize($config);
			$pic="";
			$i=$this->upload->do_upload('petvideo');
			if($this->upload->do_upload('petvideo'))
			{
				echo $pic=$this->upload->data('client_name');
			}
			else
			{
				print_r($this->upload->display_errors());
			}
			
			$b_id=$this->input->post('b_id');
			$p_id=$this->input->post('p_id');
			
			$this->Breeder_Model->addvideo($p_id,$b_id,$pic);*/
			
			//redirect('User/productlists');
		/*}
		
	
	}*/
	
	/*function videoadd()
	{
	
		$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
		}
		else
		{
	
			//$this->form_validation->set_rules('pcat_id','Category Name','required');
			//$this->form_validation->set_rules('petss','Pet Name','required');
			//$this->form_validation->set_rules('price','Pet Price','required');
			//$this->form_validation->set_rules('quantity','Pet Quantity','required');
			//$this->form_validation->set_rules('descp','Pet Description','required');
			$this->form_validation->set_rules('pvideo','Pet video','required');
				
			if($this->form_validation->run() == FALSE)
			{
					echo validation_errors();
				//echo "........................................video uploading ...........errrrorrssss";
				$result['data']=$this->Breeder_Model->viewpetdtls($b_id);
				$this->load->view('Breeder/petvideo',$result);
			}
			else
			{	
				$p_id=$this->input->post('p_id');
				$pet_name=$this->input->post('pet');
				$b_id=$this->input->post('b_id');
				 if($this->input->post('vupload'))
				 {
					//echo "........................................video uploading started,,,,,,,,,,,, successfully";
					$config['allowed_types']='MP4|AVI|MOV';
					$config['upload_path']='./assets_admin/uploads/.';
					 $config['max_size']='';
					$config['max_width']='200000000';
					$config['max_height']='1000000000000';
					$this->load->library('upload',$config);
					if($this->upload->do_upload('pvideo'))
					{
						print_r($this->upload->data());
					}
					else
					{
						print_r($this->upload->display_errors());
					}
					
					$p_id=$this->input->post('p_id');
					$pet_name=$this->input->post('pet');
					$b_id=$this->input->post('b_id');
					//$quantity=$this->input->post('quantity');
					//$descp=$this->input->post('descp');
					$pic=$this->upload->data('client_name');
					
					$result['data']=$this->Breeder_Model->addvideo($p_id,$b_id,$pet_name,$pic);
					if($result['data'])
					{
						echo "........................................video uploaded successfully";
					}
					else
					{
						echo "...................................video uploading error";
					}
					
					redirect('Breeder/pet');
				}
			}
		}
	
	}*/
	/*function addvideo()
	{
		$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
		}
		else
		{
	
			//$this->form_validation->set_rules('pcat_id','Category Name','required');
			//$this->form_validation->set_rules('petss','Pet Name','required');
			//$this->form_validation->set_rules('price','Pet Price','required');
			//$this->form_validation->set_rules('quantity','Pet Quantity','required');
			//$this->form_validation->set_rules('descp','Pet Description','required');
			//$this->form_validation->set_rules('p_img','Pet Image','required');
			
		if($this->form_validation->run() == FALSE)
		{
				echo "........................................errrrrrrrrrrrrrrrrrrrrrrrrrrrrrrvideo uploaded successfully";
				$result['data']=$this->Breeder_Model->viewpetdtls($b_id);
				
				 //load pet category records details
				$result['data1']=$this->Breeder_Model->viewpetrecords($b_id);
				
				$this->load->view('Breeder/petvideo',$result,$result['data1']);
				echo "........................................errrrrrrrrrrrrrrrrrrrrrrrrrrrrrrvideo uploaded ";
			}
			else
			{
				$p_id=$this->input->post('p_id');
				$pet_name=$this->input->post('pet');
				$b_id=$this->input->post('b_id');
				 if($this->input->post('vupload'))
				 {
					echo "........................................video uploaded,,,,,,,,,,,, successfully";
					$config['allowed_types']='MP4|AVI|MOV';
					$config['upload_path']='./assets_admin/uploads/.';
					$this->load->library('upload',$config);
					if($this->upload->do_upload('pvideo'))
					{
						print_r($this->upload->data());
					}
					else
					{
						print_r($this->upload->display_errors());
					}
					
					$p_id=$this->input->post('p_id');
					$pet_name=$this->input->post('pet');
					$b_id=$this->input->post('b_id');
					$quantity=$this->input->post('quantity');
					$descp=$this->input->post('descp');
					$pic=$this->upload->data('client_name');
					
					$result['data']=$this->Breeder_Model->addvideo($p_id,$b_id,$pet_name,$pic);
					if($result['data'])
					{
						echo "........................................video uploaded successfully";
					}
					else
					{
						echo "...................................video uploading error";
					}
					
					redirect('Breeder/pet');
				}
			}
		}
	}*/
	/*function addvideo()
	{
		//$map=$_FILES['map']['name'];
       // $filename=$this->input->post('map');
	   $config['upload_path'] = './assets_admin/uploads/';
            $config['allowed_types'] = 'mp4|3gp|gif|jpg|png|jpeg|pdf';
            $config['max_size']='';
            $config['max_width']='200000000';
            $config['max_height']='1000000000000';

            // $config['image_library']='gd2';
            //$this->load->library('upload', $config);
	   	$this->load->library('upload',$config);
		
		if($this->upload->do_upload('map')) 
        {
            echo $filename = $_FILES['map']['name'];
            //$config['upload_path'] = './assets/video/';
            
            echo $img = $this->upload->do_upload('map');
			
        }
         echo  $map=$this->upload->data('client_name');
		 echo $map;
		    $data['result'] = $this->Breeder_Model->addvideo($map);
			//echo $data['result'];
            //redirect('user/add_video','refresh'); 
			//load the view along with data
        redirect('Breeder/pet','refresh');
    }*/	
		
	public function addpet()
	{
    $user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	
			$this->form_validation->set_rules('pcat_id','Category Name','required');
			$this->form_validation->set_rules('pet_name','Pet Name','required');
			$this->form_validation->set_rules('price','Pet Price','required');
			$this->form_validation->set_rules('quantity','Pet Quantity','required');
			$this->form_validation->set_rules('descp','Pet Description','required');
			//$this->form_validation->set_rules('p_img','Pet Image','required');
			
		if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->Breeder_Model->viewpetrecords($b_id);
		
		 //load pet category records details
		$result['data1']=$this->Breeder_Model->viewpetcattrecords();
		
		$this->load->view('Breeder/petadd',$result,$result['data1']);

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
			
			$pcat_id=$this->input->post('pcat_id');
			$pet_name=$this->input->post('pet_name');
			$price=$this->input->post('price');
			$quantity=$this->input->post('quantity');
			$descp=$this->input->post('descp');
			$pic=$this->upload->data('client_name');
			
			$this->Breeder_Model->addpet($pcat_id,$b_id,$pet_name,$price,$quantity,$descp,$pic);
			
			redirect('Breeder/pet');
		}
	}	
	}
	
	public function unapprovepet()
	{
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
		$p_id=$this->input->get('p_id');
		
		$this->Breeder_Model->unapprovepet($p_id);
		
		redirect("Breeder/pet");}
	}
	
	public function approvepet()
	{
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
		$p_id=$this->input->get('p_id');
		
		$this->Breeder_Model->approvepet($p_id);
		
		redirect("Breeder/pet");}
	}
/*********************************************************************************/	
    function request()
	{
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	$result['data']=$this->Breeder_Model->viewreqrecords($b_id);
	$this->load->view('Breeder/request',$result);}
	}
	
	public function addreply()
	{
    $user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	
	$req_id=$this->input->get('req_id');
	
		$this->form_validation->set_rules('reply','Reply','required');
		
		if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->Breeder_Model->viewreqrecords($b_id);
		
		$this->load->view('Breeder/replyadd',$result);

		}
		else
		{
			
			$reply=$this->input->post('reply');
			$req_id=$this->input->post('req_id');
			
			$this->Breeder_Model->addreply($reply,$req_id);
			
			redirect('Breeder/request');
		}
		
	}}
	public function request_cert()
	{
		$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
		
				$p_id=$this->input->get('p_id');
				$this->Breeder_Model->request_cert($b_id,$p_id);
						
						redirect('Breeder/pet');
						}
	}
	public function unapprovereq()
	{
		$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
				$req_id=$this->input->get('req_id');
				
				$this->Breeder_Model->unapprovereq($req_id);
				
				redirect("Breeder/request");
				}
	}
	
	public function approvereq()
	{
		$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
			$req_id=$this->input->get('req_id');
		
		
			$this->Breeder_Model->approvereq($req_id);
		
			redirect("Breeder/request");
			}
	}
	public function viewcert()
	{
		$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
		
				$p_id=$this->input->get('p_id');
				$result['data']=$this->Breeder_Model->viewcert($p_id,$b_id);
				$this->load->view('Breeder/view_cert',$result);
				}
	}
	public function addassign()
	{
		$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{	
				$req_id=$this->input->get('req_id');
	
			$this->form_validation->set_rules('d_id','Driver','required');
			
			if($this->form_validation->run() == FALSE)
			{
	
			$result['data']=$this->Breeder_Model->viewreqidrecords($req_id);
					 //load driver records details
			$result['data1']=$this->Breeder_Model->viewdrdecords($b_id);
			
			$this->load->view('Breeder/assignadd',$result,$result['data1']);
	
			}
			else
			{
				
				$req_id=$this->input->post('req_id');
				$u_id=$this->input->post('u_id');
				$b_id=$this->input->post('b_id');
				$p_id=$this->input->post('p_id');
				$d_id=$this->input->post('d_id');
				
				$this->Breeder_Model->addassign($req_id,$u_id,$b_id,$p_id,$d_id);
				
				redirect('Breeder/assign');
			}
		}
	}
	
	    function assign()
	{
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	$result['data']=$this->Breeder_Model->viewassignrecords($b_id);
	$this->load->view('Breeder/assgined',$result);
	}
	}
/*********************************************************************************/		
    function driver() 
	{
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	//load driver details
	$result['data']=$this->Breeder_Model->viewdrecords($b_id);
	$this->load->view('Breeder/driver',$result);
	}
	} 
	function addfile() 
	{
		//$this->form_validation->set_rules('file','file','required');
		
		$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
			//load driver details
			$req_id=$this->input->get('req_id');
			$result['data']=$this->Breeder_Model->viewdtls($b_id,$req_id);
			$this->load->view('Breeder/addfile',$result);
		
		 	if($this->input->post('submit'))
			{
				$config['allowed_types']='gif|jpg|png';
				$config['upload_path']='./assets_admin/images';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('file'))
				{
					print_r($this->upload->data());
				}
				else
				{
					print_r($this->upload->display_errors());
				}
				$req_id=$this->input->post('req_id');
				$u_id=$this->input->post('u_id');
				$b_id=$this->input->post('b_id');
				$p_id=$this->input->post('p_id');
				$fil=$this->upload->data('client_name');
				$this->Breeder_Model->adfiles($req_id,$u_id,$b_id,$p_id,$fil);
				
				redirect('Breeder/request');
			}
			else
			{
				echo "error	";
				}
		}
	}
	/*public function adddriver()
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

        $b_id = $this->session->userdata('b_id');
		$result['data']=$this->Breeder_Model->viewdrecords($b_id);
		$this->load->view('Breeder/driveradd',$result);

		}
		else
		{
            $b_id = $this->session->userdata('b_id');
			$name=$this->input->post('name');
			$gender=$this->input->post('gender');
			$email=$this->input->post('email');
			$contactno=$this->input->post('contactno');
			$address=$this->input->post('address');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			
			$this->Breeder_Model->adddriver($b_id,$name,$gender,$email,$contactno,$address,$username,$password);
			
			redirect('Breeder/driver');
		}
		
	}*/

    public function unapprovedrdata()
	{
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
		$d_id=$this->input->get('d_id');
		
		$this->Breeder_Model->unapprovedrrecords($d_id);
		
		redirect("Breeder/driver");}
	}
	
	public function approvedrdata()
	{
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
		$d_id=$this->input->get('d_id');
		
		$this->Breeder_Model->approvedrrecords($d_id);
		
		redirect("Breeder/driver");
	}
	
	}
	/* Product Management */
     
	 function product()
	{
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	$result['data']=$this->Breeder_Model->viewproductrecords();
	$this->load->view('Breeder/product',$result);
	}
	}
	function paddtocart()
	{
		$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	  $pdct_id=$this->input->get('pdct_id');
	  //$u_id=$this->input->get('u_id');
	  $p=$this->input->get('p');
	  

	  $result['data']=$this->Breeder_Model->checkcart($b_id,$pdct_id);
	 
	  $data = $result['data'];

	   foreach($data as $row) 
	       { 
		      $quantity = $row->quantity;
	          $newqty = $quantity + 1; 
		   }
		   
	  //if($result['data']==1)  
	  if(!empty($data))
		{
		 $amt= $p * $newqty;
		 $this->Breeder_Model->updatetocart($b_id,$pdct_id,$amt,$newqty);
		 
		 redirect('Breeder/product');
	 
	    } else { //echo "new";
		
	     $this->Breeder_Model->addtocart($b_id,$pdct_id,$p);
		 
	     redirect('Breeder/product');
		 }
	    }
		}	/*$con = mysql_connect("localhost","root","") or die (mysql_error());
        mysql_select_db("petcare", $con) or die (mysql_error());
		
	$b_id=$_GET['b_id'];
$pdct_id=$_GET['pdct_id'];
$quantity=1;
$price=$_GET['p'];
$amount=($quantity*$price);
//$status=0;

$qry1="SELECT * FROM product WHERE pdct_id='$pdct_id'";
$res1=mysql_query($qry1) or die(mysql_error());
$rw1=mysql_fetch_array($res1);
$pquantity=$rw1['quantity'];

$qry="SELECT * FROM cart WHERE pdct_id='$pdct_id' and status='0' and `b_id`='$b_id'";
$res=mysql_query($qry) or die(mysql_error());
$rw=mysql_fetch_array($res);
//echo $rs=mysql_affected_rows();

	if(mysql_affected_rows() > 0)
		{
			$qty=$rw['quantity'];
			$tqty=$qty+$quantity;
			$tamt=($tqty*$price);
			
			$query1="update cart SET `quantity`='$tqty',`amount`='$tamt' where pdct_id='$pdct_id' and status='0' and `b_id`='$b_id'";
			$result1=mysql_query($query1) or die(mysql_error());
			
			$tot2=($pquantity-$quantity);
			$qry2="update product SET `quantity`='$tot2' where pdct_id='$pdct_id'";
			$res2=mysql_query($qry2) or die(mysql_error());
			
			    if(mysql_affected_rows()>0)
				{
				header("location:product");
				}
				else
				{
				header("location:product");
				}
		}
	else
	{
		$query="insert into cart(cart_id,b_id,pdct_id,quantity,amount,status) values('','$b_id','$pdct_id','$quantity','$amount','0')";
		$result=mysql_query($query) or die(mysql_error());
		
		$tot22=($pquantity-$quantity);
		$qry22="update product SET `quantity`='$tot22' where pdct_id='$pdct_id'";
		$res22=mysql_query($qry22) or die(mysql_error());
		
		  if(mysql_affected_rows()>0)
			{
			header("location:product");
			}
			else
			{
			header("location:product");
			}
	}*/
	
	
	
	public function cart_delete()
	{
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
		$pdct_id=$this->input->get('pdct_id');
		$b_id=$this->input->get('b_id');
		
		$this->Breeder_Model->deletecartrecords($b_id,$pdct_id);
		
		redirect('Breeder/cart');
	}
	}
	
	function cart()
	{
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	$result['data']=$this->Breeder_Model->viewcartrecords($b_id);
	$this->load->view('Breeder/cart',$result);
	}
	}
	public function checkout()
	{
		 $user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	
	         $total=$this->input->get('total');
			  
			  $this->form_validation->set_rules('firstname','Name','required');
			  $this->form_validation->set_rules('email','Email','required');
			  $this->form_validation->set_rules('address','Address','required');
			  $this->form_validation->set_rules('city','City','required');
			  $this->form_validation->set_rules('state','State','required');
			  $this->form_validation->set_rules('zip','Zip Code','required');
			  
			  $this->form_validation->set_rules('cardname','Name on Card','required');
			  $this->form_validation->set_rules('cardNumber','Card Number','required');
			  $this->form_validation->set_rules('expdate','Exp Date','required');
			  $this->form_validation->set_rules('cvv','CVV','required');
			 
	    if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->Breeder_Model->checkcartrecords($b_id);
		$b_id = $this->session->userdata('b_id');
		$result['data']=$this->Breeder_Model->viewcartrecords($b_id);
		$this->load->view('Breeder/checkout',$result);

		}
		else
		{
			
			$firstname=$this->input->post('firstname');
			$email=$this->input->post('email');
			$address=$this->input->post('address');
			$city=$this->input->post('city');
			$state=$this->input->post('state');
			$zip=$this->input->post('zip');
			$billing_add=$firstname."<br>".$address."<br>".$city.",".$state."-".$zip."<br>".$email;
			$ddate=date("d/m/Y");
			
		    $amt=$this->input->post('amt');
			$cardname=$this->input->post('cardname');
			$cardNumber=$this->input->post('cardNumber');
			$expdate=$this->input->post('expdate');
			$cvv=$this->input->post('cvv');
			
			 $cart_id=$this->input->post('cart_id');
			
			
			$result['data']=$this->Breeder_Model->checkaccount($cardname,$cardNumber,$expdate,$cvv);
			$data = $result['data'];

	        foreach($data as $row) 
			   { 
				  $amount = $row->amount;
				  $b_amt = $amount - $amt; 
			   }
			$this->Breeder_Model->updateaccount($b_amt);
			
			$this->Breeder_Model->addtopurchase($cart_id,$b_id,$amt,$billing_add,$ddate);
			
			$this->Breeder_Model->updatemycart($cart_id,$b_id); 
			
			$msg = 'Payment Success'; 
			echo "<script type='text/javascript'>alert('$msg');</script>";
			redirect('Breeder/payhis', 'refresh');
		}
	}
	}  

	function payhis()
	{
		$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	$result['data']=$this->Breeder_Model->viewpayhisrecords($b_id);
	$this->load->view('Breeder/pay_his',$result);
	}
	}
	
	
	
	
	
	function vet()
	{
	//$id=2;
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	$result['data']=$this->Breeder_Model->viewvrecords();
	$this->load->view('Breeder/vet',$result);
	}
	}
	public function addmessage()
	{
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
          $v_id=$this->input->get('v_id');
		  
		$this->form_validation->set_rules('message','Message','required');
		
		if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->Breeder_Model->viewvidrecords($v_id);
		$this->load->view('Breeder/msgadd',$result);

		}
		else
		{

			$v_id=$this->input->post('v_id');
			$b_id=$this->input->post('b_id');
			$message=$this->input->post('message');
			
			$this->Breeder_Model->addmsg($v_id,$b_id,$message);
			
			redirect('Breeder/message');
		}
		}
	}
	
		function customer()
	{
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	$result['data']=$this->Breeder_Model->viewtrecords();
	$this->load->view('Breeder/trainer',$result);
	}}
	
	public function addtmessage()
	{
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
          $t_id=$this->input->get('t_id');
		  
		$this->form_validation->set_rules('message','Message','required');
		
		if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->Breeder_Model->viewtidrecords($t_id);
		$this->load->view('Breeder/msgtadd',$result);

		}
		else
		{

			$t_id=$this->input->post('t_id');
			$b_id=$this->input->post('b_id');
			$message=$this->input->post('message');
			
			$this->Breeder_Model->addtmsg($t_id,$b_id,$message);
			
			redirect('Breeder/tmessage');
		}
		}
	}
	
	public function addvmessage()
	{
    $user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	
	$v_id=$this->input->get('v_id');
	
		$this->form_validation->set_rules('msg','Message','required');
		
		if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->Breeder_Model->viewvetrecords($v_id);
	
		$this->load->view('Breeder/messagevadd',$result);

		}
		else
		{
			
			$msg=$this->input->post('msg');
			$v_id=$this->input->post('v_id');
			
			$this->Breeder_Model->addmsg($msg,$v_id,$b_id);
			
			redirect('Breeder/message');
		}
		}
	}
	
	function message()
	{
	$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	$result['data']=$this->Breeder_Model->viewvetmsgrecords($b_id);
	$this->load->view('Breeder/message',$result);
	}
	}
	function tmessage()
	{
		$user = $this->session->userdata('user');
		$b_id = $this->session->userdata('b_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
	$result['data']=$this->Breeder_Model->viewtrnmsgrecords($b_id);
	$this->load->view('Breeder/tmessage',$result);
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