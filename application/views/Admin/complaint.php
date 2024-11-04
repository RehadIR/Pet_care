
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
            <h1 class="m-0 text-dark">Complaint Panel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Complaints</li>
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
         <h3 class="card-title"><!--<a href="<?php //echo base_url(); ?>index.php/admin/addstaff"><input type="submit" value="Add Staff" class="btn btn-success float-right"></a>--></h3>

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
                      <th style="width: 15%">Complaint Date</th>
                      <th style="width: 15%">User</th>
                      <th style="width: 35%">Message</th>
                      <th style="width: 25%">Any Reply Given</th>
                      <th style="width: 20%"></th>
                      
                  </tr>
              </thead>
              <tbody>
              <?php 
				  $i=1;
				  foreach($data as $row)
				  { ?>
                  <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row->cdate; ?></td>
                      <td><a><?php $u_id=$row->u_id;
					  $qry = "select * from `user` WHERE u_id='$u_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo $rw['name']; 
					  ?></a></td>
                      <td><?php echo $row->message; ?></td>
                       <td><?php echo $row->reply; ?></td>
                      <td>
                          <?php $stat=$row->status; 
					   //echo $stat;
					   if($stat==1)
					   {?>
                       <span class="badge badge-success">Leave Reply</span>
                        <?php }
					   else
					   {?>
                     <a href="<?php echo base_url(); ?>index.php/admin/addreply?comp_id=<?php echo $row->comp_id; ?>"><input type="submit" value="Add Reply" class="btn btn-danger float-right"></a> 
                       <?php }
					   ?></td>

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