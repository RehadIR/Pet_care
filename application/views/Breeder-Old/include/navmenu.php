<nav class="navbar navbar-expand-lg header-fullpage">
            <div class="container text-nowrap">
                <div class="d-flex align-items-center w-100 col p-0 logo-brand">
                    <a class="navbar-brand rounded-bottom light-bg" href="index.html">
                        <img src="<?php echo base_url(); ?>assets/images/logo-white.png" alt="">
                    </a>
                </div>
                <!-- Topbar Request Quote Start -->
                <?php /*?><div class="d-inline-flex request-btn order-lg-last col-auto p-0">
                    <a class="nav-link ml-auto" href="#" id="search_home"><i data-feather="search"></i></a>
                    <a class="nav-link ml-auto" href="#" id="shopping-bag" data-trigger="#card_mobile"><i data-feather="shopping-bag"></i> <span class="badge badge-success">0</span></a>

                    <!-- Toggle Button Start -->
                    <button class="navbar-toggler x collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Toggle Button End -->
                </div><?php */?>
                <!-- Topbar Request Quote End -->

                <div class="collapse navbar-collapse" id="navbarCollapse" data-hover="dropdown"
                    data-animations="slideInUp slideInUp slideInUp slideInUp">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>index.php/Breeder">Home</a>
                        </li>
                       <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href="index.html" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Driver<i class="icofont-thin-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo base_url(); ?>index.php/Breeder/driver">Driver</a></li>
                                <li><a class="dropdown-item" href="shop-wide.html">Assigned Delivery</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href="index.html" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Vet<i class="icofont-thin-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="shop-sidebar.html">Vet</a></li>
                                <li><a class="dropdown-item" href="shop-wide.html">Message History</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href="index.html" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Trainer<i class="icofont-thin-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="shop-sidebar.html">Trainer</a></li>
                                <li><a class="dropdown-item" href="shop-wide.html">Message History</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href="index.html" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Pets<i class="icofont-thin-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="shop-sidebar.html">All Pets</a></li>
                                <li><a class="dropdown-item" href="shop-wide.html">My Request</a></li>
                                <li><a class="dropdown-item" href="shop-wide.html">My Pets</a></li>
                                <li><a class="dropdown-item" href="shop-single.html">Customer Request</a></li>
                                <li><a class="dropdown-item" href="shop-single.html">Selling History</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle-mob" href="index.html" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Products<i class="icofont-thin-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="shop-sidebar.html">All Products</a></li>
                                <li><a class="dropdown-item" href="shop-wide.html">Shopping Cart</a></li>
                                <li><a class="dropdown-item" href="shop-single.html">Payment History</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>index.php/Breeder/logout">Logout</a>
                        </li>
                    </ul>
                    <!-- Main Navigation End -->
                </div>
            </div>
        </nav>