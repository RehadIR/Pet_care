 <?php
						   include "include/conn.php";
						   if (isset($_REQUEST['id'])) 
						   {
						  $id = $_REQUEST['id'];
						  $sql="select * from product WHERE pdct_id='$id'";
						  $res=mysql_query($sql);
						  $row1=mysql_fetch_array($res);
									
						?>

 <div class="table-responsive">

     <table width="852" class="table table-striped table-bordered">
         <tr>
           <th colspan="2"><div align="right"><img src="<?php echo $row1['p_img']; ?>" title="<?php echo $row1['p_name']; ?>" alt="<?php echo $row1['p_name']; ?>" width="200px" height="200px"/></div></th>
         </tr>
         <tr>
             <th width="344"> <div align="left">Category</div></th>
       	   <td width="444"><?php $cat_id = $row1['cat_id'];
								$query2="select * from category where cat_id='$cat_id'";
								$res2=mysql_query($query2);
								//$row=mysql_fetch_assoc($res);
								$counter = 0;
								$row2=mysql_fetch_array($res2);
								echo $row2['cat_name'];
								?></td>
         </tr>
         <tr>
           <th><div align="left">Product Name</div></th>
           <td><?php echo $row1['p_name']; ?></td>
         </tr>
          <tr>
           <th><div align="left">Product Details</div></th>
           <td><?php echo $row1['descp']; ?></td>
         </tr>
         <tr>
           <th><div align="left">Price</div></th>
           <td><?php echo $row1['price']; ?></td>
         </tr>
       </table>
   
 </div>
   
 <?php    
}
?>