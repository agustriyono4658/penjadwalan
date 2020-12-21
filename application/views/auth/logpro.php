<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
<link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
<link href="<?php echo base_url('css/sb-admin.css') ?>" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login Project Coordinator</div>
      <div class="card-body">
        
          <?php echo form_open('auth/pro/aksi_login') ?>
          <div class="form-group">
                <label for="name">Username*
                </label>
                <input class="form-control" type="text" name="username" placeholder="Username" />
              </div>

              <div class="form-group">
                <label for="price">Password*</label>
                <input class="form-control" type="password" name="password" placeholder="password" />
              </div>
              <input class="btn btn-primary btn-block" type="submit" name="btn" value="login" />
       <?php echo form_close() ?>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>