
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
            <h1 class="m-0 text-dark">Drivers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Drivers</li>
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
            <h3 class="card-title">Add Driver Details</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          
           <div class="error_msg" style="color:#FF0000"> <?php echo validation_errors();?></div> 
   										 <?php echo isset($error) ? $error : ''; ?> 
                                    	<form method="post" action="<?php echo site_url('driver/adddriver'); ?>">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" id="inputName" class="form-control">
                </div>
                 <div class="form-group">
                <label for="inputName">Address</label>
                <textarea name="address" cols="" rows="" class="form-control"></textarea>
               </div>
               <div class="form-group">
                  <label>Contact No</label>
                  <input type="text" name="contactno" id="inputName" class="form-control">
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
               <div class="form-group">
                  <label>Date Of Birth</label>
                  <input type="date" name="dob" id="inputName" class="form-control">
                </div>
             <div class="form-group">
                <label for="inputName">Email</label>
                <input type="email" name="email" id="inputName" class="form-control">
               </div>
            <div class="form-group">
                <label for="inputName">Id Proof</label>
                <input type="text" name="idproof" id="inputName" class="form-control" placeholder="Aadhaar - 887496852132">
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
          <a href="<?php echo base_url(); ?>index.php/driver" class="btn btn-secondary">Cancel</a>
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