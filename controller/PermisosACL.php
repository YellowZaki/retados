<?php

use Zend\Permissions\Acl\Acl as ZendAcl;

// [https://goo.gl/FIO8M5] Zend ACL

class PermisosACL extends ZendAcl
{
	protected $defaultPrivilege = array('mostrar');
	
	public function __construct($pdo){
		$this->cargarRoles($pdo);
		$this->cargarRecursos($pdo);
		$this->asociarRecursos($pdo);
	}
	
	private function cargarRoles($pdo){
		$this->addRole('Alumno');
		$this->addRole('Profesor','Alumno');
		$this->addRole('Tutor','Profesor');
		$this->addRole('Administrativo','Tutor');
		$this->addRole('Jefe de estudios','Administrativo');
	}
	
	private function cargarRecursos($pdo){
		$this->addResource('/alumnos');
		$this->addResource('/alumnos/importar');
		
		$this->addResource('/partes');
	}
	
	private function asociarRecursos($pdo){
		$this->allow('Profesor', '/alumnos', null);
		$this->allow('Administrativo', '/alumnos/importar', null);
		$this->allow('Jefe de estudios', '/partes', null);
	}
		
}
	
?>
