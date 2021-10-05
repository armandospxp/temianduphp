<?php

class Visita {
	private $id_visita;
	private $fecha;
    private $hora_entada;
	private $hora_salida;
	private $id_destino;
	private $observaciones;
	private $estado;
	private $id_usuario;
	private $id_visitante;

	public function getId() {
		return $this->id_visita;
	}

	public function setId($id) {
		$this->id_visita = $id;
	}

	public function getFecha() {
		return $this->fecha;
	}

	public function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	public function getHoraEntrada() {
		return $this->hora_entada;
	}

	public function setHoraEntrada($hora) {
		$this->hora_entada = $hora;
	}

	public function getHoraSalida() {
		return $this->hora_salida;
	}

	public function setHoraSalida($hora) {
		$this->hora_salida = $hora;
	}

	public function getDestino() {
		return $this->id_destino;
	}

	public function setDestino($destino) {
		$this->id_destino = $destino;
	}

	public function getObservaciones() {
		return $this->observaciones;
	}

	public function setObservaciones($observaciones) {
		$this->observaciones = $observaciones;
	}

	public function getEstado() {
		return $this->estado;
	}

	public function setEstado($estado) {
		$this->estado = $estado;
	}

	public function getIdUsuario() {
		return $this->id_usuario;
	}

	public function setUsuario($usuario) {
		$this->id_usuario = $usuario;
	}
}