
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
            <h1 class="m-0 text-dark">Message Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Message</li>
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
            <h3 class="card-title">Add Message</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <?php
  $i=1;
  foreach($data as $row)
  {$b_id = $this->session->userdata('b_id');
  ?>
           <div class="error_msg" style="color:#FF0000"> <?php echo validation_errors();?></div> 
   										 <?php echo isset($error) ? $error : ''; ?> 
                                    	<form method="post" action="<?php echo site_url('Breeder/addtmessage'); ?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Message To</label>
                <input type="tex" name="name" id="inputName" class="form-control" value="<?php echo $row->name; ?>" readonly="readonly">
                </div>
              </div>
              <!-- /.col -->
			  <?php  foreach($data as $row)
				  { $t_id=$row->u_id;}
				  echo $t_id;
				  echo $b_id;?>
			  <div class="col-md-6">
                <div class="form-group">
                  <label>Message</label>
				  <?php include "include/conn.php";
				  //
					 

					 $qry = "SELECT * FROM `message`WHERE `u_id`='$t_id' and `b_id`='$b_id'and `mes_id`=last_insert_id()  
					  ";
                      $res =mysql_query($qry) ;
					  while($rws=mysql_fetch_array($res))
					  {
					  echo "</br>";echo $rws['message']; 
					  ?><?php }?>	
                 
                
                </div>
                 
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Message</label>
                 <textarea class="form-control" name="message" placeholder="Enter Message Here"></textarea>
                <input type="hidden" name="t_id" id="inputName" class="form-control" value="<?php echo $row->u_id; ?>">
                <input type="hidden" name="b_id" id="inputName" class="form-control" value="<?php echo $b_id; ?>">
                </div>
                 
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
        <div class="col-12">
          <a href="<?php echo base_url(); ?>index.php/Breeder/trainer" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="submit" value="Create" class="btn btn-success float-right">
          </form>
             <?php } ?>
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
