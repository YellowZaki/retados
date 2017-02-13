<?php 

class Usuario {
	
	public function __construct($nombre, $email, $rol){
		$this->nombre=$nombre;
		$this->email=$email;
		$this->rol=$rol;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	public function getRol(){
		return $this->rol;
	}
	
	public function getEmail(){
		return $this->email;
	}

}
?>
