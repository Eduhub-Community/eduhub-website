<section id="container" class="">


<header class=" dark-bg">
  <div class="toggle-nav">
    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
  </div>

  <!--logo start-->
  <!-- <a href="index.html" class="logo">Codelog <span class="lite">Admin Panel</span></a> -->
  <!--logo end-->

 

  <div class="top-nav notification-row">
    <!-- notificatoin dropdown start-->
    <ul class="nav pull-right top-menu">

     
      <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="profile-ava">
                            <img alt="" src="img/avatar1_small.jpg">
                        </span>

                        <?php
$profilesel = "SELECT * FROM admin";
$profileque = mysqli_query($conn, $profilesel);
$profileName = mysqli_fetch_assoc($profileque);
                        ?>
                        <span class="username"><?= $profileName ['full name'] ?></span>
                        <b class="caret"></b>
                    </a>
        <ul class="dropdown-menu extended logout">
          <div class="log-arrow-up"></div>
          <li class="eborder-top">
            <a href="#"><i class="icon_profile"></i> My Account </a>
          </li>
         
          <li>
            <a href="../logout.php"><i class="icon_key_alt"></i> Log Out</a>
          </li>
          
        </ul>
      </li>
      <!-- user login dropdown end -->
    </ul>
    <!-- notificatoin dropdown end-->
  </div>
</header>