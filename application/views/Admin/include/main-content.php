<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
			$con = mysql_connect("localhost","root","") or die (mysql_error());
            mysql_select_db("petcare", $con) or die (mysql_error());
            ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php $qry="select * from `breeder` where status='1'"; 
				$res = mysql_query($qry); 
				$num = mysql_num_rows($res);
				echo $num; ?></h3>

                <p>Breeder</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php $qry="select * from `vet` where status='1'"; 
				$res = mysql_query($qry); 
				$num = mysql_num_rows($res);
				echo $num; ?></h3>

                <p>Vet</p>
              </div>
              <div class="icon">
                <i class="ion ion-briefcase"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          </br>          <!-- ./col -->
          <!-- <div class="col-lg-3 col-6">
            <!-- small box 
            <!-- <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php $qry="select * from `boarding` where status='1'"; 
				$res = mysql_query($qry); 
				$num = mysql_num_rows($res);
				echo $num; ?></h3>

                <p>Boarding</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          ./col -->
           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php $qry="select * from `user` where status='1'"; 
				$res = mysql_query($qry); 
				$num = mysql_num_rows($res);
				echo $num; ?></h3>

                <p>Customer</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php $qry="select * from `driver` where status='1'"; 
				$res = mysql_query($qry); 
				$num = mysql_num_rows($res);
				echo $num; ?></h3>

                <p>Driver</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php $qry="SELECT * from admin "; 
				$res1=mysql_query($qry) or die(mysql_error());
				$rw1=mysql_fetch_array($res1);
				echo $adm_amount=$rw1['amount']; ?> Rs</h3>

                <p>Wallet</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <div class="row">
              
              <!-- /.col -->

              <?php /*?><div class="col-md-6">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Our Vets</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">8 New Members</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      <li>
                        <img src="<?php echo base_url(); ?>assets_admin/dist/img/user11-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Dr. Rajesh Mistry</a>
                        <span class="users-list-date">Today</span>
                      </li>
                      <li>
                        <img src="<?php echo base_url(); ?>assets_admin/dist/img/user88-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Dr. Norman</a>
                        <span class="users-list-date">Yesterday</span>
                      </li>
                      <li>
                        <img src="<?php echo base_url(); ?>assets_admin/dist/img/user77-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Dr. Snehal Kulkarni</a>
                        <span class="users-list-date">12 Jan</span>
                      </li>
                      <li>
                        <img src="<?php echo base_url(); ?>assets_admin/dist/img/user66-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Dr. John</a>
                        <span class="users-list-date">12 Jan</span>
                      </li>
                      <li>
                        <img src="<?php echo base_url(); ?>assets_admin/dist/img/user22-160x160.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Dr. Prashant Nair</a>
                        <span class="users-list-date">13 Jan</span>
                      </li>
                      <li>
                        <img src="<?php echo base_url(); ?>assets_admin/dist/img/user55-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Dr. Pradnya Gadgil</a>
                        <span class="users-list-date">14 Jan</span>
                      </li>
                      <li>
                        <img src="<?php echo base_url(); ?>assets_admin/dist/img/user44-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Dr. Preetha Joshi</a>
                        <span class="users-list-date">15 Jan</span>
                      </li>
                      <li>
                        <img src="<?php echo base_url(); ?>assets_admin/dist/img/user33-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Dr. Nadia M</a>
                        <span class="users-list-date">15 Jan</span>
                      </li>
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="javascript::">View All Staffs</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div><?php */?>
              <!-- /.col -->
              
            </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>