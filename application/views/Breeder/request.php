
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
            <h1 class="m-0 text-dark">Request Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Pet's Request</li>
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
                      <th style="width: 15%">Pet Name</th>
                      <th style="width: 15%">Customer</th>
                      <th style="width: 5%">Quantity</th>
                      <th style="width: 15%">Address</th>
                      <th style="width: 10%"></th>
                      
                  </tr>
              </thead>
              <tbody>
              <?php 
				  $i=1;
				  foreach($data as $row)
				  { $b_id=$this->session->userdata('b_id');
					?>
                  <tr>
                      <td><?php echo $i; ?></td>
                      <td><a><?php echo $row->ddate; ?></a></td>
                      <?php /*?><td><a><?php $pcat_id=$row->pcat_id; 
					  $qry = "select *, convert(datetime, transDate) as transDate from 
					  employee order by transDate";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo $rw['pcat_name']; ?></a></td><?php */?>
                      <td><?php $p_id = $row->p_id; 
					  $qry = "select * from `pet` WHERE p_id='$p_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);?><img src="<?php echo base_url(); ?>assets_admin/images/<?php echo $rw['p_img']; ?>" class="img-circle circle-border m-b-md" height="100px" width="100px"/><br /><a><?php echo $rw['pet_name']; ?></a></a></td>
                      <td><a><?php $u_id = $row->u_id; 
					  $qry = "select * from `user` WHERE u_id='$u_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo $rw['name']; ?>
					  </a></td>
                      <td><a><?php echo $row->quantity; ?></a></td>
                      <td><a><?php echo $row->address; ?></a></td>
                  <td>
                       <?php $stat=$row->status; $file=$row->files; 
					   $flag=$row->flag;
					   $date=$row->ddate;
					 $asdate=$row->assgn_date;
					  $date_plus = date('Y-m-d', strtotime($date.'+5 days'));
					   $tdate=date('Y-m-d');
						//echo $date.'<br>'.$date_plus;
						//echo $current=date("Y-m-d H:i:s");
					   //echo $date=$row->ddate;
					   //$dat= date_add($date, date_interval_create_from_date_string('5 days'));
						//echo date_format($date, 'Y-m-d');
					   //echo $dat;&&req_id=<?php echo ".$date_plus.";
					   if($stat==3)
					   { ?>
                       <a href="#"><input type="submit" value="Delivered" class="btn btn-success"></a>
					   <?php }
					   elseif($stat==2)
					   { ?>
					    <a href="<?php echo base_url(); ?>index.php/Breeder/assign"><input type="submit" value="Assigned For Delivery" class="btn btn-warning"></a>
					   <?php }
					   //echo $stat;
					   elseif($stat==1 and $flag==1)
					   {?>
                       <a class="btn btn-success btn-sm" href="#"><i class="fas fa-thumbs-up"></i></a>
						<?Php 
						  if($asdate==$date_plus)
						  {
						  //echo "hhh";
							  if(($asdate==$tdate) || ($asdate < $tdate))
							  {
							  //echo "usss";?>
							   <a href="<?php echo base_url(); ?>index.php/Breeder/addassign?req_id=<?php echo $row->req_id; ?>">								<input type="submit" value="Assign Delivery" class="btn btn-success"></a>
							  <?php }
							  else
							  { ?>
								 <a href="<?php /*echo base_url(); ?>index.php/Breeder/addassign?req_id=<?php echo $row->req_id; */?>"><input type="submit" value="Waiting Assign Date" class="btn btn-success"></a>
							   <?php
							   }
							}
					   	}
						elseif($stat==1 and $flag!=1)
					   {?>
                       <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>index.php/Breeder/unapprovereq?req_id=<?php echo $row->req_id; ?>"><i class="fas fa-thumbs-up"></i></a>
                       <a href="#"><input type="submit" value="Not Paid" class="btn btn-primary"></a>
                        <?php }
					   else
					   {?>
                       <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>index.php/Breeder/approvereq?req_id=<?php echo $row->req_id; ?>"><i class="fas fa-thumbs-down"></i></a> 
					   <?php if($file=="")
					   {?>
                       <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/Breeder/addfile?req_id=<?php echo $row->req_id; ?>">upload LC<i class="fa fa-arrow-up"></i></a> 
                       <?php } 
					   else{ ?>
						 <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/Breeder/addfile?req_id=<?php echo $row->req_id; ?>">uploaded<i class="fa fa-arrow-up"></i></a>  
					   <?php }
					   }
					   ?>

                             </td> 
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