<?php
class User_Model extends CI_Model 
{
     function viewbrecords($user)
	{
	$query=$this->db->query("select * from user WHERE username='$user'");
	return $query->result();
	}

 	function viewpetrecords()
	{
	$query=$this->db->query("select * from pet");
	return $query->result();
	}
	function  viewpetvideo()
	{
	$p_id=$this->input->get('p_id');
	$query=$this->db->query("select * from pet where p_id='$p_id' ");
	return $query->result();
	}
	function viewpetidrecords($p_id)
	{
	$query=$this->db->query("select * from pet where p_id='$p_id'");
	return $query->result();
	}
	
	function viewpurchaserecords($u_id)
	{
	$query=$this->db->query("select * from request where b_id='".$u_id."'");
	return $query->result();
	}
	
	function viewpurhisrecords($u_id)
	{
	$query=$this->db->query("select * from request where u_id='".$u_id."'");
	return $query->result();
	}
	function viewcert($u_id,$p_id)
	{
	$reqst=$this->input->get('req_id');
	$query=$this->db->query("select * from pet where  p_id='".$p_id."' and request=".$reqst."");
	return $query->result();
	}
	function viewpurhissrecords($u_id,$req_id)
	{
	$query=$this->db->query("select * from request where u_id='".$u_id."' and req_id='$req_id'");
	return $query->result();
	}
	
	function viewpurassignrecords($u_id,$req_id)
	{
	$query=$this->db->query("select * from assign where u_id='".$u_id."' and req_id='$req_id'");
	return $query->result();
	}
	
	function deletepurrecords($req_id)
	{
		$this->db->query("delete from request where req_id='".$req_id."'");
	}
	
    function viewmsgrecords($u_id)
	{
	$query=$this->db->query("select * from message where u_id='".$u_id."'");
	return $query->result();
	}
	
	function addreply($reply,$mes_id)
	{
		$query="UPDATE message SET reply='$reply' WHERE mes_id='".$mes_id."'";
		
		$this->db->query($query);
	}
	
	function addrequest($p_id,$b_id,$u_id,$quantity,$price,$address)
	{
		//$dates=date("d/m/Y");
		$del=$price*2/100;
		$amt=$quantity*$price;
		$total=$del+$amt;
		$query="insert into request(req_id,u_id,b_id,p_id,quantity,price,del_fee,total,address)values('','$u_id','$b_id','$p_id','$quantity','$price','$del','$total','$address')";
		
		$this->db->query($query);
	}
	
	function viewproductrecords()
	{
	$query=$this->db->query("select * from product");
	return $query->result();
	}
	function addfeed($feed,$u_id)
	{
	$query="insert into feedback(u_id,feedback)values('$u_id','$feed')";
	$this->db->query($query);
	}
	function viewfeed($u_id)
	{
	$query=$this->db->query("select * from feedback where u_id='$u_id'");
	return $query->result();
	}
	function viewpcattrecords()
	{
	$query=$this->db->query("select * from category where status=1");
	return $query->result();
	}
	
	function checkcart($u_id,$pdct_id)
	{
	$query=$this->db->query("select * from cart where u_id='$u_id' and pdct_id='$pdct_id' and status='0'");
	return $query->result();
	}
	
	function addtocart($u_id,$pdct_id,$p)
	{
		$query="insert into cart(cart_id,u_id,b_id,pdct_id,quantity,amount,status)values('','$u_id','','$pdct_id','1','$p','0')";
		
		$this->db->query($query);
	}
	
	function updatetocart($u_id,$pdct_id,$amt,$newqty)
	{
	
		$query="UPDATE cart SET quantity='$newqty',amount='$amt' where u_id='$u_id' and pdct_id='$pdct_id'";
		
		$this->db->query($query);
	}
	
	function checkcartrecords($u_id)
	{
	$query=$this->db->query("select group_concat(cart_id) as cart_id from cart WHERE `u_id`='$u_id' and status=0");
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
	
	function addtopurchase($cart_id,$u_id,$amt,$billing_add,$ddate)
	{
		$query="insert into product_purchase(p_id,cart_id,u_id,b_id,price,mode_of,billing_add,ddate,status)values('','$cart_id','$u_id','','$amt','card','$billing_add','$ddate','1')";
		
		$this->db->query($query);
	}
	
	function updatemycart($cart_id,$u_id)
	{
	
		$query="update cart SET `status`='1' where status='0' and `u_id`='$u_id'";
		
		$this->db->query($query);
	}
	
	function viewpayhisrecords($u_id)
	{
	$query=$this->db->query("select * from product_purchase where u_id='".$u_id."'");
	return $query->result();
	}
	
	function viewcartrecords($u_id)
	{
	$query=$this->db->query("select * from cart  WHERE u_id='".$u_id."' and status='0'");
	return $row = $query->num_rows();
	return $query->result();
	}

    function deletecartrecords($u_id,$pdct_id)
	{
		$this->db->query("delete from cart where pdct_id='$pdct_id' and u_id='$u_id'");
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
	
	function addmsg($v_id,$u_id,$message)
	{
	$query="insert into message(mes_id,u_id,v_id,message)values('','$u_id','$v_id','$message')";
	$this->db->query($query);
	}
	
	function viewtrecords()
	{
	$query=$this->db->query("select * from breeder where status=1");
	return $query->result();
	}
	
	function viewtidrecords($t_id)
	{
	$query=$this->db->query("select * from breeder where b_id='$t_id'");
	return $query->result();
	}
	
	function addtmsg($t_id,$u_id,$message)
	{
	echo $query="insert into message(mes_id,u_id,b_id,message)values('','$u_id','$t_id','$message')";
	$this->db->query($query);
	}
	
	function viewbdrecords()
	{
	$query=$this->db->query("select * from boarding where status=1");
	return $query->result();
	}
	function viewbdidrecords($bd_id)
	{
	$query=$this->db->query("select * from boarding where bd_id='$bd_id'");
	return $query->result();
	}
	function addbdmsg($bd_id,$u_id,$message)
	{
	$query="insert into message(mes_id,u_id,bd_id,message)values('','$u_id','$bd_id','$message')";
	$this->db->query($query);
	}
	
	function viewvetmsgrecords($u_id)
	{
	$query=$this->db->query("select * from message WHERE u_id='$u_id' and v_id >=1");
	return $query->result();
	}
	
	function viewtrnmsgrecords($u_id)
	{
	$query=$this->db->query("select * from message WHERE u_id='$u_id' and b_id >=1");
	return $query->result();
	}
	
	function viewbrdmsgrecords($u_id)
	{
	$query=$this->db->query("select * from message WHERE u_id='$u_id' and bd_id>=1");
	return $query->result();
	}
	function checkpetrecords($u_id)
	{
		$req_id=$this->input->get('req_id');
	$query=$this->db->query("select * from request WHERE `u_id`='$u_id' and status=1 and `req_id`='$req_id'");
	return $query->result();
	}
	function addtopetpurchase($req_id,$u_id,$amt,$billing_add,$ddate,$adm_amount)
	{
		$adm=$amt*1/100;
		$tt=$adm+$adm_amount;
		$query="insert into pet_purchase(p_id,req_id,b_id,u_id,amount,adm_amt,mode_of,billing_add,date,status)values('','$req_id','','$u_id','$amt','$adm','card','$billing_add','$ddate','1')";
		
		$this->db->query($query);
		
		$query="update admin SET `amount`='$tt' ";
		
		$this->db->query($query);
	}
	function updaterequest($req_id,$u_id,$assgn_date)
	{
	
		$query="update request SET `flag`='1',`assgn_date`='$assgn_date' where status='1' and `u_id`='$u_id'and `req_id`='$req_id'";
		
		$this->db->query($query);
	}
	function viewpayhisprecords($u_id)
	{
	$query=$this->db->query("select * from pet_purchase where u_id='".$u_id."'");
	return $query->result();
	}
}
?>