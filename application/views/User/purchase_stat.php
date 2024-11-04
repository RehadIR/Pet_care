
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
            <h1 class="m-0 text-dark">Purchase Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List History</li>
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
                      <th style="width: 15%">Purchase Date</th>
                      <th style="width: 25%">Pet,Breeder name & Quantity</th>
                      <th style="width: 25%">Shipping Address</th>
                      <th style="width: 25%">Assigned & Pickup By</th>
                      <th style="width: 25%"><span style="width: 30%">Location Update</span></th>
                      <th style="width: 25%"></th>
                  </tr>
              </thead>
              <tbody>
              <?php 
				  $i=1;
				  foreach($data as $row)
				  { ?>
                  <tr>
                      <td><?php echo $i; ?></td>
                      <td><a><?php echo $row->ddate; ?>
					  </a></td>
                      <td><?php $p_id=$row->p_id; 
					  $qry = "select * from `pet` WHERE p_id='$p_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo "Pet: ".$rw['pet_name'];
					  echo " - (".$row->quantity.")";
					  ?><br />
                      <?php $b_id=$row->b_id; 
					  $qry = "select * from `breeder` WHERE b_id='$b_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo "Breeder Name: ".$rw['name'];
					  ?></td>
                      <td><?php echo $row->address; ?></td>
                      <td><?php foreach($data1 as $row1)
				  { echo $row1->ass_date; }?><br />
				  <?php $d_id=$row1->d_id; 
					  $qry = "select * from `driver` WHERE d_id='$d_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo $rw['name'];
					  echo " (".$rw['contactno'].")";
					  ?></td> 
                      <td><?php echo $row1->location; ?> - <a href="#"><?php echo $row1->del_date; ?></a></td>
                      <td><?php $status=$row1->status; 
					   if($status==2){ ?>
                       <input type="submit" value="Delivered" class="btn btn-success">
					   <?php }
					   elseif($status==1)
					  { ?>
					  <a href="#"><input type="submit" value="Courier Pickup" class="btn btn-warning"></a>
					 <?php 
					  } else { ?> <a href="#"><input type="submit" value="Delivered" class="btn btn-success"></a>
					 <?php } ?></td>
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
<script>


function doconfirm()
{
    job=confirm("Do you want to cancel this purchase?");
     if(job!=true)
    {
        return false;
    }
}

function doconfirm1()
{
    job=confirm("Do you want to check status?");
     if(job!=true)
    {
        return false;
    }
}
</script>