<?php

class Dependencia {
	private $id;
	private $jerarquia;
    private $codigo;
	private $descripcion;
	private $oficina;
	private $tipo;
	private $entidad;
	private $reparticion;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getJerarquia() {
		return $this->jerarquia;
	}

	public function setJerarquia($jerarquia) {
		$this->jerarquia = $jerarquia;
	}

	public function getCodigo() {
		return $this->codigo;
	}

	public function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	public function getDescripcion() {
		return $this->descripcion;
	}

	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}

	public function getOficina() {
		return $this->oficina;
	}

	public function setOficina($oficina) {
		$this->oficina = $oficina;
	}

	public function getTipo() {
		return $this->tipo;
	}

	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}

	public function getEntidad() {
		return $this->entidad;
	}

	public function setEntidad($entidad) {
		$this->entidad = $entidad;
	}

	public function getReparticion() {
		return $this->reparticion;
	}

	public function setReparticion($reparticion) {
		$this->reparticion = $reparticion;
	}
}