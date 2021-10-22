<?php

include_once (__DIR__ . "/../config/ConnectionPgTemiandu.php");
include_once (__DIR__."/../models/Visita.php");
include_once (__DIR__."/../models/ListadoVisita.php");

class VisitaCont{
    private $connPg;

    public function __construct() {
		$this->connPgTemiandu = new ConnectionPgTemiandu();
	}

    public function obtenerVisitas(){
        $contador=0;
        $this->connPgTemiandu->open();
        $query = "SELECT * FROM public.planilla_visitas";
        $result = $this->connPg->execute($query);
        $this->connPg->close();
        $numReg = pg_num_rows($result);
        
        if($numReg > 0){
            while ( $row = pg_fetch_array($result)) {
                $visita = new Visita();
                $visita->setId($row ['id'] );
                $visita->setFecha($row ['fecha_visita'] );
                $visita->setHoraEntrada($row ['hora_entrada'] );
                $visita->setHoraSalida($row ['hora_salida'] );
                $visita->setDestino($row ['id_destino'] );
                $visita->setObservaciones($row ['observaciones'] );
                $visita->setEstado($row ['estado'] );
                $visita->setUsuario($row ['usuario'] );
                $visita[$contador++]= $visita;
            } 
        }
        return $visita;
    }

    public function obtenerVisita($id){
        $visita = new Visita();
        $this->connPgTemiandu->open();
        $query = "SELECT * FROM public .planilla_visitas WHERE id_visita='$id'";
        $result = $this->connPg->execute($query);
        $this->connPg->close();
        $numReg = pg_num_rows($result);
        $row = pg_fetch_array($result);
        if($numReg > 0){
            $visita = new Visita();
            $visita->setId($row ['id'] );
            $visita->setFecha($row ['fecha_visita'] );
            $visita->setHoraEntrada($row ['hora_entrada'] );
            $visita->setHoraSalida($row ['hora_salida'] );
            $visita->setDestino($row ['id_destino'] );
            $visita->setObservaciones($row ['observaciones'] );
            $visita->setEstado($row ['estado'] );
            $visita->setUsuario($row ['usuario'] );
        }
        return $visita;
    }
    
    public function obtenerConsultaDtVisita(){
        $listado_visita = new ListadoVisita();
        $this->connPgTemiandu->open();
        $query = "SELECT * FROM public.dt_visitas";
        $result = $this->connPg->execute($query);
        $this->connPg->close();
        $numReg = pg_num_rows($result);
        $row = pg_fetch_array($result);
        if($numReg > 0){
            $visita = new ListadoVisita();
            $visita->setId($row ['id_visita'] );
            $visita->setNumeroDocumento($row ['documento'] );
            $visita->setNacionalidad($row ['nacionalidad'] );
            $visita->setDestino($row ['destino'] );
            $visita->setFecha($row ['fecha'] );
            $visita->setHoraEntrada($row ['hora_entrada'] );
            $visita->setHoraSalida($row ['hora_salida'] );
            $visita->setObservaciones($row ['observaciones'] );
        }
        return $visita;
    }

}
