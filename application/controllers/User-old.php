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
		$result['data']=$this->User_Model->viewbrecords($user);
		$this->load->view('User/dashboard',$result);
	}

   /* Pet Management */
     
	 function pet()
	{
	$result['data']=$this->User_Model->viewpetrecords();
	$this->load->view('User/pet',$result);
	}
	
	public function purchase()
	{
    $user = $this->session->userdata('user');
	//$u_id = $this->session->userdata('u_id');
	
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
			$address=$this->input->post('address');
			$p_id=$this->input->post('p_id');
			$b_id=$this->input->post('b_id');
			$u_id=$this->input->post('u_id');
			
			$this->User_Model->addrequest($p_id,$b_id,$u_id,$quantity,$address);
			
			redirect('User/purhis');
		}
		
	}
	function purhis()
	{
	echo $u_id = $this->session->userdata('u_id');
	$result['data']=$this->User_Model->viewpurhisrecords($u_id);
	$this->load->view('User/purchase_his',$result);
	}
	
	public function purdeletedata()
	{
		$req_id=$this->input->get('req_id');
		
		$this->User_Model->deletepurrecords($req_id);
		
		redirect('User/purhis');
	}
	
	public function addmessage()
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
	
	public function addtmessage()
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
			
			redirect('User/message');
		}
		
	}
	
	public function addbdmessage()
	{
          $bd_id=$this->input->get('bd_id');
		  
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
			
			redirect('User/message');
		}
		
	}
	
	function message()
	{
	$u_id = $this->session->userdata('u_id');
	$result['data']=$this->User_Model->viewmsgrecords($u_id);
	$this->load->view('User/message',$result);
	}
	
	public function addreply()
	{
    $user = $this->session->userdata('user');
	$u_id = $this->session->userdata('u_id');
	
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
	
	/* Product Management */
     
	 function product()
	{
		$u_id = $this->session->userdata('u_id');
	$result['data']=$this->User_Model->viewproductrecords();
	$this->load->view('User/product',$result);
	}
	
	function paddtocart()
	{
			$con = mysql_connect("localhost","root","") or die (mysql_error());
        mysql_select_db("petcare", $con) or die (mysql_error());
		
	$u_id=$_GET['u_id'];
$pdct_id=$_GET['pdct_id'];
$quantity=1;
$price=$_GET['p'];
$amount=($quantity*$price);
//$status=0;

$qry1="SELECT * FROM product WHERE pdct_id='$pdct_id'";
$res1=mysql_query($qry1) or die(mysql_error());
$rw1=mysql_fetch_array($res1);
$pquantity=$rw1['quantity'];

$qry="SELECT * FROM cart WHERE pdct_id='$pdct_id' and status='0' and `u_id`='$u_id'";
$res=mysql_query($qry) or die(mysql_error());
$rw=mysql_fetch_array($res);
//echo $rs=mysql_affected_rows();

	if(mysql_affected_rows() > 0)
		{
			$qty=$rw['quantity'];
			$tqty=$qty+$quantity;
			$tamt=($tqty*$price);
			
			$query1="update cart SET `quantity`='$tqty',`amount`='$tamt' where pdct_id='$pdct_id' and status='0' and `u_id`='$u_id'";
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
		$query="insert into cart(cart_id,u_id,pdct_id,quantity,amount,status) values('','$u_id','$pdct_id','$quantity','$amount','0')";
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
	}
	}
	
	function cart()
	{
	$u_id = $this->session->userdata('u_id');
	$result['data']=$this->User_Model->viewcartrecords($u_id);
	$this->load->view('User/cart',$result);
	}
	
	public function cart_delete()
	{
		$pdct_id=$this->input->get('pdct_id');
		$u_id=$this->input->get('u_id');
		
		$this->User_Model->deletecartrecords($u_id,$pdct_id);
		
		redirect('User/cart');
	}
		public function checkout()
	{
		 $user = $this->session->userdata('user');
	     $u_id = $this->session->userdata('u_id');
	
	         $total=$this->input->get('total');
	
		//$this->form_validation->set_rules('reply','Reply','required');
		
		if($this->form_validation->run() == FALSE)
		{

		//$result['data']=$this->User_Model->viewmsgrecords($u_id);
		
		$this->load->view('User/checkout');

		}
		else
		{
		
		$con = mysql_connect("localhost","root","") or die (mysql_error());
        mysql_select_db("petcare", $con) or die (mysql_error());	
$cart_id=$_POST['cart_id'];
$u_id=$_POST['u_id'];
$price=$_POST['price'];
echo $profit=$_POST['profit'];
$ddate=date("d/m/Y");

$firstname=$_POST['firstname'];
$email=$_POST['email'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];

$billing_add=$firstname."<br>".$address."<br>".$city.",".$state."-".$zip."<br>".$email;

$cardname=$_POST['cardname'];
$cardNumber=$_POST['cardNumber'];
$expdate=$_POST['expdate'];
$cvv=$_POST['cvv'];


$qry0="SELECT * FROM account WHERE holder_name='$cardname' and cardno='$cardNumber' and `expiry`='$expdate' and `mpin`='$cvv'";
$res0=mysql_query($qry0) or die(mysql_error());
$rw0=mysql_fetch_array($res0);
$acct_no=$rw0['acct_no'];
$amount=$rw0['amount'];
echo $t_amt=($amount-$price);

if(mysql_affected_rows() > 0)
	{
	
	$query2="update account SET `amount`='$t_amt' where acct_no='$acct_no'";
    $result2=mysql_query($query2) or die(mysql_error());

	echo  $query="insert into product_purchase(p_id,cart_id,u_id,price,mode_of,billing_add,profit,ddate,status)values('','$cart_id','$u_id','$price','card','$billing_add','$profit','$ddate','1')";

$result=mysql_query($query) or die(mysql_error());

//$query1="update cart SET `status`='1' where pdct_id='$pdct_id' and status='0' and `u_id`='$u_id'";
$query1="update cart SET `status`='1' where status='0' and `u_id`='$u_id'";
$result1=mysql_query($query1) or die(mysql_error());

 $query2="insert into admin_account(act_no,cart_id,u_id,profit,ddate)values('','$cart_id','$u_id','$profit','$ddate')";
$result2=mysql_query($query2) or die(mysql_error());

	
	/* if(mysql_affected_rows()>0)
				{
				header("location:pay_his.php");
				}
				else
				{
				header("location:checkout.php");
				}*/
				
	}
else
	{
	
	}	
			
			//$this->User_Model->addpayment($reply,$mes_id);
			
			redirect('User/message');
		}  
	}
	
	    function vet()
	{
	//$id=2;
	$result['data']=$this->User_Model->viewvrecords();
	$this->load->view('User/vet',$result);
	}
	
		function trainer()
	{
	//$id=3;
	$result['data']=$this->User_Model->viewtrecords();
	$this->load->view('User/trainer',$result);
	}
	
		function boarding()
	{
	//$id=4;
	$result['data']=$this->User_Model->viewbdrecords();
	$this->load->view('User/boarding',$result);
	}
	 public function Logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
	         
	
}
?>