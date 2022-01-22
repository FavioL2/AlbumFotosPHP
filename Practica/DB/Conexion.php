<?php
class conexion{
	private $servidor;
	private $user;
	private $pidb;
	private $password;
	public $conexion;
	public function __construct(){
		$this->user= "root";
		$this->pidb="pibd";
		$this->password="";
		$this->servidor="localhost";	
	}
	function conectar(){
		$this->conexion = new mysqli($this->servidor,$this->user,$this->password,$this->pidb) or die("error en la conexion");
		$this->conexion->set_charset("utf8");
	}
	function cerrar(){
		$this->conexion->close();
	}
}	
?>