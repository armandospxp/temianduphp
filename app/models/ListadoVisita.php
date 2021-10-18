class ListadoVisita {
	private $id_visita;
	private $numero_documento;
    private $nacionalidad;
	private $destino;
	private $fecha;
	private $hora_entrada;
	private $hora_salida;
	private $observaciones;

	public function getId() {
		return $this->id_visita;
	}

	public function setId($id) {
		$this->id_visita = $id;
	}

	public function getNumeroDocumento() {
		return $this->numero_documento;
	}

	public function setNumeroDocumento($documento) {
		$this->numero_documento = $documento;
	}

	public function getNacionalidad() {
		return $this->nacionalidad;
	}

	public function setNacionalidad($nacionalidad) {
		$this->nacionalidad = $nacionalidad;
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
}