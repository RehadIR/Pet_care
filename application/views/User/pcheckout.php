
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
            <h1 class="m-0 text-dark">Checkout Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Checkout</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
   <section class="content">

      <!-- Default box -->
      <div class="container-fluid">
<div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add Payment</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="container-fluid">
		<div class="row-checkout">
		<?php $u_id = $this->session->userdata('u_id');
		if(isset($u_id)){
		
			$sql = "SELECT * FROM user WHERE u_id='$u_id'";
			$query=mysql_query($sql);
			//$query = mysql_query($con,$sql);
			$row=@mysql_fetch_array($query);
		?>
		
			<div class="col-md-12">
				<div class="container-checkout">
                 <?php 
				  $i=1;
				  foreach($data as $row)
				  { 
				  $date=$row->ddate;
					  $date_plus = date('Y-m-d', strtotime($date.'+5 days'));
						//echo $date.'<br>'.$date_plus;
				  $price=$row->price;
				 $total=$price;?> 
                   <div class="error_msg" style="color:#003300;"> <?php echo validation_errors();?></div> 
   										 <?php echo isset($error) ? $error : ''; ?> 
				<form id="checkout_form" action="<?php echo site_url('User/pet_checkout'); ?>" method="POST" class="was-validated">

					<div class="row-checkout">
					
					<div class="col-md-12" style="padding: 0 25px;">
						<h3>Billing Address</h3>
						<label for="fname"><i class="fa fa-user" ></i> Full Name</label>
						<input type="text" id="fname" class="form-control" name="firstname" pattern="^[a-zA-Z ]+$"  value="">
						<label for="email"><i class="fa fa-envelope"></i> Email</label>
						<input type="text" id="email" name="email" class="form-control" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$" value="" required>
						<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
						<input type="text" id="adr" name="address" class="form-control" value="" required>
						<label for="city"><i class="fa fa-institution"></i> City</label>
						<input type="text" id="city" name="city" class="form-control" value="" pattern="^[a-zA-Z ]+$" required>
						<input type="hidden" name="assgn_date" value="<?php echo "$date_plus";?>">
						<div class="row">
						<div class="col-md-6">
							<label for="state">State</label>
							<input type="text" id="state" name="state" class="form-control" pattern="^[a-zA-Z ]+$" required>
						</div>
						<div class="col-md-4">
							<label for="zip">Zip</label>
							<input type="text" id="zip" name="zip" class="form-control" pattern="^[0-9]{6}(?:-[0-9]{4})?$" required>
						</div>
						</div>
					</div>
                    
					<div style="clear:both;"></div>
					
					<div class="col-md-12">
						<h3>Payment</h3>
						<!--<label for="fname">Accepted Cards</label>
						<div class="icon-container">
						<i class="fa fa-cc-visa" style="color:navy;"></i>
						<i class="fa fa-cc-amex" style="color:blue;"></i>
						<i class="fa fa-cc-mastercard" style="color:red;"></i>
						<i class="fa fa-cc-discover" style="color:orange;"></i>
						</div>-->
						<div class="row">
							<div class="col-md-6">
								<label for="state">Pet Price</label>
								<input type="text" id="state" name="price" class="form-control" value="<?php echo $row->price;?>" readonly>
							</div>
							<div class="col-md-6">
								<label for="zip">Quantity</label>
								<input type="text" id="zip" name="quantity" class="form-control" value="<?php echo $row->quantity;?>" readonly>
							</div>
							<label for="cname">Delivery Charge</label>
							<input type="text" id="amt" name="amt" class="form-control" value="<?php echo $row->del_fee;?>" readonly>
							<label for="cname">Total Amount</label>
							<input type="text" id="amt" name="amt" class="form-control" value="<?php echo $row->total;?>" readonly>
							
							<label for="cname">Name on Card</label>
							<input type="text" id="cname" name="cardname" class="form-control" pattern="^[a-zA-Z ]+$" required>
							
							<div class="form-group" id="card-number-field">
							<label for="cardNumber">Card Number</label>
							<input type="text" class="form-control" id="cardNumber" name="cardNumber" required>
						</div>
						<label for="expdate">Exp Date</label>
						<input type="text" id="expdate" name="expdate" class="form-control" pattern="^((0[1-9])|(1[0-2]))\/(\d{2})$" placeholder="12/22"required>
					<div class="row">
						
						<div class="col-md-4">
							<div class="form-group CVV">
								<label for="cvv">CVV</label>
								<input type="password" class="form-control" name="cvv" id="cvv" required>
						</div>
						</div>	
					</div>
						
                        
						
					</div>
					</div>
					</div>
					<label><input type="CHECKBOX" name="q" class="roomselect" value="conform" required> Shipping address same as billing
                    <input type="hidden" name="req_id" value="<?php echo $row->req_id; ?>">
					</label>
					
                
				<input type="hidden" name="total_count" value="'.$total_count.'">
					<input type="hidden" name="total_price" value="'.$total.'">
					
					<input type="submit" id="submit" value="Continue to checkout" class="checkout-btn">
				</form>
                <?php
                 /* $i++;*/
				  }
				 ?>

				</div>
			</div>
			<?php 
		}else{
			echo"<script>window.location.href = 'cart.php'</script>";
		}
		?>

			<div class="col-25">
				<div class="container-checkout">
				
				<hr>
				
				<!--<h3>Total<span class='price' style='color:black'>-->
                <b></b></span></h3>
					
				
				</div>
			</div>
		</div>
	</div>
          <!-- /.card-body -->

        </div>
</div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
  
     <!-- Footer -->
    <?php include "include/footer.php";?>
    <!-- /.footer -->

<!-- ./wrapper -->