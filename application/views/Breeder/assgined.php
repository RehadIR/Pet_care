
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
            <h1 class="m-0 text-dark">Assigned Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Pet's Delivery</li>
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
         <h3 class="card-title"><?php /*?><a href="<?php echo base_url(); ?>index.php/Breeder/addpet"><input type="submit" value="Add Pet" class="btn btn-success float-right"></a><?php */?></h3>

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
                      <th style="width: 10%">Date</th>
                      <th style="width: 15%">Driver & Breeder Name</th>
                      <th style="width: 15%">Customer</th>
                      <th style="width: 30%">Location Update</th>
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
                      <td><a><?php echo $row->ass_date; ?></a></td>
                      <td><?php /*?><?php $p_id = $row->p_id; 
					  $qry = "select * from `pet` WHERE p_id='$p_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);?><img src="<?php echo base_url(); ?>assets_admin/images/<?php echo $rw['p_img']; ?>" class="img-circle circle-border m-b-md" height="100px" width="100px"/><br /><a><?php echo $rw['pet_name']; ?><?php */?>
                      <a>
                      <?php $d_id = $row->d_id; 
					  $qry = "select * from `driver` WHERE d_id='$d_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo "Driver: ".$rw['name']; ?><br />
					  <?php $b_id = $row->b_id; 
					  $qry = "select * from `breeder` WHERE b_id='$b_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo $rw['name']; ?></a></td>
                      <td><a><?php $u_id = $row->u_id; 
					  $qry = "select * from `user` WHERE u_id='$u_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo $rw['name']; ?><br />
                      
                      <?php $req_id = $row->req_id;
					  $qryy = "select * from `request` WHERE req_id='$req_id'";
                      $ress = mysql_query($qryy);
					  $rww=mysql_fetch_array($ress);
					  //echo $rww['address']; ?>
                      <?php echo "Delivery Address: ". $rww['address']; ?>
					  </a></td>

                      <td><?php echo $row->location; ?> - <a href="#"><?php echo $row->del_date; ?></a></td>
                    <td>
                       <?php $stat=$row->status; 
					   //echo $stat;
					   if($stat==2){ ?>
                       <input type="submit" value="Delivered" class="btn btn-success">
					   <?php }
					   elseif($stat==1)
					   {?>
                       <a class="btn btn-success btn-sm" href="#<?php echo base_url(); ?>index.php/Breeder/unapprovereq?req_id=<?php echo $row->req_id; ?>"><i class="fas fa-thumbs-up"></i> Picked</a>
                        <?php }
					   else
					   {?>
                       <a class="btn btn-danger btn-sm" href="#<?php echo base_url(); ?>index.php/Breeder/approvereq?req_id=<?php echo $row->req_id; ?>"><i class="fas fa-thumbs-down"></i> Not Picked</a> 
                       <?php }
					   ?>
                        <?php /*?> <a href="<?php echo base_url(); ?>index.php/Breeder/addassign?req_id=<?php echo $row->req_id; ?>"><input type="submit" value="Assign Delivery" class="btn btn-success"></a><?php */?>                             </td> 
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