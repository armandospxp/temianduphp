<?php
include_once("../controllers/PersonalCont.php");
//$codigoAdministrador = htmlspecialchars($_SESSION['temiandu']['codigo_administrador']);
$codigoAdministrador = 6;
$personalCont = new PersonalCont();
$menus = $personalCont->obtenerMenus($codigoAdministrador);
?>

<div class="am-sideleft">

  <ul class="nav am-sideleft-tab">
    <li class="nav-item">
      <a href="#mainMenu" class="nav-link active"><i class="icon ion-ios-home-outline tx-24"></i></a>
    </li>
    <li class="nav-item">
      <a href="#mainMenu" class="nav-link"><i class="icon ion-ios-email-outline tx-24"></i></a>
    </li>
    <li class="nav-item">
      <a href="#mainMenu" class="nav-link"><i class="icon ion-ios-chatboxes-outline tx-24"></i></a>
    </li>
    <li class="nav-item">
      <a href="#mainMenu" class="nav-link"><i class="icon ion-ios-gear-outline tx-24"></i></a>
    </li>
  </ul>

  <div class="tab-content">

    <div id="mainMenu" class="tab-pane active">
      <ul class="nav am-sideleft-menu">
        <li class="nav-item"><a href="?view=Inicio" class="nav-link <?php echo $active_inicio; ?>"><i class="icon ion-ios-home-outline tx-24"></i>Inicio</a></li>
        <?php for ($i = 0; $i < count($menus); $i++) { ?>
          <?php if ($menus[$i]->getIdPadre() == 0) { ?>
            <li class="nav-item">
              
            <a class="nav-link <?php echo ${'active_' . $menus[$i]->getNombre()}; ?>" href="?view=<?php echo $menus[$i]->getNombre(); ?>">
                <i class="icon <?php echo $menus[$i]->getIcono(); ?>"></i><span><?php echo $menus[$i]->getDescripcion();?>  </span>
              </a>
              <ul class="nav-sub">
                <?php for ($j = 0; $j < count($menus); $j++) { ?>
                  <?php if ($menus[$j]->getIdPadre() == $menus[$i]->getId()) { ?>
                    <li class="nav-item">
                      <a class="nav-link <?php echo ${'active_' . $menus[$j]->getNombre()}; ?>" href="?view=<?php echo $menus[$j]->getNombre(); ?>"><?php echo $menus[$j]->getDescripcion(); ?></a>
                    </li>
                <?php }
                } ?>
              </ul>
            </li><!-- nav-item -->
        <?php }
        } ?>
      </ul>
    </div><!-- #mainMenu -->
    <div id="homeMenu" class="tab-pane"> </div><!-- #homeMenu -->
    <div id="emailMenu" class="tab-pane"> </div><!-- #emailMenu -->
    <div id="chatMenu" class="tab-pane"></div><!-- #chatMenu -->
    <div id="settingMenu" class="tab-pane"></div><!-- #settingMenu -->
  </div><!-- tab-content -->

</div><!-- am-sideleft -->