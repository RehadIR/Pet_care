<style>
  div.gallery img {
  width: fit-content !important;
  height: 200px !important;
  
}

div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 240px  !important;
text-align: center  !important;
}

</style>
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
         <h3 class="card-title"><?php /*?><a href="<?php echo base_url(); ?>index.php/admin/addproduct"><input type="submit" value="Add Product" class="btn btn-success float-right"></a><?php */?></h3>
             <!-- Cart -->
								<div class="dropdown" align="right">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span><a href="<?php echo base_url(); ?>index.php/User/cart" style="width:100%;">Your Cart</a></span>
										<div class="badge qty">
                                        <?php
										$u_id = $this->session->userdata('u_id');
										 $qy="SELECT COUNT(quantity) AS NumberOfProducts FROM cart WHERE `u_id`='$u_id' and status='0'";
										 $rss=mysql_query($qy);
										 $rww=mysql_fetch_array($rss);
										 echo $total=$rww['NumberOfProducts'];
										?>
                                        </div>
									</a>
									<div class="cart-dropdown"  >
										<div class="cart-list" id="cart_product">
										
											
										</div>
										
										<!--<div class="cart-btns">
												<a href="cart.php" style="width:100%;"><i class="fa fa-edit"></i>  edit cart</a>
											
										</div>-->
									</div>
										
									</div>
								<!-- /Cart -->

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        
        <form method="get" action="<?php //echo site_url('User/paddtocart'); ?>" enctype="multipart/form-data">
        <div class="card-body p-0">
      <?php 
				  $i=1;
				  foreach($data as $row)
				  { ?>  
      <div class="gallery products">
  <a href="#img_5terre.jpg">
    <img src="<?php echo base_url(); ?>assets_admin/images/<?php echo $row->p_img; ?>" alt="<?php echo $row->p_name; ?>" class="img-circle circle-border m-b-md" height="100px" width="100px">
  </a>
  
  <div class="product-body" align="center">
		<p class="product-category">
		              <?php $cat_id=$row->cat_id; 
		              $qry = "select * from `category` WHERE cat_id='$cat_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo "Category - ".$rw['cat_name']; ?></p>
		<h5 class="product-name header-cart-item-name"><a href="#"><?php echo $row->p_name; ?></a></h5>
		<h6 class="product-price header-cart-item-info"><i class="fas fa-rupee-sign"></i> <strong><?php echo $row->price; ?></strong><!--<del class="product-old-price">330</del>--></h6>

        <div class="product-btns">
         <!--<button data-toggle="modal" data-target="#view-modal" data-id="8" id="viewUser" class="btn btn-sm btn-warning"><i class="fa fa-eye"> Quick View</i></button>-->
		 <!-- <a class="btn btn-sm btn-warning" href="#" title="Quick View"><i class="fa fa-eye"> Quick View</i></a>--><br>
         <a class="btn btn-sm btn-success" href="paddtocart?pdct_id=<?php echo $row->pdct_id;?>&u_id=<?php echo $u_id = $this->session->userdata('u_id');?>&p=<?php echo $row->price;?>" title="Add to Cart"><i class="fa fa-shopping-cart"> Add to Cart</i></a><br />
        </div>
  </div>
</div>
<?php
                  $i++;
				  }
				 ?>


     </div>
     </form>
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