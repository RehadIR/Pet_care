 <?php include 'include/cheader.php';?>
        <!-- Main Navigation Start -->
        <?php include 'include/navmenu.php';?>        
        <!-- Main Navigation End -->
    </header>

    <!--<article class="card mobile-offcanvas offcanvas-right" id="card_mobile">
        <div class="shop-sidebar">
            <div class="offcanvas-header">  
                <button class="btn btn-close"> <i data-feather="x-circle"></i> </button>
            </div>
            <h3 class="head">My Cart</h3>
            <ul class="list-unstyled">
                <li>
                    <img src="<?php //echo base_url(); ?>assets/images/shop/sidebar_shop_1.jpg" alt="">
                    <div>
                        <h4><a href="shop-single.html">Lounger Dog Bed</a></h4>
                        <h6>$85</h6>
                    </div>
                    <div class="delete-btn">
                        <a href="#"><i class="icofont-close-line"></i></a>
                    </div>
                </li>
                <li>
                    <img src="<?php //echo base_url(); ?>assets/images/shop/sidebar_shop_2.jpg" alt="">
                    <div>
                        <h4><a href="shop-single.html">Sara's Doggie Treat</a></h4>
                        <h6>$45</h6>
                    </div>
                    <div class="delete-btn">
                        <a href="#"><i class="icofont-close-line"></i></a>
                    </div>
                </li>
            </ul>
            <div class="sidebar-subtotal">
                <span>Subtotal</span> 
                <strong>$130</strong>
            </div>
            <div class="btn-holder">
                <div class="col">
                    <a href="shop-cart.html" class="btn-theme bordered bg-navy-blue btn-sm btn-block">View Cart</a>
                </div>
                <div class="col">
                    <a href="shop-checkout.html" class="btn-theme bg-orange btn-shadow btn-sm btn-block">Checkout</a>
                </div>
            </div>
        </div>
    </article>-->

    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">        
        <div class="bg-navy-blue bg-fixed pos-rel breadcrumbs-page">
            <img class="ptt-png" src="<?php echo base_url(); ?>assets/images/Dot-Shape.png" alt="png">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </nav>
                <h1>Login</h1>
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
                    <small>We are here to help you <i class="pethund_repeat_grid"></i></small>
                    <span>Login </span> Here
                </h1>

                <div class="row">
                            <!-- Icon Boxes One Style -->
                    <div class="col-md-6 col-lg-6">
                        <div class="icon-box-1 d-flex">
                            <div class="icon-font">
                                <i class="pethund_petsitting"></i>
                            </div>
                            <div class="text">
                                <h3>Pets</h3>
                                <p>Pet, any animal kept by human beings as a source of companionship and pleasure.</p>
                                <a href="<?php echo base_url(); ?>index.php/login/reg" class="read-more-arrow">
                                    Click Here to Purchase Pets <span> <i class="icofont-simple-right"></i></span>
                                </a>
                            </div>
                        </div>
                        
                        
                                              
                        
                        
                        <div class="icon-box-1 d-flex">
                            <div class="icon-font">
                                <i class="pethund_pet_food"></i>
                            </div>
                            <div class="text">
                                <h3>Pet Foods</h3>
                                <p>Pet food is a specialty food for domesticated animals that is formulated according to their nutritional needs. </p>
                                <a href="<?php echo base_url(); ?>index.php/login/reg" class="read-more-arrow">
                                    Click Here to Purchase Products <span> <i class="icofont-simple-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Icon Boxes One Style -->

                   <!-- Icon Boxes One Style -->
                    <div class="col-md-6 col-lg-6">
                    <div class="error_msg" style="color:#FF0000" align="center"> <?php echo validation_errors();?></div> 
   										 <?php //echo isset($error) ? $error : ''; ?> 
    <p align="center" style="color:#FF0000"><b><?php echo @$error; ?></b></p>
                        <div class="icon-box-1 d-flex">
                            <div class="icon-font">
                                <i class="pethund_petsitting"></i>
                            </div>
                            
                            <div class="text">
                                <h3>Login</h3>
                                <p> <form method="post" id="loginForm">
         <p align="center"> <select name="role" class="form-control required">
             <option value="">-- SELECT --</option>
             <option value="1">Breeder</option>
             <option value="2">Vet</option>             
             <option value="5">Customer</option>
             <option value="6">Driver</option>
             </select>
        </p>
        <p><input type="text" name="username" value="" placeholder="Username" class="form-control"></p>
        <p><input type="password" name="password" value="" placeholder="Password" class="form-control"></p>
        <p><input type="submit" name="login" value="Login" class="btn btn-success btn-block btn-lg"></p>
        <p align="center">New User? <a href="<?php echo base_url(); ?>index.php/login/reg" class="read-more-arrow">Register Here <span> <i class="icofont-simple-right"></i></span></a></p>
      </form> </p>
                                <!--<a href="#services-single.html" class="read-more-arrow">
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
                                <div>Have a read through the rest of these pages for more specific advice. If you still have questions contact us before you trade. Waiting till after may be too late.</div>
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