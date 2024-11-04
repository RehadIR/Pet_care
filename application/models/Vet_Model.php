<?php
class Vet_Model extends CI_Model 
{
     function viewvrecords($user)
	{
	$query=$this->db->query("select * from vet WHERE username='$user'");
	return $query->result();
	}

    function viewmsgrecords($v_id)
	{
	$query=$this->db->query("select * from message where v_id='".$v_id."' and u_id>=1");
	return $query->result();
	}
	function viewcertreq($v_id)
	{
	$query=$this->db->query("select * from pet where request=1");
	return $query->result();
	}
	function addcertapp($v_id,$date,$p_id,$price,$fees)
	{
	$p_id=$this->input->get('p_id');
	$fe=$price*2/100;
	$fee=$fe+$fees;
	$query="UPDATE vet SET fees='$fee' where v_id='".$v_id."'";
		
	$this->db->query($query);
	$date=date("d/m/Y");
	$query="UPDATE pet SET `cert_date`='$date', `request`=2 where p_id='".$p_id."'";
	####
	$this->db->query($query);
	}
   function viewbmsgrecords($v_id)
	{
	$query=$this->db->query("select * from message where v_id='".$v_id."' and b_id>=1");
	return $query->result();
	}
	function pet_Certdet($v_id)
	{
		$p_id=$this->input->get('p_id');
		$query=$this->db->query("select * from pet where request=1 and p_id='".$p_id."' ");
	return $query->result();
	}
	function viewmsgidrecords($mes_id)
	{
	$query=$this->db->query("select * from message where mes_id='".$mes_id."'");
	return $query->result();
	}
	
	function addreply($reply,$mes_id)
	{
		$query="UPDATE message SET reply='$reply' WHERE mes_id='".$mes_id."'";
		
		$this->db->query($query);
	}
}
?>