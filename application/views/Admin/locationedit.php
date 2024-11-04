
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
            <h1 class="m-0 text-dark">Locations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Locations</li>
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
            <h3 class="card-title">Edit Location Details</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
    
           <div class="error_msg" style="color:#FF0000"> <?php echo validation_errors();?></div> 
   										 <?php echo isset($error) ? $error : ''; ?> 
                                               <?php
  $i=1;
  foreach($data as $row)
  {
  ?>
                                    	<form method="post" action="<?php //echo site_url('location/addlocation'); ?>">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>District</label>
                   <input type="text" name="dist_id" id="inputName" class="form-control" readonly="readonly" value="<?php $dist_id=$row->dist_id; $qry = "select * from `districts` WHERE dist_id='$dist_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo $rw['dist_name']; ?>">
               <!--  <select name="dist_id" class="form-control required">
														<option value="">-- Select District --</option>
                                                            <?php //foreach($data as $row)
															 //{ ?>
															<option value="<?php //echo $row->dist_id; ?>"><?php //echo $row->dist_name; ?></option>
                                                              <?php //} ?>
												        </select>-->
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
               <div class="form-group">
                <label for="inputName">Location</label>
                <input type="text" name="location" id="inputName" class="form-control" value="<?php echo $row->location; ?>">
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
          <a href="<?php echo base_url(); ?>index.php/location" class="btn btn-secondary">Cancel</a>
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