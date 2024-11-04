
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
            <h1 class="m-0 text-dark">Product Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Products</li>
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
         <h3 class="card-title"><a href="<?php echo base_url(); ?>index.php/admin/addproduct"><input type="submit" value="Add Product" class="btn btn-success float-right"></a></h3>

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
                      <th style="width: 15%">Product Name</th>
                      <th style="width: 10%">Category Name</th>
                      <th style="width: 5%">Quantity</th>
                      <th style="width: 5%">Price</th>
                      <th style="width: 25%">Details about Product</th>
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
                      <td><img src="<?php echo base_url(); ?>assets_admin/images/<?php echo $row->p_img; ?>" class="img-circle circle-border m-b-md" height="100px" width="100px"/><br /><a><?php echo $row->p_name; ?></a></td>
                      <td><a><?php $cat_id=$row->cat_id; $qry = "select * from `category` WHERE cat_id='$cat_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo $rw['cat_name']; ?></a></td>
                      <td><a><?php echo $row->quantity; ?></a></td>
                      <td><a><?php echo $row->price; ?></a></td>
                      <td><a><?php echo $row->descp; ?></a></td>
                      <td>
                       <?php $stat=$row->status; 
					   //echo $stat;
					   if($stat==1)
					   {?>
                       <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>index.php/admin/unapprovepdct?pdct_id=<?php echo $row->pdct_id; ?>"><i class="fas fa-thumbs-up"></i></a>
                        <?php }
					   else
					   {?>
                       <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>index.php/admin/approvepdct?pdct_id=<?php echo $row->pdct_id; ?>"><i class="fas fa-thumbs-down"></i></a> 
                       <?php }
					   ?>
                       <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>index.php/admin/pdcteditdata?pdct_id=<?php echo $row->pdct_id; ?>"><i class="fas fa-pencil-alt"></i></a>
                       <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>index.php/admin/pdctdeletedata?pdct_id=<?php echo $row->pdct_id; ?>"><i class="fas fa-trash"></i></a>                  
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