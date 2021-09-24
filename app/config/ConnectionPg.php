<?php

class ConnectionPgJoaju {
	private $conn = null;
	private $user = "temiandu";
	private $dbname = "joaju";
	private $port = "5432";
	private $password = "*sisdgm2006";
	private $host = "192.168.1.238";
	
	// conexion a la base de datos
	public function open() {
		$urlconect = "host=$this->host port=$this->port dbname=$this->dbname user=$this->user password=$this->password";
		$this->conn = pg_connect ( $urlconect ) or die ( "Error en la Consulta SQL" . pg_last_error () );
	}
	
	// desconectarse de la base de datos
	public function close() {
		$this->conn = null;
	}
	
	// ejecutar sentencia sql
	public function execute($query) {
		try {
			return pg_query ( $this->conn, $query );
		} catch ( Exception $e ) {
			echo "Error en la Consulta:" . pg_last_error ();
		}
	}

}
class ConnectionPgTemiandu {
	private $conn = null;
	private $user = "temiandu";
	private $dbname = "temiandu";
	private $port = "5432";
	private $password = "*sisdgm2006";
	private $host = "192.168.1.238";

	// conexion a la base de datos
	public function open() {
		$urlconect = "host=$this->host port=$this->port dbname=$this->dbname user=$this->user password=$this->password";
		$this->conn = pg_connect ( $urlconect ) or die ( "Error en la Consulta SQL" . pg_last_error () );
	}

	// desconectarse de la base de datos
	public function close() {
		$this->conn = null;
	}

	// ejecutar sentencia sql
	public function execute($query) {
		try {
			return pg_query ( $this->conn, $query );
		} catch ( Exception $e ) {
			echo "Error en la Consulta:" . pg_last_error ();
		}
	}

}
