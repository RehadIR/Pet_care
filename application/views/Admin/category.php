
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
            <h1 class="m-0 text-dark">Category Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Category</li>
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
         <h3 class="card-title"><a href="<?php echo base_url(); ?>index.php/admin/addcategory" onClick="return dooconfirm()"><input type="submit" value="Add Category" class="btn btn-success float-right"></a></h3>

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
                      <th style="width: 15%">Category Name</th>
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
                      <td><a><?php echo $row->cat_name; ?></a></td>
                      <td>
                       <?php $stat=$row->status; 
					   //echo $stat;
					   if($stat==1)
					   {?>
                       <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>index.php/admin/unapprove?cat_id=<?php echo $row->cat_id; ?>" onClick="return doconfirm()"><i class="fas fa-thumbs-up"></i></a>
                        <?php }
					   else
					   {?>
                       <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>index.php/admin/approve?cat_id=<?php echo $row->cat_id; ?>" onClick="return docconfirm()"><i class="fas fa-thumbs-down"></i></a> 
                       <?php }
					   ?>
                          <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>index.php/admin/editdata?cat_id=<?php echo $row->cat_id; ?>" onClick="return doccconfirm()"><i class="fas fa-pencil-alt"></i></a>
                          <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>index.php/admin/deletedata?cat_id=<?php echo $row->cat_id; ?>" onClick="return docccconfirm()"><i class="fas fa-trash"></i></a>                     </td> 
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
function dooconfirm()
{
    job=confirm("Do you want to add new category?");
     if(job!=true)
    {
        return false;
    }
}

function doconfirm()
{
    job=confirm("Do you want to unapprove this category?");
     if(job!=true)
    {
        return false;
    }
}

function docconfirm()
{
    job=confirm("Do you want to approve this category?");
     if(job!=true)
    {
        return false;
    }
}

function doccconfirm()
{
    job=confirm("Do you want to edit this category?");
     if(job!=true)
    {
        return false;
    }
}

function docccconfirm()
{
    job=confirm("Do you want to delete this category?");
     if(job!=true)
    {
        return false;
    }
}
</script>