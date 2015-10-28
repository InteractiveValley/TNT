<?php

	include('conexion.php');

	//Conexion
	global $mysqli;

	$id= $_POST['id'];
	$img = $_POST['img_new'];

	//Registra el usuario
	$query_new = mysqli_query($mysqli, "DELETE FROM news WHERE id='".$id."'");

		if ($query_new) {

			$ruta = "../img/news/" . $img;
			unlink($ruta);
			
			//$idalerta = '';
			//$status = "NU";
			header ('Location: listaNews.php');
			//echo "Registro existoso y se guarda el archivo";

		} else {

			header ('Location: error.php');

		}

?>