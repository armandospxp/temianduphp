<?php
include_once (__DIR__ . "/../config/ConnectionPgJoaju.php");
include_once (__DIR__ . "/../config/ConnectionPgTemiandu.php");
include_once (__DIR__ . "/../controllers/PersonalCont.php");

$conexionJoaju = new ConnectionPgJoaju();
$conexionTemiandu = new ConnectionPgTemiandu();
$personalCont = new PersonalCont();


$conexionJoaju->open();
?>

//$codigoAdministrador = htmlspecialchars($_SESSION['temiandu']['codigo_administrador']);
$codigoAdministrador = 6;
$personalCont = new PersonalCont();
$menus = $personalCont->obtenerMenus($codigoAdministrador);
<?php
    <div id="mainMenu" class="tab-pane active">
          <ul class="nav am-sideleft-menu">
            <li class="nav-item"><a href="?view=Inicio" class="nav-link <?php echo $active_inicio; ?>"><i class="icon ion-ios-home-outline tx-24"></i>Inicio</a></li>
            <?php for ($i = 0; $i < count($menus); $i++) { ?>
              <?php if ($menus[$i]->getIdPadre() == 0) { ?>
                <li class="nav-item">
                  <a style="cursor:pointer;" class="nav-link active <?php echo ${'active_' . $menus[$i]->getNombre()}; ?>">
                    <i class="icon <?php echo $menus[$i]->getIcono(); ?>"></i><span><?php echo $menus[$i]->getDescripcion(); ?></span>
                  </a>
                  <ul class="nav-sub">
                    <?php for ($j = 0; $j < count($menus); $j++) { ?>
                      <?php if ($menus[$j]->getIdPadre() == $menus[$i]->getId()) { ?>
                        <li class="nav-item"><a class="nav-link <?php echo ${$menus[$j]->getNombre()}; ?>" href="?view=<?php echo $menus[$j]->getNombre(); ?>"><?php echo $menus[$j]->getDescripcion(); ?></a></li>
                    <?php }
                    } ?>
                  </ul>
                </li><!-- nav-item -->
            <?php }
            } ?>
          </ul>
        </div><!-- #mainMenu -->
?>