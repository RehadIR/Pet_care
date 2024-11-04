<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PetCare | Admin Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
.signwrapper {

  background-image: url(<?php echo base_url(); ?>assets_admin/dist/img/bg.jpg);

  background-repeat: no-repeat;

  background-position: center;

  background-attachment: fixed;

  background-size: cover;

}
</style>
<body class="hold-transition login-page" style="background-image: url(<?php echo base_url(); ?>assets_admin/dist/img/bg.jpg);background-repeat: no-repeat;background-position: center;background-attachment: fixed;background-size: cover;" >
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Pet Care</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Administrator Login</p>
                  <p align="center"<?php echo @$error; ?></p>
                        <form method="post" id="loginForm">
        <div class="input-group mb-3">
          <input type="text" placeholder="username" title="Please enter you username" value="" name="username" id="username" class="form-control" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" title="Please enter your password" placeholder="******"  value="" name="password" id="password" class="form-control" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
         <input type="submit" name="login" value="Sign in" class="btn btn-block btn-primary"/>
        <center><p class="btn btn-outline-info " style="text-align:center;"><a href="<?php echo base_url(); ?>">click Here </a>to Back</p></center>    
          </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets_admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets_admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets_admin/dist/js/adminlte.min.js"></script>

</body>
</html>
