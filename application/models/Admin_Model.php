<?php
class Admin_Model extends CI_Model 
{
	function check($user,$p)
	{
	$query=$this->db->query("select * from admin where username='".$user."' and password='$p'");
	return $row=$query->num_rows();
	return $query->result();
	}
	function viewbrecords()
	{
	$query=$this->db->query("select * from breeder");
	return $query->result();
	}
	
	function unapprovebrecords($b_id)
	{
		$this->db->query("UPDATE breeder SET status=0 WHERE b_id='".$b_id."'");
	}
	
	function approvebrecords($b_id)
	{
		$this->db->query("UPDATE breeder SET status=1 WHERE b_id='".$b_id."'");
	}
	
	function viewvrecords()
	{
	$query=$this->db->query("select * from vet");
	return $query->result();
	}
	function viewevet($v_id)
	{
	$query=$this->db->query("select * from vet WHERE v_id='".$v_id."'");
	return $query->result();
	}
	function update_vet($v_id,$name,$gender,$email,$contactno,$address,$username,$password)
	{
		//echo "UPDATE `driver` SET name='$name',gender='$gender',email='$email',contactno='$contactno',address='$address',place='$place'
		//,username='$username',password='$password' WHERE d_id='".$d_id."'";
		$query=$this->db->query("update `vet` SET name='$name',gender='$gender',email='$email',contactno='$contactno',address='$address'
		,username='$username',password='$password' where v_id='".$v_id."'");
		echo $query;
		
	}
	function deletevet($v_id)
	{
		$this->db->query("DELETE FROM `vet` WHERE v_id='".$v_id."'");
	}

	function unapprovevrecords($v_id)
	{
		$this->db->query("UPDATE vet SET status=0 WHERE v_id='".$v_id."'");
	}
	
	function approvevrecords($v_id)
	{
		$this->db->query("UPDATE vet SET status=1 WHERE v_id='".$v_id."'");
	}
	
	function viewtrecords()
	{
	$query=$this->db->query("select * from trainer");
	return $query->result();
	}
	
	function unapprovetrecords($t_id)
	{
		$this->db->query("UPDATE trainer SET status=0 WHERE t_id='".$t_id."'");
	}
	
	function approvetrecords($t_id)
	{
		$this->db->query("UPDATE trainer SET status=1 WHERE t_id='".$t_id."'");
	}
	
	function viewurecords()
	{
	$query=$this->db->query("select * from user");
	return $query->result();
	}
	
	function unapproverecords($u_id)
	{
		$this->db->query("UPDATE user SET status=0 WHERE u_id='".$u_id."'");
	}
	 function viewddrecords()
	{
		$query=$this->db->query("select * from driver");
		return $query->result();
	}
	function viewedrecords($d_id)
	{
	$query=$this->db->query("select * from driver  WHERE d_id='".$d_id."'");
		return $query->result();
	}
	function add_driver($name,$gender,$email,$contactno,$address,$place,$username,$password)
	{
		$qry="insert into driver (d_id,b_id,name,gender,email,contactno,address,place,username,password)values('','','$name','$gender','$email','$contactno','$address','$place','$username','$password')";
		$this->db->query($qry);
	}
	function update_driver($d_id,$name,$gender,$email,$contactno,$address,$place,$username,$password)
	{
		//echo "UPDATE `driver` SET name='$name',gender='$gender',email='$email',contactno='$contactno',address='$address',place='$place'
		//,username='$username',password='$password' WHERE d_id='".$d_id."'";
		$query=$this->db->query("update `driver` SET name='$name',gender='$gender',email='$email',contactno='$contactno',address='$address',place='$place'
		,username='$username',password='$password' where d_id='".$d_id."'");
		echo $query;
		
	}
	function deletedrdata($d_id)
	{
		$this->db->query("DELETE FROM `driver` WHERE d_id='".$d_id."'");
	}

	function approverecords($u_id)
	{
		$this->db->query("UPDATE user SET status=1 WHERE u_id='".$u_id."'");
	}
	
	function viewbdrecords()
	{
	$query=$this->db->query("select * from boarding");
	return $query->result();
	}
	
	function unapprovebdrecords($bd_id)
	{
		$this->db->query("UPDATE boarding SET status=0 WHERE bd_id='".$bd_id."'");
	}
	
	function approvebdrecords($bd_id)
	{
		$this->db->query("UPDATE boarding SET status=1 WHERE bd_id='".$bd_id."'");
	}
	
	function viewdrecords()
	{
	$query=$this->db->query("select * from driver");
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

/***************************************************************************************/

	function viewcatrecords()
	{
	$query=$this->db->query("select * from category");
	return $query->result();
	}
	
	function addcat($cat_name)
	{
		$query="insert into category(cat_id,cat_name)values('','$cat_name')";
		
		$this->db->query($query);
	}
	
	function unapprove($cat_id)
	{
		$this->db->query("UPDATE category SET status=0 WHERE cat_id='".$cat_id."'");
	}
	
	function approve($cat_id)
	{
		$this->db->query("UPDATE category SET status=1 WHERE cat_id='".$cat_id."'");
	}
	
	function displayrecordsById($cat_id)
	{
	$query=$this->db->query("select * from category where cat_id='".$cat_id."'");
	return $query->result();
	}
	
	function updaterecords($cat_name,$cat_id)
	{
	$query=$this->db->query("update category SET cat_name='$cat_name' where cat_id='".$cat_id."'");
	}
	
	function deleterecords($cat_id)
	{
		$this->db->query("delete from category where cat_id='".$cat_id."'");
	}
	
/***************************************************************************************/
	
	function viewpcatrecords()
	{
	$query=$this->db->query("select * from pet_category");
	return $query->result();
	}
	
	function addpcat($cat_name)
	{
		$query="insert into pet_category(pcat_id,pcat_name)values('','$cat_name')";
		
		$this->db->query($query);
	}
	
	function unapprovepcat($pcat_id)
	{
		$this->db->query("UPDATE pet_category SET status=0 WHERE pcat_id='".$pcat_id."'");
	}
	
	function approvepcat($pcat_id)
	{
		$this->db->query("UPDATE pet_category SET status=1 WHERE pcat_id='".$pcat_id."'");
	}
	
	function displayrecordspById($pcat_id)
	{
	$query=$this->db->query("select * from pet_category where pcat_id='".$pcat_id."'");
	return $query->result();
	}
	
	function updateprecords($pcat_name,$pcat_id)
	{
	$query=$this->db->query("update pet_category SET pcat_name='$pcat_name' where pcat_id='".$pcat_id."'");
	}
	
	function deleteprecords($pcat_id)
	{
		$this->db->query("delete from pet_category where pcat_id='".$pcat_id."'");
	}
	
/***************************************************************************************/
	
	function viewpetrecords()
	{
	$query=$this->db->query("select * from pet");
	return $query->result();
	}
	
	function unapprovepet($p_id)
	{
		$this->db->query("UPDATE pet SET status=0 WHERE p_id='".$p_id."'");
	}
	
	function approvepet($p_id)
	{
		$this->db->query("UPDATE pet SET status=1 WHERE p_id='".$p_id."'");
	}
	
/***************************************************************************************/
	
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
	
	function addproduct($cat_id,$p_name,$price,$quantity,$descp,$pic)
	{
		$query="insert into product(pdct_id,cat_id,p_name,price,quantity,descp,p_img,status)values('','$cat_id','$p_name','$price','$quantity','$descp','$pic','1')";
		
		$this->db->query($query);
	}
	
	function unapprovepdct($pdct_id)
	{
		$this->db->query("UPDATE product SET status=0 WHERE pdct_id='".$pdct_id."'");
	}
	
	function approvepdct($pdct_id)
	{
		$this->db->query("UPDATE product SET status=1 WHERE pdct_id='".$pdct_id."'");
	}
	
	function displayrecordspdctById($pdct_id)
	{
	$query=$this->db->query("select * from product where pdct_id='".$pdct_id."'");
	return $query->result();
	}
	
	function updatepdctrecords($cat_id,$p_name,$price,$quantity,$descp,$pdct_id)
	{
	$query=$this->db->query("update product SET cat_id='$cat_id',p_name='$p_name',price='$price',quantity='$quantity',descp='$descp' where pdct_id='".$pdct_id."'");
	}
	
	function deletepdctrecords($pdct_id)
	{
		$this->db->query("delete from product where pdct_id='".$pdct_id."'");
	}
/***************************************************************************************/
	
	function viewnotify()
	{
	$query=$this->db->query("select * from garbage_deposit");
	return $query->result();
	}
	
	function viewreport()
	{
	$query=$this->db->query("select * from garbage_deposit");
	return $query->result();
	}
	
	function viewcomplaint()
	{
	$query=$this->db->query("select * from complaint");
	return $query->result();
	}
	
	function displayrecordsByyId($comp_id)
	{
	$query=$this->db->query("select * from complaint where comp_id='".$comp_id."'");
	return $query->result();
	}
	
	function updaterecordss($reply,$comp_id)
	{
	$query=$this->db->query("update complaint SET reply='$reply',status=1 where comp_id='".$comp_id."'");
	}
	
	function viewagrecords()
	{
	$query=$this->db->query("select * from agency");
	return $query->result();
	}
	
	
	
	
	function viewmessage()
	{
	$query=$this->db->query("select * from message");
	return $query->result();
	}
	
	function viewcert()
	{
	$query=$this->db->query("select * from pet where request=2");
	return $query->result();
	}
	function view_cert($p_id)
	{
	$query=$this->db->query("select * from pet where p_id='".$p_id."'");
	return $query->result();
	}
	function view_feedbacks()
	{
	$query=$this->db->query("select * from  `feedback`");
	return $query->result();
	}
	
}
?>