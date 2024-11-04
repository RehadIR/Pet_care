
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
            <h1 class="m-0 text-dark">Collection Assigning</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Assign Work</li>
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
            <h3 class="card-title">Add Work Details</h3>

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
                                    	<form method="post" action="<?php echo site_url('collection/addassign'); ?>">
                                        <input type="hidden" name="loc_id" value="<?php echo $row->loc_id; ?>"/>
                                        <input type="hidden" name="b_id" value="<?php echo $row->b_id; ?>"/>
                                        <input type="hidden" name="t_total" value="<?php echo $row->t_total; ?>"/>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Drivers</label>
                 <select name="d_id" class="form-control required">
														<option value="">-- Select Drivers --</option>
                                                            <?php foreach($data1 as $row1)
															 { ?>
															<option value="<?php echo $row1->d_id; ?>"><?php echo $row1->name; ?></option>
                                                              <?php } ?>
												        </select>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
               <div class="form-group">
                <label for="inputName">Assign Date</label>
                <input type="text" name="ddate" id="ddate" value="<?php echo date("d/m/Y"); ?>" class="form-control" readonly="readonly">
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
          <a href="<?php echo base_url(); ?>index.php/bin" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="submit" value="Create" class="btn btn-success float-right">
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