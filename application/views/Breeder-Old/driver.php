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
                <h1>List Driver</h1>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- Our Providing Services Start -->
        <section class="wide-tb-100">
            <div class="container">
                
                 <?php $user = $this->session->userdata('user'); ?>
                   
                   <p align="right"><?php //echo "Hai, ".$u_name = $row->name; ?></p>
                   
                <div class="row">
                <a href="<?php echo base_url(); ?>index.php/Breeder/adddriver"><input type="submit" value="+ Add Driver" class="btn btn-success float-right"></a>
                <p>&nbsp;</p>
                   <table width="100%" class="table table-bordered table-striped datatable" id="myTable">
              <thead>
                  <tr>
                      <th style="width: 1%">#</th>
                      <th style="width: 15%">Name</th>
                      <th style="width: 15%">Gender</th>
                      <th style="width: 20%">Contact Details</th>
                      <th style="width: 31%">Address</th>
                      <th style="width: 15%"></th>
                      
                  </tr>
              </thead>
              <tbody>
              <?php 
				  $i=1;
				  foreach($data as $row)
				  { ?>
                  <tr>
                      <td><?php echo $i; ?></td>
                      <td><a><?php echo $row->name; ?></a></td>
                      <?php /*?><td><?php $loc_id=$row->loc_id;
					  $qry = "select * from `location` WHERE loc_id='$loc_id'";
                      $res = mysql_query($qry);
					  $rw=mysql_fetch_array($res);
					  echo $rw['location']; 
					  ?></td><?php */?>
                      <td><a><?php echo $row->gender; ?></a></td>
                      <td>
                      <span class="badge badge-success"><?php echo $row->email; ?></span>
                     <span class="badge badge-success"><?php echo $row->contactno; ?></span></td>
                      <td><?php echo $row->address; ?></td>
                      <td>
                       <?php /*?><?php $stat=$row->status; 
					   //echo $stat;
					   if($stat==1)
					   {?>
                       <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>index.php/admin/unapprovedrdata?d_id=<?php echo $row->d_id; ?>">Approved</a>
                        <?php }
					   else
					   {?>
                       <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>index.php/admin/approvedrdata?d_id=<?php echo $row->d_id; ?>">Unapproved</a> 
                       <?php }
					   ?><?php */?>
                         <!--<a class="btn btn-info btn-sm" href="<?php //echo base_url(); ?>index.php/admin/peditdata?d_id=<?php //echo $row->d_id; ?>">Edit</a>-->
                          <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>index.php/admin/deleteddata?d_id=<?php echo $row->d_id; ?>">Delete</a>                       </td> 
                  </tr>
                  <?php
                  $i++;
				  }
				 ?>
              </tbody>
          </table>

                   
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