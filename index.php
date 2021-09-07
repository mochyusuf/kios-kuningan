<?php require_once dirname(__FILE__) . "/config/config.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Kios Kuningan</title>
    <!-- Icons-->
    <link href="<?=BASE_URL;?>vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="<?=BASE_URL;?>vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?=BASE_URL;?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=BASE_URL;?>vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?=BASE_URL;?>assets/css/style.css" rel="stylesheet">
    <link href="<?=BASE_URL;?>assets/css/custom_style.css" rel="stylesheet">
    <link href="<?=BASE_URL;?>vendors/pace-progress/css/pace.min.css" rel="stylesheet">
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
          
          <div class="hidden card text-white bg-white py-5 main-image" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h4>Server Kios Kuningan</h4>
                  <img src="<?=BASE_URL?>assets/img/icon_large.png" class="img-fluid" alt="">
                </div>
              </div>
            </div>
            <div class="card p-4">
                
            <form action="action/login.php" method="post">
              <div class="card-body">
                <h1 style="text-align:center">Login</h1>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Username" name="username" required="required">
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                  <input type="password" class="form-control" placeholder="Password" name="password" required="required">
                </div>
                <div class="row">
                  <div class="col-12">
                    <input type="submit" class="btn btn-primary px-4" value="Login">
                  </div>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap and necessary plugins-->
    <script src="<?=BASE_URL;?>vendors/jquery/js/jquery.min.js"></script>
    <script src="<?=BASE_URL;?>vendors/popper.js/js/popper.min.js"></script>
    <script src="<?=BASE_URL;?>vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=BASE_URL;?>vendors/pace-progress/js/pace.min.js"></script>
    <script src="<?=BASE_URL;?>vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
    <script src="<?=BASE_URL;?>vendors/@coreui/coreui/js/coreui.min.js"></script>

  </body>
</html>