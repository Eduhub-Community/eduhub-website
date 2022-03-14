<?php

require '../db.php';
if(isset($_SESSION['isUserLoggedIn']) && $_SESSION['isUserLoggedIn']){
  header("location: index.php");

}
if(isset($_POST['loginBtn'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $loginsel = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
  $loginque = mysqli_query($conn, $loginsel);
  $loginExistRow = mysqli_num_rows($loginque);

  if($loginExistRow == 1){
    $_SESSION['isUserLoggedIn'] = TRUE;
    $_SESSION['email'] = $email;
    header("location: index.php");
  }else{
    echo "<script> alert('invalid Email or Password') </script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Login | Codelog Admin Panel</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="email" name="email" required class="form-control" placeholder="email" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" required class="form-control" placeholder="Password">
        </div>
        <label class="checkbox">
              
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
        <button class="btn loginBtn btn-lg btn-block" name="loginBtn" type="submit">Login</button>
        
      </div>
    </form>
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="http://tksportfolio.is-best.net">Krupesh Vithlani</a>
        </div>
    </div>
  </div>


</body>

</html>
