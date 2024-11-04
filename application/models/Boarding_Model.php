<?php
class Boarding_Model extends CI_Model 
{
     function viewbdrecords($user)
	{
	$query=$this->db->query("select * from boarding WHERE username='$user'");
	return $query->result();
	}

    function viewmsgrecords($bd_id)
	{
	$query=$this->db->query("select * from message where bd_id='".$bd_id."'");
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