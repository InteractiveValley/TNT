<?php

	include('conexion.php');

	//Conexion
	global $mysqli;

	$id= $_POST['id'];
	$img = $_POST['img_part'];

	//Registra el usuario
	$query_new = mysqli_query($mysqli, "DELETE FROM participantes WHERE id='".$id."'");

		if ($query_new) {

			$ruta = "../img/part/" . $img;
			unlink($ruta);
			
			//$idalerta = '';
			//$status = "NU";
			header ('Location: listaParticipantes.php');
			//echo "Registro existoso y se guarda el archivo";

		} else {

			header ('Location: error.php');

		}

?>