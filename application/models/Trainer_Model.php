<?php
class Trainer_Model extends CI_Model 
{
     function viewtrecords($user)
	{
	$query=$this->db->query("select * from trainer WHERE username='$user'");
	return $query->result();
	}

    function viewmsgrecords($t_id)
	{
	$query=$this->db->query("select * from message where t_id='".$t_id."'  and u_id>=1");
	return $query->result();
	}
	
	function viewbmsgrecords($t_id)
	{
	$query=$this->db->query("select * from message where t_id='".$t_id."'  and b_id>=1");
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
	
	function viewtrnrecords($u_id)
	{
	$query=$this->db->query("select * from training where u_id='".$u_id."'");
	return $query->result();
	}
}
?>