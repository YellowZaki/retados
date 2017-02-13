<?php

class AccesoDatos{

	public static function borrar($pdo, $nombreTabla, $id){
		
		$valores=array(
			"id"=>$id
		);
		
		$sql = "delete from $nombreTabla WHERE ID=:id";
		$q   = $pdo->prepare($sql);
		$q->execute($valores);
	}
		
	/* Obtiene el nombre de los campos que componen $nombreTabla */
	
	public static function getCamposTabla($pdo, $nombreTabla, $ordenarCampos=false){
		
		$q = $pdo->query("PRAGMA table_info($nombreTabla)");
		$columns = array();
		foreach ($q as $k) {
			$columns[] = $k['name'];
		}
		
		if($ordenarCampos) asort($columns,3);
		return $columns;
	}
	
	public static function guardar($pdo, $nombreTabla, $valores){
		
		// Distinguimos la operación a realizar
		
		if(isset($valores['ID']) && $valores['ID']){
			$sql=self::generarActualizacion($nombreTabla, $valores);
		}
		else
		{
			unset($valores['ID']);
			$sql=self::generarInsercion($nombreTabla, $valores);
		}
		
		// Lanzamos la operación contra la BD
		
		$q = $pdo->prepare($sql);
		$q->execute($valores);
		
	}
	
	public static function recuperar($pdo, $nombreTabla, $id){
		
		$valores=array(
			"id"=>$id
		);
		
		$q = $pdo->prepare("select * from $nombreTabla where id=:id");
		$q->execute($valores);
		
		return $q->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function buscar($pdo, $nombreTabla, $camposSelect="*", $where){
		
		$q = $pdo->prepare("select $camposSelect from $nombreTabla where $where");
		$q->execute();
		
		return $q->fetch(PDO::FETCH_ASSOC);
	}
		
	public static function listar($pdo, $nombreTabla, $camposSelect){
		return $pdo->query("select $camposSelect from $nombreTabla")->fetchAll(PDO::FETCH_ASSOC);
	}

	private static function generarActualizacion($nombreTabla, $valores){

		$sqlArray = array();		
		$sql  = "UPDATE $nombreTabla SET ";
	   
		foreach($valores as $column => $value){
		   $sqlArray[] = "'$column' = :$column ";
		}
		$sql .= implode(', ', $sqlArray);
		$sql .= "WHERE ID = :ID";
	   
	   return $sql;
	}
	
	private static function generarInsercion($nombreTabla, $valores){
	   $sql  = "INSERT INTO $nombreTabla";
	   // Generamos la lista de campos
	   $sql .= " ('".implode("', '", array_keys($valores))."')";
	   // Generamos la lista de valores
	   $sql .= " VALUES (:".implode(", :", array_keys($valores)).") ";
	   
	   return $sql;
	}
}
?>
