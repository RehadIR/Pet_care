<?php
class Login_Model extends CI_Model 
{
	
	function insert_details($name,$gender,$email,$mobile,$address,$username,$password)
	{
		$qry="insert into user(u_id,name,gender,email,contactno,address,username,password)values('','$name','$gender','$email','$mobile','$address','$username','$password')";
		$this->db->query($qry);
	}
	
	function insert_bddetails($name,$gender,$email,$mobile,$address,$username,$password)
	{
		$qry="insert into boarding(bd_id,name,gender,email,contactno,address,username,password)values('','$name','$gender','$email','$mobile','$address','$username','$password')";
		$this->db->query($qry);
	}
	
	function insert_tdetails($name,$gender,$email,$mobile,$address,$username,$password)
	{
		$qry="insert into trainer(t_id,name,gender,email,contactno,address,username,password)values('','$name','$gender','$email','$mobile','$address','$username','$password')";
		$this->db->query($qry);
	}
	
    function insert_vdetails($name,$gender,$email,$mobile,$address,$username,$password)
	{
		$qry="insert into vet(v_id,name,gender,email,contactno,address,username,password)values('','$name','$gender','$email','$mobile','$address','$username','$password')";
		$this->db->query($qry);
	}
	
	function insert_bdetails($name,$gender,$email,$mobile,$address,$username,$password)
	{
		$qry="insert into breeder(b_id,name,gender,email,contactno,address,username,password)values('','$name','$gender','$email','$mobile','$address','$username','$password')";
		$this->db->query($qry);
	}
	

    function dcheck($status,$user,$pass)
	{
		$query=$this->db->query("select * from driver where username='".$user."' and password='".$pass."' and status='".$status."'");
		return $row = $query->num_rows();
		return $query->result();
	}
	
	function check($status,$user,$pass)
	{
		$query=$this->db->query("select * from user where username='".$user."' and password='".$pass."' and status='".$status."'");
		return $row = $query->num_rows();
		return $query->result();
	}
	
	function bdcheck($status,$user,$pass)
	{
		$query=$this->db->query("select * from boarding where username='".$user."' and password='".$pass."' and status='".$status."'");
		return $row = $query->num_rows();
		return $query->result();
	}
	
	function tcheck($status,$user,$pass)
	{
		$query=$this->db->query("select * from trainer where username='".$user."' and password='".$pass."' and status='".$status."'");
		return $row = $query->num_rows();
		return $query->result();
	}
	
	function vcheck($status,$user,$pass)
	{
		$query=$this->db->query("select * from vet where username='".$user."' and password='".$pass."' and status='".$status."'");
		return $row = $query->num_rows();
		return $query->result();
	}
	
	function bcheck($status,$user,$pass)
	{
		$query=$this->db->query("select * from breeder where username='".$user."' and password='".$pass."' and status='".$status."'");
		return $row = $query->num_rows();
		return $query->result();
	}
	

	
	
}
?>