<?php

	include('conexion.php');

	//Conexion
	global $mysqli;

	$id= $_POST['id'];
	$img = $_POST['img_act'];

	//Registra el usuario
	$query_new = mysqli_query($mysqli, "DELETE FROM actividades WHERE id='".$id."'");

		if ($query_new) {

			$ruta = "../img/activ/" . $img;
			unlink($ruta);
			
			//$idalerta = '';
			//$status = "NU";
			header ('Location: listaActividades.php');
			//echo "Registro existoso y se guarda el archivo";

		} else {

			header ('Location: error.php');

		}

?>