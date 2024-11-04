
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
            <h1 class="m-0 text-dark">Bins</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Bins</li>
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
            <h3 class="card-title">Add Bin Details</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          
           <div class="error_msg" style="color:#FF0000"> <?php echo validation_errors();?></div> 
   										 <?php echo isset($error) ? $error : ''; ?> 
                                    	<form method="post" action="<?php echo site_url('bin/addbin'); ?>">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Location</label>
                 <select name="loc_id" class="form-control required">
														<option value="">-- Select Location --</option>
                                                            <?php foreach($data as $row)
															 { ?>
															<option value="<?php echo $row->dist_id; ?>-<?php echo $row->loc_id; ?>"><?php echo $row->location; ?></option>
                                                              <?php } ?>
												        </select>
                </div>
                 <div class="form-group">
                <label for="inputName">Near By</label>
                <textarea name="nearest_of" cols="" rows="" class="form-control"></textarea>
               </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
               <div class="form-group">
                  <label>Capacity</label>
                  <input type="text" name="capacity" id="inputName" class="form-control" value="5" readonly="readonly">
                </div>
              <!-- <div class="form-group">
                <label for="inputName">Location</label>
                <input type="text" name="location" id="inputName" class="form-control">
               </div>-->
            
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
        <div class="col-12">
          <a href="<?php echo base_url(); ?>index.php/bin" class="btn btn-secondary">Cancel</a>
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