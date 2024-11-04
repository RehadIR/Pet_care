<?php
include "include/conn.php";

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
				header("location:products.php");
				}
				else
				{
				header("location:products.php");
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
			header("location:products.php");
			}
			else
			{
			header("location:products.php");
			}
	}
	
/*if(mysql_affected_rows()>0)
{
header("location:products.php");
}
else
{
header("location:products.php");
}
*/
?>