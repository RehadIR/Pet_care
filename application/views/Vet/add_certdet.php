
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
            <h1 class="m-0 text-dark">Certificate Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add certificate</li>
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
            <h3 class="card-title">Add certificate</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" >
          
          <?php
  $i=1;
  foreach($data as $row)
  {
  $date=date("d/m/Y");
  ?>
           <div class="error_msg" style="color:#FF0000"> <?php echo validation_errors();?></div> 
   										 <?php echo isset($error) ? $error : ''; ?> 
                                    	<form method="post" action="" enctype="multipart/form-data">
            <div class="row">
            
            <div class="card-body align-items-center d-flex justify-content-center">
              <div class="col-md-6">
              <div class="card" >
                <div class="card-body">
                
                
                <div class="form-group">
                <h3><center>Kerala State Veterinary Council</center></h3>
                <h2 style="color:#0066ff"><center>CERTIFICATE OF GOOD HEALTH</center></h2>
                  <h4><center>This Certificate Confirm That</center></h4> 
                  <h1 style="color:#0066ff"><center><?php echo $row->pet_name; ?></center></h1>
                                
                   <label><h5>Has undergone a medical checkup and is found to be physically fit</h5> </label>
                 <h5><center>Issued On <?php echo $date; ?></center></h5>
                 <input type="hidden" name="date" id="inputName" class="form-control" value="<?php echo $date; ?>"> 
                <input type="hidden" name="p_id" id="inputName" class="form-control" value="<?php echo $row->p_id; ?>">
                </div>
                </div>
              </div>
              </div>              <!-- /.col -->
              
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
        <div class="col-12">
          <a href="<?php echo base_url(); ?>index.php/Vet/certificate" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="submit" value="Create" class="btn btn-success float-right">
          </form>
             <?php } ?>
        </div>
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