
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
            <h1 class="m-0 text-dark">Pet Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Pets</li>
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
         <h3 class="card-title"><?php /*?><a href="<?php echo base_url(); ?>index.php/admin/addproduct" onClick="return doconfirm()"><input type="submit" value="Add Product" class="btn btn-success float-right"></a><?php */ $u_id = $this->session->userdata('u_id');?></h3>

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
                      <th style="width: 15%">Pet Name</th>
                      <th style="width: 15%">Breeder's Name</th>
                      <th style="width: 10%">Quantity</th>
                      <th style="width: 10%">Price</th>
                      <th style="width: 35%">Details about Pet</th>
					  <th style="width: 10%"></th>
                      <th style="width: 10%"></th>
                      <th style="width: 10%"></th>
                  </tr>
              </thead>
              <tbody>
              <?php 
				  $i=1;
				  foreach($data as $row)
				  { $video=$row->p_video; ?>
                  <tr>
                      <td><?php echo $i; ?></td>
                      <td>
                      <img src="<?php echo base_url(); ?>assets_admin/images/<?php echo $row->p_img; ?>" class="img-circle circle-border m-b-md" height="100px" width="100px"/><br />
                      <b><?php echo $row->pet_name; ?></b><br />
					  <?php $pcat_id=$row->pcat_id; 
					  $qry = "select * from `pet_category` WHERE pcat_id='$pcat_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo "Pet Category: ".$rw['pcat_name']; ?></td>
                      <td><a><?php $b_id=$row->b_id; 
					  $qry = "select * from `breeder` WHERE b_id='$b_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo $rw['name']; ?></a></td>
                      <td><a><?php echo $row->quantity; ?></a></td>
                      <td><a><?php echo $row->price; ?></a></td>
                      <td><a><?php echo $row->descp; ?></a></td>
					  <td>

                       <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/User/trainer?p_id=<?php echo $row->p_id; ?>&u_id=<?php echo $u_id;?>"><i class="fas fa-envelope-open">Breeder</i></a>
                                       
                             </td> 
                      <td>

                       <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>index.php/User/purchase?p_id=<?php echo $row->p_id; ?>&u_id=<?php echo $u_id; ?>" onClick="return doconfirm1()">Purchase</a>
                                       
                             </td> 
                             
                            <!--<td>
                             <?php if($video!="")
               {?>
               <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>index.php/User/vvideo?p_id=<?php echo $row->p_id; ?>&u_id=<?php echo $u_id; ?>" onClick="return doconfirm2()"><i class="fas fa-video">Watch</i></a>
              <?php }?>
                             </td>-->
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


function doconfirm1()
{
    job=confirm("Do you want to purchase this pet?");
     if(job!=true)
    {
        return false;
    }
}




</script>