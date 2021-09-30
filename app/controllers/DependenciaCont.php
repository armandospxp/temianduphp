<?php

include_once (__DIR__ . "/../config/ConnectionPgJoaju.php");
include_once (__DIR__."/../models/Dependencia.php");

class DependenciaCont{
    private $connPg;

    public function __construct() {
		$this->connPg = new ConnectionPg();
	}

    public function obtenerDependencias(){
        $contador=0;
        $this->connPg->open();
        $query = "SELECT * FROM parametricos.dependencias_completo_vista";
        $result = $this->connPg->execute($query);
        $this->connPg->close();
        $numReg = pg_num_rows($result);
        
        if($numReg > 0){
            while ( $row = pg_fetch_array($result)) {
                $dependencia = new Dependencia();
                $dependencia->setId($row ['id'] );
                $dependencia->setJerarquia($row ['codigo_jerarquia'] );
                $dependencia->setCodigo($row ['codigo'] );
                $dependencia->setDescripcion($row ['descripcion'] );
                $dependencia->setOficina($row ['oficina'] );
                $dependencia->setTipo($row ['tipo_oficina'] );
                $dependencias[$contador++]= $dependencia;
            } 
        }
        return $dependencias;
    }

    public function obtenerDependenciasModal(){
        $contador=0;
        $this->connPg->open();
        $query = "SELECT * FROM parametricos.dependencias";
        $result = $this->connPg->execute($query);
        $this->connPg->close();
        $numReg = pg_num_rows($result);
        
        if($numReg > 0){
            while ( $row = pg_fetch_array($result)) {
                $dependencia = new Dependencia();
                $dependencia->setId($row ['dep_id'] );
                $dependencia->setEntidad($row ['ent_codigo'] );
                $dependencia->setReparticion($row ['rp_codigo'] );
                $dependencia->setCodigo($row ['dep_codigo'] );
                $dependencia->setDescripcion($row ['dep_descripcion'] );
                $dependencias[$contador++]= $dependencia;
            } 
        }
        return $dependencias;
    }

    public function obtenerDependencia($id){
        $dependencia = new Dependencia();
        $this->connPg->open();
        $query = "SELECT * FROM parametricos.dependencia WHERE dep_id='$id'";
        $result = $this->connPg->execute($query);
        $this->connPg->close();
        $numReg = pg_num_rows($result);
        $row = pg_fetch_array($result);
        if($numReg > 0){
            $dependencia = new Dependencia();
                $dependencia->setid($row ['dep_id'] );
                $dependencia->setEntidad($row ['ent_codigo'] );
                $dependencia->setReparticion($row ['rp_codigo'] );
                $dependencia->setCodigo($row ['dep_codigo'] );
        }
        return $dependencia;
    }
    

}
