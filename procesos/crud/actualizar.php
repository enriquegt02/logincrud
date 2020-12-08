<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['gastoU'],
		$_POST['cantidadU'],
		$_POST['fechaU'],
		$_POST['id']
				);

	echo $obj->actualizar($datos);
	

 ?>
