<?php

	include('conexion.php');

	//Conexion
	global $mysqli;

	$id= $_POST['id'];
	$img = $_POST['img_spon'];


	//Registra el usuario
	$query_new = mysqli_query($mysqli, "DELETE FROM sponsors WHERE id='".$id."'");

		if ($query_new) {

			$ruta = "../img/spon/" . $img;
			unlink($ruta);
			
			//$idalerta = '';
			//$status = "NU";
			header ('Location: listaSpon.php');
			//echo "Registro existoso y se guarda el archivo";

		} else {

			header ('Location: error.php');

		}

?>