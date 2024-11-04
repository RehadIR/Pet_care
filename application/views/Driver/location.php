
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
            <h1 class="m-0 text-dark">Location Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Location</li>
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
            <h3 class="card-title">Add Location</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <?php
		  include "include/conn.php";
  $i=1;
  foreach($data as $row)
  $req_id= $row->req_id;
  //echo $req_id;
  $qry = "select * from `request` WHERE req_id='$req_id'";
                      $res = mysql_query($qry)or trigger_error(mysql_error());
					  $rw=mysql_fetch_array($res);
					  $pp= $rw['price'];
					    $b_id= $rw['b_id'];
  //{
  ?>
           <div class="error_msg" style="color:#FF0000"> <?php echo validation_errors();?></div> 
   										 <?php echo isset($error) ? $error : ''; ?> 
                                    	<form method="post" action="<?php echo site_url('Driver/addlocation'); ?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                
                
                
                <div class="form-group">
                  <label>Location</label>
                  <textarea class="form-control" name="location" placeholder="Enter Location Here"></textarea>
                  
                <input type="hidden" name="ass_id" id="inputName" class="form-control" value="<?php echo $row->ass_id; ?>">
                <input type="hidden" name="d_id" id="inputName" class="form-control" value="<?php echo $row->d_id; ?>">
                
					  <input type="hidden" name="price" id="inputName" class="form-control" value="<?php echo $pp; ?>">
					  <input type="hidden" name="b_id" id="inputName" class="form-control" value="<?php echo $b_id; ?>">

                </div>
                 
                 <div class="form-group">
                  <label>Status</label>
               <select name="status">
                <option value="1">On the way</option>
               <option value="2">Delivered</option>
                </select>
                </div>
              </div>
              <!-- /.col -->
              
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
        <div class="col-12">
          <a href="<?php echo base_url(); ?>index.php/Driver/assigned" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="submit" value="Create" class="btn btn-success float-right">
          </form>
             <?php //} ?>
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