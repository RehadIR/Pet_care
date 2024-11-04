 <?php include 'include/cheader.php';?>
        <!-- Main Navigation Start -->
        <?php include 'include/navmenu.php';?>        
        <!-- Main Navigation End -->
    </header>

    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">        
        <div class="bg-navy-blue bg-fixed pos-rel breadcrumbs-page">
            <img class="ptt-png" src="<?php echo base_url(); ?>assets/images/Dot-Shape.png" alt="png">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Breeder</li>
                    </ol>
                </nav>
                <h1>Dashboard</h1>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- Our Providing Services Start -->
        <section class="wide-tb-100">
            <div class="container">
                <h1 class="heading-main center">
                    <!--<small>We are here to help you <i class="pethund_repeat_grid"></i></small>-->
                    <span>My </span> Profile
                </h1>
                 <?php $user = $this->session->userdata('user'); ?>
                   <?php foreach($data as $row) $u_id = $row->u_id;?> <?php $this->session->set_userdata(array('u_id'=>$u_id));  ?>
                   <p align="right"><?php echo "Hai, ".$u_name = $row->name; ?></p>
                   
                <div class="row">

                   <!-- Icon Boxes One Style -->
                    <div class="col-md-12 col-lg-12">
                   
                        <div class="icon-box-1 d-flex">
                           
                            
                            <div class="text">
               <div class="row">
            
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name</label>
                 <input type="text" name="name" id="inputName" class="form-control" value="<?php echo $row->name; ?>" readonly="readonly">
                </div>
              </div>
              <!-- /.col -->
              
              <div class="col-md-6">
                <div class="form-group">
                  <label>Gender</label>
                 <input type="text" name="gender" id="inputName" class="form-control" value="<?php echo $row->gender; ?>" readonly="readonly">
                 
                </div>
              </div>
              <!-- /.col -->
              
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                 <input type="text" name="email" id="inputName" class="form-control" value="<?php echo $row->email; ?>" readonly="readonly">
                </div>
              </div>
              <!-- /.col -->
              
              <div class="col-md-6">
                <div class="form-group">
                  <label>Contact No</label>
                 <input type="text" name="contactno" id="inputName" class="form-control" value="<?php echo $row->contactno; ?>" readonly="readonly">
                </div>
              </div>
              <!-- /.col -->
              
              <div class="col-md-6">
                <div class="form-group">
                <label for="inputName">Address</label>
                <textarea name="address" cols="" rows="" class="form-control"><?php echo $row->address; ?></textarea>
               </div>
              </div>
              <!-- /.col -->
              
              <div class="col-md-6">
                <div class="form-group">
                  <label>Username</label>
                 <input type="text" name="username" id="inputName" class="form-control" value="<?php echo $row->username; ?>" readonly="readonly">
                </div>
              </div>
              <!-- /.col -->
              
              <div class="col-md-6">
                <div class="form-group">
                  <label>Password</label>
                 <input type="text" name="password" id="inputName" class="form-control" value="<?php echo $row->password; ?>" readonly="readonly">
                </div>
              </div>
              <!-- /.col -->
              
            </div>
            
            
            
                                <!--<a href="services-single.html" class="read-more-arrow">
                                    Read More <span> <i class="icofont-simple-right"></i></span>
                                </a>-->
                            </div>
                        </div>
                        
                        
                    </div>
                    <!-- Icon Boxes One Style -->

                   
                </div>
            </div>
        </section>
        <!-- Our Providing Services End -->


    </main>

    <!-- Main Footer Start -->
    <div class="container footer-top-callout">
        <div class="row">
            <!-- Callout Section Side Image -->
            <div class="col-sm-12">
                <div class="callout-style-side-img d-lg-flex align-items-center">
                    <div class="img-callout">
                        <img src="<?php echo base_url(); ?>assets/images/callout_side_img.jpg" alt="">
                    </div>
                    <div class="text-callout">
                        <div class="d-md-flex align-items-center">
                            <div class="icon">
                                <i data-feather="headphones"></i>
                            </div>
                            <div class="heading">
                                <h3>Have Questions? Call Us <span class="txt-green">+1 (800) 123 456 789</span>
                                </h3>
                                <div>In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat,
                                    nec elementum ipsum convall.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Callout Section Side Image -->
        </div>
    </div>
     <?php include 'include/footer.php';?>  
    <!-- Main Footer End -->

    <!-- Search Popup Start -->
    <div class="overlay overlay-hugeinc">
        <form class="form-inline mt-2 mt-md-0">
            <div class="form-inner">
                <div class="form-inner-div d-inline-flex align-items-center no-gutters">
                    <div class="col-md-1">
                        <i class="icofont-search"></i>
                    </div>
                    <div class="col-10">
                        <input class="form-control w-100 p-0" type="text" placeholder="Search" aria-label="Search">
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="overlay-close link-oragne"><i class="icofont-close-line"></i></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Search Popup End -->

    <!-- Back To Top Start -->
    <a id="mkdf-back-to-top" href="#" class="off"><i class="icofont-rounded-up"></i></a>
    <!-- Back To Top End -->

    <!-- Jquery Library JS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/theme-plugins.min.js"></script>    
    <!-- Theme Custom FIle -->
    <script src="<?php echo base_url(); ?>assets/js/site-custom.js"></script>
</body>

<!-- Mirrored from mannatstudio.com/html/pethund/our-services.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Nov 2021 16:50:28 GMT -->
</html>