<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

  <title>Educational Bootstrap 5 Login Page Website Tampalte</title>
</head>

<?php
include '../include/controller_login.php';
// include "../include/md5.php";

?>

<body>
  <section class="form-02-main">
    <div class="container">
      <form class="row" method="POST">
        <div class="col-md-12">
          <div class="_lk_de">
            <div class="form-03-main">
              <div class="logo">
                <img src="assets/images/user.png">
              </div>
              <div class="form-group">
                <input type="text"  name="usuario" class="form-control _ge_de_ol"  placeholder="Enter Email" required="" aria-required="true">
              </div>

              <div class="form-group">
                <input type="password" name="clave" class="form-control _ge_de_ol"  placeholder="Enter Password" required aria-required="true">
                <input type="hidden" name="tipo" value="ADMIN" class="form-control _ge_de_ol"  placeholder="Enter Email" required aria-required="true">
                <input type="hidden" name="entrar" value="entrar" class="form-control _ge_de_ol"  placeholder="Enter Email" required="" aria-required="true">
              </div>

              <!-- <div class="checkbox form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="">
                    <label class="form-check-label" for="">
                      Remember me
                    </label>
                  </div>
                  <a href="#">Forgot Password</a>
                </div> -->

              <div class="form-group">
                <!-- <div class="_btn_04"> -->
                  <!-- <a href="#">Login</a> -->
                  <!-- <input type="submit"> -->
                  <button class="_btn_04">Login</button>
                <!-- </div> -->
              </div>

              <!-- <div class="form-group nm_lk"><p>Or Login With</p></div> -->

              <!-- <div class="form-group pt-0">
                  <div class="_social_04">
                    <ol>
                      <li><i class="fa fa-facebook"></i></li>
                      <li><i class="fa fa-twitter"></i></li>
                      <li><i class="fa fa-google-plus"></i></li>
                      <li><i class="fa fa-instagram"></i></li>
                      <li><i class="fa fa-linkedin"></i></li>
                    </ol>
                  </div>
                </div> -->
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</body>

</html>