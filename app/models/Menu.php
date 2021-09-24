<?php

class Menu {
    private $id;
    private $descripcion;
	private $nombre;
	private $icono;
	private $idPadre;
	private $estado;
	
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getDescripcion() {
		return $this->descripcion;
	}

	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}
	
	public function getNombre() {
		return $this->nombre;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}
	
	public function getIcono() {
		return $this->icono;
	}

	public function setIcono($icono) {
		$this->icono = $icono;
    }
    
    public function getIdPadre() {
		return $this->idPadre;
	}

	public function setIdPadre($idPadre) {
		$this->idPadre = $idPadre;
	}

	public function getEstado() {
		return $this->estado;
	}

	public function setEstado($estado) {
		$this->estado = $estado;
	}

}