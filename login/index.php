<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
 <?php require_once('../inc/header.php') ?>
<body class="hold-transition login-page  dark-mode">
  <script>
    start_loader()
  </script>
  <style>
      body{
          width:calc(100%);
          height:calc(100%);
          background-image:url('<?= validate_image($_settings->info('cover')) ?>');
          background-repeat: no-repeat;
          background-size:cover;
      }
      #system_name{
        color:#fff;
        text-shadow: 3px 3px 3px #000;
      }
  </style>
  <center><img src="<?= validate_image($_settings->info('logo')) ?>" alt="System Logo" class="img-thumbnail rounded-circle" style="width:8rem; height:8rem;" id="logo-img"></center>
  <h2 class="text-center h4" id="system_name"><?= $_settings->info('short_name') ?></h2>
  <div class="clear-fix my-2"></div>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../" style="text-decoration:none;" class="h3"><b>Login</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="flogin-frm" action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Email or phone number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-text">
                <a href="javascript:void(0)" class="text-reset text-decoration-none pass_view"> <i class="fa fa-eye-slash"></i></a>
            </div>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row align-item-end">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <p class="mb-1">
            <a style="text-decoration:none; font-size:0.9rem;" href="<?= base_url ?>forgot_password">I forgot my password</a>
          </p>
          
          <div class="col-6">
            <a style="text-decoration:none;" href="<?= base_url ?>">Back to Site</a>
          </div>
          <div class="col-6">
            <a style="text-decoration:none;" href="<?= base_url.'register' ?>">Create an Account</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- Removed Ads -->
<script src="<?php echo base_url ?>assets/js/fwhabannerfix.js"></script>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    end_loader();
  })
  $('.pass_view').click(function(){
        var _el = $(this).closest('.input-group')
        var type = _el.find('input').attr('type')
        if(type == 'password'){
            _el.find('input').attr('type','text').focus()
            $(this).find('i.fa').removeClass('fa-eye-slash').addClass('fa-eye')
        }else{
            _el.find('input').attr('type','password').focus()
            $(this).find('i.fa').addClass('fa-eye-slash').removeClass('fa-eye')

        }
    })
</script>
</body>
</html>