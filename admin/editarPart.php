<?php

	include('conexion.php');

	//Conexion
	global $mysqli;

	$id= $_POST['id'];
	$nombre = $_POST['nombre'];
	$descrip = $_POST['descrip'];
	$img_actual = $_POST['img_original'];


	if ($_FILES["imagen_nueva"]["error"] > 0){
				
		//Registra el usuario
		$query_new = mysqli_query($mysqli, "UPDATE participantes SET participante='".$nombre."' ,descripcion='".$descrip."' WHERE id='".$id."'");

		if ($query_new) {

			//$idalerta = '';
			//$status = "NU";
			header ('Location: listaParticipantes.php');
			//echo "Registro existoso y se guarda el archivo";

		} else {

			header ('Location: error.php');

		}

	}else{

		$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
		$limite_kb = 100000;

		if (in_array($_FILES['imagen_nueva']['type'], $permitidos) && $_FILES['imagen_nueva']['size'] <= $limite_kb * 1024){

			$ruta = "../img/part/" . $_FILES['imagen_nueva']['name'];
			$ruta_original = "../img/part/" . $img_actual;

			if (!file_exists($ruta)){

				$resultado = @move_uploaded_file($_FILES["imagen_nueva"]["tmp_name"], $ruta);
				if ($resultado){

					$rutaImagenOriginal=$ruta;

					$img_original = imagecreatefromjpeg($rutaImagenOriginal);

					$max_ancho = 550;
					$max_alto = 550;
					
					list($ancho,$alto)=getimagesize($rutaImagenOriginal);

					$x_ratio = $max_ancho / $ancho;
					$y_ratio = $max_alto / $alto;

					if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
						
						$ancho_final = $ancho;
						$alto_final = $alto;
					}elseif (($x_ratio * $alto) < $max_alto){

						$alto_final = ceil($x_ratio * $alto);
						$ancho_final = $max_ancho;
					}else{

						$ancho_final = ceil($y_ratio * $ancho);
						$alto_final = $max_alto;
					}

					$tmp=imagecreatetruecolor(550,550);	

					imagecopyresampled($tmp,$img_original,0,0,0,0,550, 550,$ancho,$alto);

					imagedestroy($img_original);

					$calidad=95;

					$nombreImg = rand(10, 99)."_img_".$nombre.".jpg";

					imagejpeg($tmp,"../img/part/".$nombreImg,$calidad);

					//Registra el usuario
					$query_new = mysqli_query($mysqli, "UPDATE participantes SET participante='".$nombre."' ,descripcion='".$descrip."',img_part='".$nombreImg."' WHERE id='".$id."'");

						if ($query_new) {

							
							//$idalerta = '';
							//$status = "NU";
							unlink($ruta_original);
							unlink($ruta);
							header ('Location: listaParticipantes.php');
							//echo "Registro existoso y se guarda el archivo";

						} else {

							header ('Location: error.php');

						}

					} else {
				//echo "ocurrio un error al mover el archivo.";
				header ('Location: error.php');
			}
		} else {
			//echo $_FILES['imagen']['name'] . ", este archivo existe";
			header ('Location: error.php');
		}
	} else {
		//echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
		header ('Location: error.php');
	}
}

?>