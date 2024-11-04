
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

          <!-- connect -->
  <?php include "include/conn.php";?>
  <!-- connect -->
    <!-- Main content -->
   <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><a href="<?php echo base_url(); ?>index.php/driver/adddriver"><input type="submit" value="Add Driver" class="btn btn-success float-right"></a></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">#</th>
                      <th style="width: 12%">Name</th>
                      <th style="width: 10%">Age & DOB</th>
                      <th style="width: 25%">Address</th>
                      <th style="width: 15%">Contact Details</th>
                      <!--<th style="width: 6%" class="text-center">Status</th>-->
                     <th style="width: 10%"></th>
                  </tr>
              </thead>
              <tbody>
                 <?php
				  $i=1;
				  foreach($data as $row)
				  { ?>

                  <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->dob; ?>(<?php echo $row->age; ?>)</td>
                      <td><?php echo $row->address; ?></td>
                      <td><?php echo $row->email; ?><br />
                      <?php echo $row->contactno; ?></td>
                    <!--    <td class="project-state">
                       <?php $stat=$row->status; 
					   //echo $stat;
					   if($stat==1)
					   {?>
                       <span class="badge badge-success">Active</span>
                       <?php }
					   elseif($stat==2)
					   {?>
					   <span class="badge badge-danger">Inactive</span>
					   <?php }
					   else
					   {?>
					   <span class="badge badge-warning">Pending</span>
					  <?php }
					   ?>
                      </td>-->
                   <td>
                          <!--   <a class="btn btn-success btn-sm" href="#"><i class="fas fa-thumbs-up"></i></a>
                          <a class="btn btn-info btn-sm" href="#"><i class="fas fa-pencil-alt"></i></a> -->
                           <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>index.php/driver/editdata?d_id=<?php echo $row->d_id; ?>"><i class="fas fa-pencil-alt"></i></a>
                          <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>index.php/driver/deletedata?d_id=<?php echo $row->d_id; ?>"><i class="fas fa-trash"></i></a>                      </td>
                  </tr>
                  <?php
                  $i++;
				  }
				 ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
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