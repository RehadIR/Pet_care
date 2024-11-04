
  <?php include "include/header.php";?>
  <!-- Navbar -->
  <?php include "include/navbar.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  
  <!-- Aside -->
  <?php include "include/aside.php";?>
  <!-- Aside -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
          <!-- connect -->
  <?php include "include/conn.php";?>
  <!-- connect -->
  <style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
    <!-- Main content -->
    
   <section class="content">


     <div class="card">
        <div class="card-header">
         <h3 class="card-title"><?php /*?><a href="<?php echo base_url(); ?>index.php/admin/addproduct"><input type="submit" value="Add Product" class="btn btn-success float-right"></a><?php */$b_id = $this->session->userdata('b_id');?></h3>
             <!-- Cart -->
								
								<!-- /Cart -->

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
      <?php 
				  /*$i=1;
				  foreach($data as $row)
				  {*/ ?>  
      <table id="cart" class="table table-hover table-condensed" >
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:7%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
                    
                           <?php
                            $query="select * from cart where status=0 and b_id='$b_id'";
                            $res=mysql_query($query);
                            //$row=mysql_fetch_assoc($res);
                            $counter = 0;
                            while($row=mysql_fetch_array($res)){
							
							$pdct_id = $row['pdct_id'];
								$query2="select * from product where pdct_id='$pdct_id'";
								$res2=mysql_query($query2);
								//$row=mysql_fetch_assoc($res);
								$counter = 0;
								$row2=mysql_fetch_array($res2);
							?>  
						<tr>
							<td data-th="Product">
								<div class="row">
								
									<div class="col-sm-4 "><img src="<?php echo base_url(); ?>assets_admin/images/<?php echo $row2['p_img'];  ?>" style="height: 70px;width:75px;">
									<h4 class="nomargin product-name header-cart-item-name"><a href="#">
									<?php echo $row2['p_name'];  ?></a></h4>
									</div>
									<div class="col-sm-6">
										<div style="max-width=50px;">
										<p><?php echo $row2['descp'];  ?></p>
										</div>
									</div>
									
									
								</div>
							</td>
                            <!--<input type="hidden" name="product_id[]" value="11">
				            <input type="hidden" name="" value="63">-->
                             
							<td data-th="Price"><input type="text" class="form-control price" value="<?php echo $row2['price']; ?>" name="price" readonly="readonly"></td>
							<td data-th="Quantity">
								<input type="text" class="form-control qty" value="<?php echo $row['quantity']; ?>" name="quantity" id="quantity" onchange="this.form.submit()"disabled>
    <script>
   /* function myName() {
        //alert('Hello ' + val);
		 var quantity = document.getElementById("quantity").value;
		 //alert(quantity);
		 //document.getElementById("test").innerHTML = quantity;
		 document.getElementById("result").value = quantity;
		
    }*/
</script>                            
                                <input type="hidden" name="pdct_id" value="<?php echo $row['pdct_id']; ?>">
                                 <input type="hidden" name="u_id" value="<?php echo $b_id; ?>">
                                 <input type="hidden" name="result" value="" id="result" />
                          
                              
                                 <?php
 if(isset($_GET["quantity"])){
       $quantity=$_GET["quantity"];
       //echo "select quantity is => ".$quantity;
   }
?>
							</td>
							<td data-th="Subtotal" class="text-center"><input type="text" class="form-control total" value="<?php echo $row['amount']; ?>" readonly="readonly"></td>
							<td class="actions" data-th="">
							<div class="btn-group">
								<!--<a href="" class="btn btn-info btn-sm update" onClick="return confirm('Are you sure you want to edit?')" update_id="11"><i class="fa fa-refresh"></i></a>-->
                            <!--   <button type="submit" class="btn btn-info btn-sm update" onClick="return confirm('Are you sure you want to update products?')" ><i class="fa fa-refresh"></i></button>--> &nbsp;&nbsp;&nbsp;&nbsp;
                                           

								<!--<a href="cart_edit.php?pdct_id=<?php echo $row['pdct_id']; ?>&u_id=<?php echo $u_id; ?>&quantity=<?php echo $quantity; ?>&price=<?php echo $row2['price']; ?>" class="btn btn-info btn-sm update" remove_id="11"><i class="fa fa-refresh"></i></a>-->	
								<a href="cart_delete?pdct_id=<?php echo $row['pdct_id']; ?>&b_id=<?php echo $b_id; ?>" class="btn btn-danger btn-sm remove" onClick="return confirm('Are you sure you want to delete products?')"><i class="fa fa-trash-o"></i></a>		
							</div>							
							</td>
						</tr>

                            <?php } ?>
                            </tbody>
				<tfoot>
					
					<tr>
						<td><a href="product" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
						<td colspan="2" class="hidden-xs"></td>
						<td class="hidden-xs text-center"><b class="net_total">Total :  <i class="fa fa-inr"></i> <?php
										 $qy="SELECT SUM(amount) AS TotalAmt FROM cart WHERE `b_id`='$b_id' and status='0'";
										 $rss=mysql_query($qy);
										 $rww=mysql_fetch_array($rss);
										 echo $total=$rww['TotalAmt'];
										?></b></td>
						
                        <td>
					<input type="hidden" name="total" value="<?php echo $total; ?>" id="total" />
									<a href="checkout?b_id=<?php echo $b_id; ?>&total=<?php echo $total; ?>" class="btn btn-success" onClick="return confirm('Are you sure you want to proceed?')"><i class="fa fa-trash-o"></i>Ready to Checkout</a>
									</form></td>
									
									</tr>
									
									</tfoot>
									
							</table >
<?php
                 /* $i++;
				  }*/
				 ?>


     </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
  <!-- Modal Section Start -->    
 <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog"> 
                  <div class="modal-content"> 
                  
                       <div class="modal-header"> 
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            <h4 class="modal-title">
                            	<i class="fa fa-product-hunt"></i> Product Details
                            </h4> 
                       </div> 
                       <div class="modal-body"> 
                       
                       	   <div id="modal-loader" style="display: none; text-align: center;">
                       	   </div>
                            
                           <div id="dynamic-content"></div>
                             
                        </div> 
                        <div class="modal-footer"> 
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                        </div> 
                        
                 </div> 
              </div>
            </div>
<!-- Modal Section End -->

<script>
$(document).ready(function(){
	
	$(document).on('click', '#viewUser', function(e){
		
		e.preventDefault();
		
		var pdct_id = $(this).data('id');   // it will get id of clicked row
		//alert(pdct_id);
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: 'p_load.php',
			type: 'POST',
			data: 'id='+pdct_id,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data); // load response 
			$('#modal-loader').hide();		  // hide ajax loader	
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});
		
	});
	
});

</script>
     <!-- Footer -->
    <?php include "include/footer.php";?>
    <!-- /.footer -->

<!-- ./wrapper -->