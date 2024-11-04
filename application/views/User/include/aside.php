<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url(); ?>assets_user/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Pet Care</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets_user/dist/img/Admin-user.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">User</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url(); ?>index.php/User" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-paw"></i>
              <p>
                Pets
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/User/pet" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                List Pets
              </p>
            </a>
          </li>
<?php /*?>          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/User/message" class="nav-link">
               <i class="nav-icon fas fa-envelope"></i>
              <p>
                Pet's Enquiry
              </p>
            </a>
          </li><?php */?>
         <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/User/purhis" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Purchase History
              </p>
            </a>
          </li>
         </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                Products
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/User/product" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                List Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/User/cart" class="nav-link">
                           <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Shopping Cart
              </p>
            </a>
          </li>
          <?php /*?><li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/Breeder/sellhis" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Purchase History
              </p>
            </a>
          </li><?php */?>
         </ul>
          </li>
          
         <!-- <li class="nav-item has-treeview menu-open">
            <a href="<?php //echo base_url(); ?>index.php/User/vet" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>Vet</p>
            </a>
          </li>-->
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Vet
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/User/vet" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Vet
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/User/message" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Message
              </p>
            </a>
          </li>
         </ul>
          </li>
          
          
          <!--<li class="nav-item has-treeview menu-open">
            <a href="<?php //echo base_url(); ?>index.php/User/trainer" class="nav-link">
              <i class="nav-icon fas fa-diagnoses"></i>
              <p>Trainer</p>
            </a>
          </li>-->
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>
                Breeder
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/User/trainer" class="nav-link">
              <i class="nav-icon fas fa-id-card-alt"></i>
              <p>
                Breeder
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/User/tmessage" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Message
              </p>
            </a>
          </li>
         </ul>
          </li>
          
          <!--<li class="nav-item has-treeview menu-open">
            <a href="<?php //echo base_url(); ?>index.php/User/boarding" class="nav-link">
              <i class="nav-icon fas fa-hospital"></i>
              <p>Boarding</p>
            </a>
          </li>-->
          
          
          
<li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url(); ?>index.php/User/feedback" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>FeedBack</p>
            </a>
          </li>
          
          

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    
    
  </aside>