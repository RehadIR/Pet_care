
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
            <h1 class="m-0 text-dark">VIDEO UPLOADING</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Pet's Video</li>
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
            <h3 class="card-title">Add Pet's Video</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <?php
  $i=1;
  foreach($data as $row2)
  {
	  
  ?>
           <div class="error_msg" style="color:#FF0000"> <?php echo validation_errors();?></div> 
   										 <?php echo isset($error) ? $error : ''; ?> 
            	<form action="<?php echo site_url('Breeder/videoadd'); ?>" method="post" enctype="multipart/form-data">
            		<div class="row">
              			<div class="col-md-6">
                
                
                
                			<div class="form-group">
                  				<label>Upload Certificate/Videos</label>
                  
                
                                <input type="hidden" name="b_id" id="inputName" class="form-control" value="<?php echo $row2->b_id; ?>">
                                <input type="hidden" name="p_id" id="inputName" class="form-control" value="<?php echo $row2->p_id; ?>">
                                <input type="text" name="pet" id="inputName" class="form-control" value="<?php echo $row2->pet_name; ?>">
                               
                                <input type="file" name="petvideo" class="form-control"  value="" title="Upload Pet video" placeholder="Upload Product video">
                                
                                <?php /*?><video width="300" height="300" controls="controls">
                                <source src="<?php echo base_url().'assets_admin/images/'.$row2->p_video ;?>" type="video/mp4" />
                                </video><?php */?>
                                
              <!-- <p><input name="video_upload" value="Upload Video" type="submit" /></p></div>-->
                  			</div>
              			</div>
              <!-- /.col -->
              
            		</div>
            <!-- /.row -->
          
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
                <div class="col-12">
                  <a href="<?php echo base_url(); ?>index.php/Breeder/pet" class="btn btn-secondary">Cancel</a>
                  <input type="submit" name="vupload" value="Upload" class="btn btn-success float-right">
                  </form>
                     <?php }
                    /* if(isset($failed))
                     {
                     echo $failed;
                     }
                     if(isset($upload_path))
                     {
                     echo $upload_path;
                     }
                     */
                     
                      ?>
                </div>
      		</div>
          </div>
          </form>
       

      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
   </div>
     <!-- Footer -->
    <?php include "include/footer.php";?>
    <!-- /.footer -->

<!-- ./wrapper -->