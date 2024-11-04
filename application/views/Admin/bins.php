
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

          <!-- connect -->
  <?php include "include/conn.php";?>
  <!-- connect -->
    <!-- Main content -->
   <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><a href="<?php echo base_url(); ?>index.php/bin/addbin"><input type="submit" value="Add Bin" class="btn btn-success float-right"></a></h3>

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
                      <th style="width: 15%">District</th>
                      <th style="width: 15%">Location</th>
                      <th style="width: 35%">Near By</th>
                      <th style="width: 8%">Capacity</th>
                      <!--<th style="width: 6%" class="text-center">Status</th>-->
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
                      <td>
					  <?php $dist_id=$row->dist_id;
					  $qry = "select * from `districts` WHERE dist_id='$dist_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo $rw['dist_name']; 
					  ?></td>
                      <td><?php $loc_id=$row->loc_id;
					  $qry = "select * from `location` WHERE loc_id='$loc_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo $rw['location']; 
					  ?></td>
                      <td><?php echo $row->nearest_of; ?></td>
                      <td align="center"><span class="badge badge-success"><?php echo $row->capacity; ?> KG</span></td>
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
                     <?php 
					  /*$qry1 = "select * from `assign` WHERE b_id='$row->b_id'";
                      $res1 = mysql_query($qry1);
					  $rw1=mysql_fetch_array($res1);
					  $status=$rw1['status']; 
					  
					 if($status==1)
					 { */?>
					<!-- <a class="btn btn-info btn-sm" href="#"><i class="fas fa-trash"> Assigned</i></a>-->
					 <?php //}
					 
					 if($row->capacity==$row->t_total) { ?>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>index.php/collection/addassign?b_id=<?php echo $row->b_id; ?>"><i class="fas fa-trash"> Bin Full</i></a>
                      <?php } else { ?>
                      
                      <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>index.php/bin/editdata?b_id=<?php echo $row->b_id; ?>"><i class="fas fa-pencil-alt"></i></a>
                      <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>index.php/bin/deletedata?b_id=<?php echo $row->b_id; ?>"><i class="fas fa-trash"></i></a>
                      <?php } ?>                   </td>
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