
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
            <h1 class="m-0 text-dark">Product Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
          <!-- connect -->
  <?php include "include/conn.php";?>
  <!-- connect -->
    <!-- Main content -->
   <section class="content">

      <!-- Default box -->
      <div class="container-fluid">
<div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Product</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <?php
  $i=1;
  foreach($data as $row)
  {
  ?>
           <div class="error_msg" style="color:#FF0000"> <?php echo validation_errors();?></div> 
   										 <?php echo isset($error) ? $error : ''; ?> 
                                    	<form method="post" action="<?php echo site_url('admin/pdcteditdata'); ?>">
                                        
                                        <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Category Name</label>
                 <select name="cat_id" class="form-control required">
				 <option value="">-- Select Product Category --</option>
                   <?php foreach($data1 as $row1)
							{ ?>
				<option value="<?php echo $row1->cat_id; ?>" <?php if($row1->cat_id==$row->cat_id) echo "selected"; ?>><?php echo $row1->cat_name; ?></option>
                    <?php } ?>
				</select>
                </div>
                <div class="form-group">
                  <label>Product Price</label>
                 <input type="text" name="price" id="inputName" value="<?php echo $row->price; ?>" class="form-control">
                </div>
                <div class="form-group">
                  <label>Product Description</label>
                 <textarea class="form-control" name="descp" placeholder="Product Description"><?php echo $row->descp; ?></textarea>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Product Name</label>
                 <input type="text" name="p_name" id="inputName" value="<?php echo $row->p_name; ?>" class="form-control">
                </div>
                <div class="form-group">
                  <label>Product Quantity</label>
                 <input type="text" name="quantity" id="inputName" value="<?php echo $row->quantity; ?>" class="form-control">
                 <input type="hidden" name="pdct_id" id="inputName" class="form-control" value="<?php echo $row->pdct_id; ?>">
                </div> 
                <!--<div class="form-group">
                  <label>Product Image</label>
                 <input type="file" name="p_img" class="form-control"  title="Upload Product Image" placeholder="Upload Product Image">
                </div>-->
              </div>
            </div>
            <?php /*?><div class="row">
              
              <!-- /.col -->
              <div class="col-md-6">
               <div class="form-group">
                  <label>Category Name</label>
                  <input type="text" name="pcat_name" id="inputName" class="form-control" value="<?php echo $row->pcat_name; ?>">
                  <input type="hidden" name="pcat_id" id="inputName" class="form-control" value="<?php echo $row->pcat_id; ?>">
                </div>
              </div>
              <!-- /.col -->
            </div><?php */?>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
        <div class="col-12">
          <a href="<?php echo base_url(); ?>index.php/admin/product" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="update" value="Update" class="btn btn-success float-right">
          </form>
           <?php } ?>
        </div>
      </div>
          </div>
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