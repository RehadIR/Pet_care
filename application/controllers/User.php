<?php
class User extends CI_Controller 
{
	public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	
	//load database libray manually
	$this->load->database();
	//load Model
	$this->load->model('User_Model');
	//load Helper
	//$this->load->helper('url');
	$this->load->helper(array('form', 'url', 'html'));
	//load validation
    $this->load->library('form_validation');
	// Load session library
    $this->load->library('session');
	ob_start();
	}

	
	
	public function index()
	{
		$user = $this->session->userdata('user');
		$u_id = $this->session->userdata('u_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
		//load login user details
		$result['data']=$this->User_Model->viewbrecords($user);
		$this->load->view('User/dashboard',$result);}
	}

   /* Pet Management */
     
	 function pet()
	{
		$user = $this->session->userdata('user');
		$u_id = $this->session->userdata('u_id');
		if($user !=TRUE || empty($user))
		{
			$this->session->set_flashdata('error','session has expired');
			redirect('login');
			}
			else
			{
			$result['data']=$this->User_Model->viewpetrecords();
			$this->load->view('User/pet',$result);
		}
	}
	function vvideo()
	{
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
		{
		$this->session->set_flashdata('error','session has expired');
		redirect('login');
		}
		else
		{
	$result['data']=$this->User_Model->viewpetvideo();
	$this->load->view('User/view_video',$result);}
	}
public function purchase()
{
    $user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
		$p_id=$this->input->get('p_id');
		$u_id=$this->input->get('u_id');
		
		$this->form_validation->set_rules('quantity','Quantity','required');
		$this->form_validation->set_rules('address','Address','required');
		
		if($this->form_validation->run() == FALSE)
		{

		//$result['data']=$this->User_Model->viewpurchaserecords($u_id);
		$result['data']=$this->User_Model->viewpetidrecords($p_id);
		
		$this->load->view('User/purchaseadd',$result);

		}
		else
		{
			
			$quantity=$this->input->post('quantity');
			$price=$this->input->post('price');
			
			
			$address=$this->input->post('address');
			$p_id=$this->input->post('p_id');
			$b_id=$this->input->post('b_id');
			$u_id=$this->input->post('u_id');
			
			$this->User_Model->addrequest($p_id,$b_id,$u_id,$quantity,$price,$address);
			
			redirect('User/purhis');
		}
	}	
}
	function purhis()
	{
	$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
	$result['data']=$this->User_Model->viewpurhisrecords($u_id);
	$this->load->view('User/purchase_his',$result);
	}
	}
	function Certificate()
	{ 
	$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
	$p_id=$this->input->get('p_id');
	$result['data']=$this->User_Model->viewcert($u_id,$p_id);
	$this->load->view('User/certificate',$result);
	}
	}
	public function purdeletedata()
	{
		$user = $this->session->userdata('user');
		$u_id = $this->session->userdata('u_id');
		if($user !=TRUE || empty($user))
		{
		$this->session->set_flashdata('error','session has expired');
		redirect('login');
		}
		else
		{
		$req_id=$this->input->get('req_id');
		
		$this->User_Model->deletepurrecords($req_id);
		
		redirect('User/purhis');}
	}
	
	function purcheckdata()
	{
	$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
	$req_id=$this->input->get('req_id');
	
	$result['data']=$this->User_Model->viewpurhissrecords($u_id,$req_id);
	
	$result['data1']=$this->User_Model->viewpurassignrecords($u_id,$req_id);
	
	$this->load->view('User/purchase_stat',$result,$result['data1']);
	}}
	
	public function addmessage()
	{
	$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
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

		$result['data']=$this->User_Model->viewvidrecords($v_id);
		$this->load->view('User/msgadd',$result);

		}
		else
		{

			$v_id=$this->input->post('v_id');
			$u_id=$this->input->post('u_id');
			$message=$this->input->post('message');
			
			$this->User_Model->addmsg($v_id,$u_id,$message);
			
			redirect('User/message');
		}
	}	
	}
	
	public function addtmessage()
	{
		$user = $this->session->userdata('user');
		$u_id = $this->session->userdata('u_id');
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

		$result['data']=$this->User_Model->viewtidrecords($t_id);
		$this->load->view('User/msgtadd',$result);

		}
		else
		{

			$t_id=$this->input->post('t_id');
			$u_id=$this->input->post('u_id');
			$message=$this->input->post('message');
			
			$this->User_Model->addtmsg($t_id,$u_id,$message);
			
			redirect('User/tmessage');
		}
	}	
	}
	
	public function addbdmessage()
	{
		$user = $this->session->userdata('user');
		$u_id = $this->session->userdata('u_id');
		if($user !=TRUE || empty($user))
		{
		$this->session->set_flashdata('error','session has expired');
		redirect('login');
		}
		else
		{
          $bd_id=$this->input->get('bd_id');
		  $u_id = $this->session->userdata('u_id');
		$this->form_validation->set_rules('message','Message','required');
		
		if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->User_Model->viewbdidrecords($bd_id);
		$this->load->view('User/msgbdadd',$result);

		}
		else
		{

			$bd_id=$this->input->post('bd_id');
			$u_id=$this->input->post('u_id');
			$message=$this->input->post('message');
			
			$this->User_Model->addbdmsg($bd_id,$u_id,$message);
			
			redirect('User/bmessage');
		}
		}
	}
	
	/*function message()
	{
	$u_id = $this->session->userdata('u_id');
	$result['data']=$this->User_Model->viewmsgrecords($u_id);
	$this->load->view('User/message',$result);
	}*/
	
	function message()
	{
	$u_id = $this->session->userdata('u_id');
	$result['data']=$this->User_Model->viewvetmsgrecords($u_id);
	$this->load->view('User/message',$result);
	}
	function feedback()
	{
	$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
	//$result['data']=$this->User_Model->viewvetmsgrecords($u_id);
	$this->form_validation->set_rules('feedback','feedback','required');
	if($this->form_validation->run() == FALSE)
	{
	$this->load->view('User/feedback');
	}
	else
		{
			
			$feed=$this->input->post('feedback');
			$u_id=$this->input->post('u_id');
			
			$this->User_Model->addfeed($feed,$u_id);
			
			redirect('User/view_feed');
		}
	}	
	}
	function view_feed()
	{
	$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
	$result['data']=$this->User_Model->viewfeed($u_id);
	$this->load->view('User/view_feed',$result);
	}}
	function tmessage()
	{
	$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
	$result['data']=$this->User_Model->viewtrnmsgrecords($u_id);
	$this->load->view('User/tmessage',$result);
	}
	}
	function bmessage()
	{
	$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
	$result['data']=$this->User_Model->viewbrdmsgrecords($u_id);
	$this->load->view('User/bmessage',$result);
	}
	}
	public function addreply()
	{
    $user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
	
	$mes_id=$this->input->get('mes_id');
	
		$this->form_validation->set_rules('reply','Reply','required');
		
		if($this->form_validation->run() == FALSE)
		{

		$result['data']=$this->User_Model->viewmsgrecords($u_id);
		
		$this->load->view('User/replyadd',$result);

		}
		else
		{
			
			$reply=$this->input->post('reply');
			$mes_id=$this->input->post('mes_id');
			
			$this->User_Model->addreply($reply,$mes_id);
			
			redirect('User/message');
		}
		}
	}
	
	/* Product Management */
     
	 function product()
	{
	
	$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
	$result['data']=$this->User_Model->viewproductrecords();
	$this->load->view('User/product',$result);
	}
	}
	function paddtocart()
	{
      $user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
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
	  

	  $result['data']=$this->User_Model->checkcart($u_id,$pdct_id);
	 
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
		 $this->User_Model->updatetocart($u_id,$pdct_id,$amt,$newqty);
		 
		 redirect('User/product');
	 
	    } else { //echo "new";
		
	     $this->User_Model->addtocart($u_id,$pdct_id,$p);
		 
	     redirect('User/product');
		 
	    }
	  }
	}
	
	function cart()
	{
		$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
		$result['data']=$this->User_Model->viewcartrecords($u_id);
		if($result['data']>=1)  
		{ 
		$this->load->view('User/cart',$result);
		}  else {
	        
			 redirect("User/product"); }
	}
	}
	public function cart_delete()
	{
	$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
		$pdct_id=$this->input->get('pdct_id');
		$u_id=$this->input->get('u_id');
		
		$this->User_Model->deletecartrecords($u_id,$pdct_id);
		
		redirect('User/cart');
	}}
		public function checkout()
	{
		$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
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

		$result['data']=$this->User_Model->checkcartrecords($u_id);
		
		$this->load->view('User/checkout',$result);

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
			
			
			$result['data']=$this->User_Model->checkaccount($cardname,$cardNumber,$expdate,$cvv);
			$data = $result['data'];

	        foreach($data as $row) 
			   { 
				  $amount = $row->amount;
				  $b_amt = $amount - $amt; 
			   }
			$this->User_Model->updateaccount($b_amt);
			
			$this->User_Model->addtopurchase($cart_id,$u_id,$amt,$billing_add,$ddate);
			
			$this->User_Model->updatemycart($cart_id,$u_id); 
			
			$msg = 'Payment Success'; 
			echo "<script type='text/javascript'>alert('$msg');</script>";
			redirect('User/payhis', 'refresh');
		}
}
	}  

	function payhis()
	{
	$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
	$result['data']=$this->User_Model->viewpayhisrecords($u_id);
	$this->load->view('User/pay_his',$result);
	}
	}
	    function vet()
	{
	$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
	//$id=2;
	$result['data']=$this->User_Model->viewvrecords();
	$this->load->view('User/vet',$result);
	}
	}
		function trainer()
	{
	$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
	//$id=3;
	$result['data']=$this->User_Model->viewtrecords();
	$this->load->view('User/trainer',$result);
	}
	}
		function boarding()
	{
	$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
	//$id=4;
	$result['data']=$this->User_Model->viewbdrecords();
	$this->load->view('User/boarding',$result);
	}}
	 
	         
	public function pet_checkout()
	{
		 $user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
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

		$result['data']=$this->User_Model->checkpetrecords($u_id);
		
		$this->load->view('User/pcheckout',$result);

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
			$ddate=
			
			$assgn_date=$this->input->post('assgn_date');
		    $amt=$this->input->post('amt');
			$cardname=$this->input->post('cardname');
			$cardNumber=$this->input->post('cardNumber');
			$expdate=$this->input->post('expdate');
			$cvv=$this->input->post('cvv');
			
			 $req_id=$this->input->post('req_id');
			
			
			$result['data']=$this->User_Model->checkaccount($cardname,$cardNumber,$expdate,$cvv);
			$data = $result['data'];

	        foreach($data as $row) 
			{ 
			  $amount = $row->amount;
			  //echo $amount ;
			  $b_amt = $amount - $amt; 
			}
			$b_amt = $amount - $amt;
			$this->User_Model->updateaccount($b_amt);
			
			$con = mysql_connect("localhost","root","") or die (mysql_error());
        mysql_select_db("petcare", $con) or die (mysql_error());
			$qry1="select * from admin  ";
			$res1=mysql_query($qry1) or die(mysql_error());
			$rw1=mysql_fetch_array($res1);
			echo $adm_amount=$rw1['amount'];
			
			$this->User_Model->addtopetpurchase($req_id,$u_id,$amt,$billing_add,$ddate,$adm_amount);
			
			$this->User_Model->updaterequest($req_id,$u_id,$assgn_date); 
			
			$msg = 'Payment Success'; 
			echo "<script type='text/javascript'>alert('$msg');</script>";
			redirect('User/pay_phis', 'refresh');
		}
		}
	}
	function pay_phis()
	{
	$user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	if($user !=TRUE || empty($user))
	{
	$this->session->set_flashdata('error','session has expired');
	redirect('login');
	}
	else
	{
	$result['data']=$this->User_Model->viewpayhisprecords($u_id);
	$this->load->view('User/pay_phis',$result);
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