<?php

class HistorialUsuario
{
	private $usuario;
	private $nombre;
	private $carga;
	private $ultimaFechaCarga;

	public function getUsuario()
	{
		return $this->usuario;
	}

	public function setUsuario($usuario)
	{
		$this->usuario = $usuario;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getCarga()
	{
		return $this->carga;
	}

	public function setCarga($carga)
	{
		$this->carga = $carga;
	}

	public function getUltimaFechaCarga()
	{
		return $this->ultimaFechaCarga;
	}

	public function setUltimaFechaCarga($ultimaFechaCarga)
	{
		$this->ultimaFechaCarga = $ultimaFechaCarga;
	}
}
