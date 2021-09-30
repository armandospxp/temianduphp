<div class="am-header">

  <div class="am-header-left">
    <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
    <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
    <a href="home.php" class="am-logo">TEMIANDU</a>
  </div><!-- am-header-left -->

  <div class="am-header-right">
    <div class="dropdown dropdown-profile">
      <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
        <img src="../carnets/<?php echo str_pad($_SESSION ['temiandu']['cedula'], 10,"0",STR_PAD_LEFT);?>.jpg" class="wd-32 rounded-circle" alt="">
        <span class="logged-name"><span class="hidden-xs-down"><?php echo $_SESSION ['temiandu']['usuario'] ?></span> <i class="fa fa-angle-down mg-l-3"></i></span>
      </a>
      <div class="dropdown-menu wd-200">
        <ul class="list-unstyled user-profile-nav">
          <li><a href="../scripts/logout.php"><i class="icon ion-key"></i> Cambiar contraseña</a></li>
          <li><a href="../scripts/logout.php"><i class="icon ion-power"></i> Cerrar sesión</a></li>
        </ul>
      </div><!-- dropdown-menu -->
    </div><!-- dropdown -->
  </div><!-- am-header-right -->

</div><!-- am-header -->