<?php
include_once (__DIR__ . "/../config/ConnectionPgJoaju.php");
include_once (__DIR__."/../models/Personal.php");
include_once (__DIR__."/../models/Menu.php");

class PersonalCont{
    private $connPg;

    public function __construct() {
		$this->connPg = new ConnectionPgJoaju();
	}

    public function loguearse($usuario, $password){
        $personal = new Personal();
        $this->connPg->open();
        $query = "SELECT * FROM parametricos.administradores_vista WHERE admin_login='$usuario' AND admin_password='$password' AND sistema_id=2 AND estado='A'";
        $result = $this->connPg->execute($query);
        $this->connPg->close();
        $numReg = pg_num_rows($result);
        $row = pg_fetch_array($result);
        if($numReg > 0){
            $personal->setLogin($row ['admin_login'] );
            $personal->setTaCodigo($row ['tipoadmin_id'] );
            $personal->setTaDescripcion($row ['tipoadmin_descripcion'] );
            $personal->setCedula($row ['personal_cedula'] );
            $personal->setNombreCompleto($row ['funcionario'] );
        }
        return $personal;
    }

    public function obtenerMenus($tipoadmin_codigo){
        $contador=0;
        $this->connPg->open();
        $query = "SELECT modulo_id,modulo_descripcion,modulo_nombre,modulo_icono,modulo_id_padre, sistema_id, sistema_nombre, tipoadmin_id, tipoadmin_descripcion FROM 
parametricos.sistemas_modulos_vista WHERE sistema_id=6";
        $result = $this->connPg->execute($query);
        $this->connPg->close();
        $numReg = pg_num_rows($result);
        
        if($numReg > 0){
            while ( $row = pg_fetch_array($result)) {
                $menu = new Menu();
                $menu->setId($row ['modulo_id'] );
                $menu->setDescripcion($row ['modulo_descripcion'] );
                $menu->setNombre($row ['modulo_nombre'] );
                $menu->setIcono($row ['modulo_icono'] );
                $menu->setIdPadre($row ['modulo_id_padre'] );
                $menus[$contador++]= $menu;
            } 
        }
        return $menus;
    }

    public function obtenerPersonales(){
        $contador=0;
        $this->connPg->open();
        $query = "SELECT * FROM ficha_personal.personales_vista ORDER BY nombres, apellidos";
        $result = $this->connPg->execute($query);
        $this->connPg->close();
        $numReg = pg_num_rows($result);
        
        if($numReg > 0){
            while ( $row = pg_fetch_array($result)) {
                $personal = new Personal();
                $personal->setCedula($row ['cedula'] );
                $personal->setNombreCompleto($row['nombres'] . " " . $row['apellidos']);
                $personales[$contador++]= $personal;
            } 
        }
        return $personales;
    }

    public function obtenerPersonal($cedula){
        $personal = new Personal();
        $this->connPg->open();
        $query = "SELECT * FROM ficha_personal.personales_vista WHERE cedula='$cedula'";
        $result = $this->connPg->execute($query);
        $this->connPg->close();
        $numReg = pg_num_rows($result);
        $row = pg_fetch_array($result);
        if($numReg > 0){
            $personal = new Personal();
                $personal->setCedula($row ['cedula'] );
                $personal->setNombreCompleto($row ['nombres']. " ". $row ['apellidos'] );
        }
        return $personal;
    }
}