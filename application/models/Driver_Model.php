<?php
class Driver_Model extends CI_Model 
{
     function viewdrecords($user)
	{
	$query=$this->db->query("select * from driver WHERE username='$user'");
	return $query->result();
	}

	function viewassignrecords($d_id)
	{
	$query=$this->db->query("select * from assign where d_id='$d_id'");
	return $query->result();
	}
	function viewassignrecordss($d_id,$req_id)
	{
	$query=$this->db->query("select * from assign where d_id='$d_id'and req_id='$req_id'");
	return $query->result();
	}
	function viewloc($ass_id,$d_id)
	{
	$query=$this->db->query("select * from assign WHERE ass_id='".$ass_id."' and d_id='$d_id'");
	return $query->result();
	}
	
	function updateloc($ass_id,$d_id,$location,$st,$price,$amount,$b_id,$req_id)
	{ $dd=date("Y-m-d h:i:s");
		$this->db->query("UPDATE assign SET location='$location',del_date='$dd',status='$st' WHERE ass_id='".$ass_id."'");
		if($st==2)
		{
		echo $total=$price+$amount;
		$this->db->query("UPDATE breeder SET account='".$total."' WHERE b_id='".$b_id."'");
		$this->db->query("UPDATE request SET status='3' WHERE req_id='".$req_id."'");
		}
	}
	
	function unapprovereq($ass_id)
	{
		$this->db->query("UPDATE assign SET status=0 WHERE ass_id='".$ass_id."'");
	}
	
	function approvereq($ass_id,$req_id,$d_id)
	{
	$fee=$this->input->get('del_fee');
	$this->db->query("UPDATE driver SET charge='".$fee."' WHERE d_id='".$d_id."'");
		$this->db->query("UPDATE assign SET status=1 WHERE ass_id='".$ass_id."'");
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