<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url(); ?>assets_admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Pet Care</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets_admin/dist/img/Admin-user.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url(); ?>index.php/admin/dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/admin/breeder" class="nav-link">
              <i class="nav-icon fas fa-id-card-alt"></i>
              <p>
                Manage Breeders
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/admin/vet" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Manage Vets
              </p>
            </a>
          </li>
          <!--<li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/admin/trainer" class="nav-link">
              <i class="nav-icon fas fa-diagnoses"></i>
              <p>
                Manage Trainers
              </p>
            </a>
          </li>-->
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/admin/user" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Customer
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
         <!-- <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/admin/boarding" class="nav-link">
              <i class="nav-icon fas fa-hospital"></i>
              <p>
                Manage Boardings
              </p>
            </a>
          </li>-->
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/admin/driver" class="nav-link">
              <i class="nav-icon fas fa-id-card"></i>
              <p>
                Manage Driver
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
            </ul>
          </li>
        
        
                  <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/admin/category" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Manage Product Category
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/admin/product" class="nav-link">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                Manage Product
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
           
           <?php /*?><li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fab fa-product-hunt nav-icon"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="<?php echo base_url(); ?>index.php/lab" class="nav-link">
                   <i class="fas fa-hat-wizard nav-icon"></i>
                  <p>Accessories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>index.php/test" class="nav-link">
                   <i class="fas fa-hamburger nav-icon"></i>
                  <p>Food</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>index.php/test" class="nav-link">
                   <i class="fas fa-capsules nav-icon"></i>
                  <p>Medicines</p>
                </a>
              </li>
            </ul>
          </li><?php */?>
     

           <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/admin/pcategory" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Manage Pets Category
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/admin/pet" class="nav-link">
              <i class="nav-icon fas fa-paw"></i>
              <p>
                Manage Pets
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/admin/pets_cert" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                pets Certificate
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
           
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/admin/view_feedbacks" class="nav-link">
              <i class="nav-icon fas fa-paper-plane"></i>
              <p>
               FeedBacks
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-header">REPORTS</li>
          
         <?php /*?> <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/collection" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Assign Collection
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/admin/report" class="nav-link">
              <i class="fas fa-file nav-icon"></i>
              <p>
                Reports
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/admin/complaint" class="nav-link">
              <i class="fas fa-comments nav-icon"></i>
              <p>
                Complaints
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li><?php */?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    
    
  </aside>