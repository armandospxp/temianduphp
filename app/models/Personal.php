<?php

class Personal{
    private $login;
	private $taCodigo;
	private $taDescripcion;
	private $cedula;
	private $nombreCompleto;
	private $empty=false;

	public function getLogin() {
		return $this->login;
	}
		
	public function setLogin($login) {
		$this->empty = true;
		$this->login = $login;
	}
		
	public function getTaCodigo() {
		return $this->taCodigo;
	}
	
	public function setTaCodigo($taCodigo) {
		$this->taCodigo = $taCodigo;
	}
		
	public function getTaDescripcion() {
		return $this->taDescripcion;
	}
		
	public function setTaDescripcion($taDescripcion) {
		$this->taDescripcion = $taDescripcion;
	}
		
	public function getCedula() {
		return $this->cedula;
	}
		
	public function setCedula($cedula) {
		$this->cedula = $cedula;
	}
		
	public function getNombreCompleto() {
		return $this->nombreCompleto;
	}
		
	public function setNombreCompleto($nombreCompleto) {
		$this->nombreCompleto = $nombreCompleto;
	}
		
	public function isEmpty() {
		return $this->empty;
	}
}