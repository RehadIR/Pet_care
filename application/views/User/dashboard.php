
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
            <h1 class="m-0 text-dark">Profile Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
            <h3 class="card-title">My Profile</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          
           <?php $user = $this->session->userdata('user'); ?>
           <?php foreach($data as $row) $u_id = $row->u_id;?> <?php $this->session->set_userdata(array('u_id'=>$u_id));  ?>
           <?php $u_id = $this->session->userdata('u_id'); ?>
           
                                    	<!--<form method="post" action="<?php echo site_url('admin/addproduct'); ?>" enctype="multipart/form-data">-->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name</label>
                 <input type="text" name="name" id="inputName" class="form-control" value="<?php echo $row->name; ?>" readonly="readonly">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" id="inputName" class="form-control" value="<?php echo $row->email; ?>" readonly="readonly">
                </div>
                <div class="form-group">
                  <label>Address</label>
                 <textarea name="address" cols="" rows="" class="form-control" readonly="readonly"><?php echo $row->address; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" name="password" id="inputName" class="form-control" value="<?php echo $row->password; ?>" readonly="readonly">
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Gender</label>
                 <input type="text" name="gender" id="inputName" class="form-control" value="<?php echo $row->gender; ?>" readonly="readonly">
                </div>
                <div class="form-group">
                  <label>Contact No</label>
                 <input type="text" name="contactno" id="inputName" class="form-control" value="<?php echo $row->contactno; ?>" readonly="readonly">
                </div> 
                <div class="form-group">
                  <label>Username</label>
                 <input type="text" name="username" id="inputName" class="form-control" value="<?php echo $row->username; ?>" readonly="readonly">
                </div>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
<!--          <div class="card-footer">
            <div class="row">
        <div class="col-12">
          <a href="<?php echo base_url(); ?>index.php/admin/product" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="submit" value="Update Profile" class="btn btn-success float-right">
          </form>
        </div>
      </div>
          </div>-->
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