
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
            <h1 class="m-0 text-dark">Pet Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Pet</li>
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
            <h3 class="card-title">Add Pet</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          
           <div class="error_msg" style="color:#FF0000"> <?php echo validation_errors();?></div> 
   										 <?php echo isset($error) ? $error : ''; ?> 
                                    	<form method="post" action="<?php echo site_url('Breeder/addpet'); ?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Category Name</label>
                 <select name="pcat_id" class="form-control required">
				 <option value="">-- Select Pet Category --</option>
                   <?php foreach($data1 as $row)
							{ ?>
				<option value="<?php echo $row->pcat_id; ?>"><?php echo $row->pcat_name; ?></option>
                    <?php } ?>
				</select>
                </div>
                
                <div class="form-group">
                  <label>Pet Price</label>
                 <input type="text" name="price" id="inputName" placeholder="Pet Price" class="form-control">
                </div>
                <div class="form-group">
                  <label>Pet Description</label>
                 <textarea class="form-control" name="descp" placeholder="Pet Description"></textarea>
                </div>
                 
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Pet Name</label>
                 <input type="text" name="pet_name" id="inputName" class="form-control" placeholder="Pet Name">
                </div>
                  <div class="form-group">
                  <label>Pet Quantity</label>
                 <input type="text" name="quantity" id="inputName" placeholder="Pet Quantity" class="form-control">
                </div> 
                <div class="form-group">
                  <label>Pet Image</label>
                 <input type="file" name="p_img" class="form-control"  title="Upload Pet Image" placeholder="Upload Product Image">
                </div> 
                <!--<div class="form-group">
                  <label>Pet video</label>
                 <input type="file" name="p_video" class="form-control"  title="Upload Pet Video" placeholder="Upload Product video">
                </div> -->
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
        <div class="col-12">
          <a href="<?php echo base_url(); ?>index.php/Breeder/pet" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="submit" value="Create" class="btn btn-success float-right">
          </form>
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