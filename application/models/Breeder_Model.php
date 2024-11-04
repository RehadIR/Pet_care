<?php
class Breeder_Model extends CI_Model 
{
     function viewbrecords($user)
	{
	$query=$this->db->query("select * from breeder WHERE name='$user'");
	return $query->result();
	}

    function viewpetrecords($b_id)
	{
	$query=$this->db->query("select * from pet where b_id='".$b_id."'");
	return $query->result();
	}
	
	function viewpetdrecords($p_id)
	{
	$query=$this->db->query("select * from pet where p_id='".$p_id."'");
	return $query->result();
	}
	
	/*function addvideo($p_id,$b_id,$pet_name,$pic )
	{
	$p_id=$this->input->get('p_id');
	$this->db->query("UPDATE pet SET p_video='$pic' WHERE p_id='".$p_id."'");
	}*/
	function addvideoo($b_id,$p_id,$pic)
	{
	//$p_id=$this->input->get('p_id');
	echo "UPDATE pet SET p_video='$pic' WHERE p_id='".$p_id."'";
	$this->db->query("UPDATE pet SET p_video='$pic' WHERE p_id='".$p_id."'");
	}
	
	
	
	function viewpetdtls($b_id)
	{
	$p_id=$this->input->get('p_id');
	$query=$this->db->query("select * from pet where b_id='".$b_id."'and p_id='".$p_id."'");
	return $query->result();
	}
	function viewpetcattrecords()
	{
	$query=$this->db->query("select * from pet_category where status=1");
	return $query->result();
	}
	
	function addpet($pcat_id,$b_id,$pet_name,$price,$quantity,$descp,$pic)
	{
		$query="insert into pet(p_id,pcat_id,b_id,pet_name,price,quantity,descp,p_img,status)values('','$pcat_id','$b_id','$pet_name','$price','$quantity','$descp','$pic','1')";
		
		$this->db->query($query);
	}
	
	function unapprovepet($p_id)
	{
		$this->db->query("UPDATE pet SET status=0 WHERE p_id='".$p_id."'");
	}
	
	function approvepet($p_id)
	{
		$this->db->query("UPDATE pet SET status=1 WHERE p_id='".$p_id."'");
	}
	
			function viewvrecords()
	{
	$query=$this->db->query("select * from vet where status=1");
	return $query->result();
	}
	function viewvidrecords($v_id)
	{
	$query=$this->db->query("select * from vet where v_id='$v_id'");
	return $query->result();
	}
	function addmsg($v_id,$b_id,$message)
	{
	$query="insert into message(mes_id,b_id,v_id,message)values('','$b_id','$v_id','$message')";
	$this->db->query($query);
	}
	
	function viewtrecords()
	{
	$query=$this->db->query("select * from user where status=1");
	return $query->result();
	}
	function viewcert($p_id,$b_id)
	{
		$query=$this->db->query("select * from pet where p_id='".$p_id."'and b_id='".$b_id."'");
	return $query->result();
	}
	function viewtidrecords($t_id)
	{
	$query=$this->db->query("select * from user where u_id='$t_id'");
	return $query->result();
	}
	
	function addtmsg($t_id,$b_id,$message)
	{
	echo $query="UPDATE message SET reply='$message' WHERE b_id='$b_id' AND u_id='$t_id'";
	$this->db->query($query);
	}
	function checkcart($b_id,$pdct_id)
	{
	$query=$this->db->query("select * from cart where b_id='$b_id' and pdct_id='$pdct_id' and status='0'");
	return $query->result();
	}
	function addtocart($b_id,$pdct_id,$p)
	{
		$query="insert into cart(cart_id,u_id,b_id,pdct_id,quantity,amount,status)values('','','$b_id','$pdct_id','1','$p','0')";
		
		$this->db->query($query);
	}
	function updatetocart($b_id,$pdct_id,$amt,$newqty)
	{
	
		$query="UPDATE cart SET quantity='$newqty',amount='$amt' where b_id='$b_id' and pdct_id='$pdct_id'";
		
		$this->db->query($query);
	}
	 function deletecartrecords($b_id,$pdct_id)
	{
		$this->db->query("delete from cart where pdct_id='$pdct_id' and b_id='$b_id'");
	}
	function checkcartrecords($b_id)
	{
	$query=$this->db->query("select group_concat(cart_id) as cart_id from cart WHERE `b_id`='$b_id' and status=0");
	return $query->result();
	}
	
	function checkaccount($cardname,$cardNumber,$expdate,$cvv)
	{
	$query=$this->db->query("SELECT * FROM account WHERE holder_name='$cardname' and cardno='$cardNumber' and `expiry`='$expdate' and `mpin`='$cvv'");
	return $query->result();
	}
	function updateaccount($b_amt)
	{
	
		$query="UPDATE account SET amount='$b_amt'";
		
		$this->db->query($query);
	}
	
	function addtopurchase($cart_id,$b_id,$amt,$billing_add,$ddate)
	{
		$query="insert into product_purchase(p_id,cart_id,u_id,b_id,price,mode_of,billing_add,ddate,status)values('','$cart_id','','$b_id','$amt','card','$billing_add','$ddate','1')";
		
		$this->db->query($query);
	}
	
	function updatemycart($cart_id,$b_id)
	{
	
		$query="update cart SET `status`='1' where status='0' and `b_id`='$b_id'";
		
		$this->db->query($query);
	}
	
	function viewpayhisrecords($b_id)
	{
	$query=$this->db->query("select * from product_purchase where b_id='".$b_id."'");
	return $query->result();
	}
	function viewdtls($b_id,$req_id)
	{
	
	$query=$this->db->query("select * from request where req_id='".$req_id."'");
	return $query->result();
	}
	function adfiles($req_id,$u_id,$b_id,$p_id,$fil)
	{
	$query="UPDATE request SET files='$fil' WHERE req_id='".$req_id."'";
    $this->db->query($query);
	}
	function request_cert($b_id,$p_id)
	{
	$query="UPDATE pet SET request='1' WHERE p_id='".$p_id."'";
    $this->db->query($query);
	}
	
	
	
   function addassign($req_id,$u_id,$b_id,$p_id,$d_id)
	{
	$query="insert into assign(ass_id,d_id,u_id,b_id,req_id)values('','$d_id','$u_id','$b_id','$req_id')";
	$this->db->query($query);
	
	$query="UPDATE request SET status='2' WHERE req_id='".$req_id."'";
    $this->db->query($query);
	
	}
	
	function viewassignrecords($b_id)
	{
	$query=$this->db->query("select * from assign where b_id='".$b_id."'");
	return $query->result();
	}
	function viewassignrecordsByid($req_id)
	{
	$query=$this->db->query("select * from assign where req_id='".$req_id."'");
	return $query->result();
	}
	
	function viewreqrecords($b_id)
	{
	$query=$this->db->query("select * from request where b_id='".$b_id."'");
	return $query->result();
	}
	
	function viewreqidrecords($req_id)
	{
	$query=$this->db->query("select * from request where req_id='".$req_id."'");
	return $query->result();
	}
	
	function addreply($reply,$req_id)
	{
		$query="UPDATE request SET reply='$reply' WHERE req_id='".$req_id."'";
		
		$this->db->query($query);
	}
	
		function unapprovereq($req_id)
	{
		$this->db->query("UPDATE request SET status=0 WHERE req_id='".$req_id."'");
	}
	
	function approvereq($req_id)
	{
		$this->db->query("UPDATE request SET status=1 WHERE req_id='".$req_id."'");
	}
	
    function viewdrecords($b_id)
	{
		$query=$this->db->query("select * from driver ");
		return $query->result();
	}
 function viewdrdecords($b_id)
	{
		$query=$this->db->query("select * from driver where  status=1");
		return $query->result();
	}
	
    function unapprovedrrecords($d_id)
	{
		$this->db->query("UPDATE driver SET status=0 WHERE d_id='".$d_id."'");
	}
	
	function approvedrrecords($d_id)
	{
		$this->db->query("UPDATE driver SET status=1 WHERE d_id='".$d_id."'");
	}
	
	
	function viewproductrecords()
	{
	$query=$this->db->query("select * from product");
	return $query->result();
	}
	
	function viewpcattrecords()
	{
	$query=$this->db->query("select * from category where status=1");
	return $query->result();
	}
	
	function viewcartrecords($b_id)
	{
	$query=$this->db->query("select * from cart  WHERE b_id='".$b_id."'");
	return $query->result();
	}
	
	function ucheck($role,$breeder,$pass)
	{
		$query=$this->db->query("select * from driver where breedername='".$breeder."' and password='".$pass."'");
		return $row = $query->num_rows();
		return $query->result();
	}
	
	function check($role,$breeder,$pass)
	{
		$query=$this->db->query("select * from breeder where breedername='".$breeder."' and password='".$pass."' and role='".$role."'");
		return $row = $query->num_rows();
		return $query->result();
	}
	
	function insert_details($role,$name,$gender,$email,$mobile,$address,$breedername,$password)
	{
		$qry="insert into breeder (b_id,role,name,gender,email,contactno,address,breedername,password)values('','$role','$name','$gender','$email','$mobile','$address','$breedername','$password')";
		$this->db->query($qry);
	}
	
	function viewurecords($id)
	{
	$query=$this->db->query("select * from breeder WHERE role='$id'");
	return $query->result();
	}
	
	function viewvetrecords($v_id)
	{
	$query=$this->db->query("select * from breeder WHERE b_id='$v_id'");
	return $query->result();
	}
	
	function viewvetsrecords($b_id)
	{
	$query=$this->db->query("select * from message WHERE b_id='$b_id'");
	return $query->result();
	}
	
	function viewtrnrecords($b_id)
	{
	$query=$this->db->query("select * from message WHERE b_id='$b_id'");
	return $query->result();
	}
	
	function viewvetmsgrecords($b_id)
	{
	$query=$this->db->query("select * from message WHERE b_id='$b_id' and v_id>=1");
	return $query->result();
	}
	
	function viewtrnmsgrecords($b_id)
	{
	$query=$this->db->query("select * from message WHERE b_id='$b_id' and u_id>=1");
	return $query->result();
	}
	
	
	function viewvmsgrecords($b_id,$v_id)
	{
	$query=$this->db->query("select * from message where b_id='".$b_id."'");
	return $query->result();
	}
	
	/*function addmsg($msg,$v_id,$b_id)
	{
		$query="insert into message(mes_id,b_id,b_id,v_id,t_id,message)VALUES('','0','$b_id','$v_id','0','$msg')";
		
		$this->db->query($query);
	}*/
}
?>