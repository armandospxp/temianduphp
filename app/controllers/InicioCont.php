<?php
include_once(__DIR__ . "/../config/ConnectionPg.php");
include_once(__DIR__ . "/../models/HistorialUsuario.php");

class InicioCont
{
    private $connPg;

    public function __construct()
    {
        $this->connPg = new ConnectionPg();
    }

    public function obtenerCantidadBienes()
    {
        $cantidad = 0;
        $this->connPg->open();
        $query = "SELECT count(*) AS total FROM bienes.bienes_vista";
        $result = $this->connPg->execute($query);
        $this->connPg->close();
        $numReg = pg_num_rows($result);
        $row = pg_fetch_array($result);
        if ($numReg > 0) {
            $cantidad = $row['total'];
        }
        return $cantidad;
    }

    public function obtenerCantidadBienesUltimaSemana()
    {
        $cantidad = 0;
        $this->connPg->open();
        $query = "SELECT count(*) AS total FROM bienes.bienes_vista WHERE fecha_alta BETWEEN(now()::date -'7'::integer) and now()";
        $result = $this->connPg->execute($query);
        $this->connPg->close();
        $numReg = pg_num_rows($result);
        $row = pg_fetch_array($result);
        if ($numReg > 0) {
            $cantidad = $row['total'];
        }
        return $cantidad;
    }

    public function obtenerHistorialCargaUsuario()
    {
        $contador = 0;
        $this->connPg->open();
        $query = "SELECT * FROM patrimonio.obtener_historial_carga()";
        $result = $this->connPg->execute($query);
        $this->connPg->close();
        $numReg = pg_num_rows($result);

        if ($numReg > 0) {
            while ($row = pg_fetch_array($result)) {
                $historial = new HistorialUsuario();
                $historial->setUsuario($row['usuario']);
                $historial->setNombre($row['nombre']);
                $historial->setCarga($row['carga']);
                $historial->setUltimaFechaCarga($row['fecha_ultima_carga']);
                $historiales[$contador++] = $historial;
            }
        }
        return $historiales;
    }
}
