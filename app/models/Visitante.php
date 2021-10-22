<?php

class Visitante {
    private $id_visitante;
    private $documento;
    private $nombre;
    private $apellido;
    private $telefono;
    private $id_nacionalidad;

    public function getId() {
        return $this->id_visitante;
    }

    public function setId($id) {
        $this->id_visitante = $id;
    }

    public function getDocumento() {
        return $this->documento;
    }

    public function setDocumento($documento) {
        $this->documento = $documento;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getIdNacionalidad() {
        return $this->id_nacionalidad;
    }

    public function setIdNacionalidad($id_nacionalidad) {
        $this->id_nacionalidad = $id_nacionalidad;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
}