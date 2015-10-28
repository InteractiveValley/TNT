<?php

	include('conexion.php');

	//Conexion
	global $mysqli;

	$nombre = $_POST['nombre'];

//comprobamos si ha ocurrido un error.
if ($_FILES["imagen"]["error"] > 0){
	//echo "ha ocurrido un error";
	header ('Location: error.php');
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 10000;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "../img/spon/" . $_FILES['imagen']['name'];
		//comprovamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado){
				//echo "el archivo ha sido movido exitosamente";

				//Ruta de la imagen original
				$rutaImagenOriginal=$ruta;
				
				//Creamos una variable imagen a partir de la imagen original
				$img_original = imagecreatefromjpeg($rutaImagenOriginal);
				
				//Se define el maximo ancho o alto que tendra la imagen final
				$max_ancho = 300;
				$max_alto = 150;
				
				//Ancho y alto de la imagen original
				list($ancho,$alto)=getimagesize($rutaImagenOriginal);
				
				//Se calcula ancho y alto de la imagen final
				$x_ratio = $max_ancho / $ancho;
				$y_ratio = $max_alto / $alto;
				
				//Si el ancho y el alto de la imagen no superan los maximos, 
				//ancho final y alto final son los que tiene actualmente
				if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
					$ancho_final = $ancho;
					$alto_final = $alto;
				}
				/*
				 * si proporcion horizontal*alto mayor que el alto maximo,
				 * alto final es alto por la proporcion horizontal
				 * es decir, le quitamos al alto, la misma proporcion que 
				 * le quitamos al alto
				 * 
				*/
				elseif (($x_ratio * $alto) < $max_alto){
					$alto_final = ceil($x_ratio * $alto);
					$ancho_final = $max_ancho;
				}
				/*
				 * Igual que antes pero a la inversa
				*/
				else{
					$ancho_final = ceil($y_ratio * $ancho);
					$alto_final = $max_alto;
				}
				
				//Creamos una imagen en blanco de tamaño $ancho_final  por $alto_final .
				$tmp=imagecreatetruecolor($ancho_final,$alto_final);	
				
				//Copiamos $img_original sobre la imagen que acabamos de crear en blanco ($tmp)
				imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final,$alto_final,$ancho,$alto);
				
				//Se destruye variable $img_original para liberar memoria
				imagedestroy($img_original);
				
				//Definimos la calidad de la imagen final
				$calidad=95;
				
				$nombreImg = rand(10, 99)."_img_".$nombre.".jpg";
				//Se crea la imagen final en el directorio indicado
				imagejpeg($tmp,"../img/spon/".$nombreImg,$calidad);
				
				/* SI QUEREMOS MOSTRAR LA IMAGEN EN EL NAVEGADOR
				 * 
				 * descomentamos las lineas 64 ( Header("Content-type: image/jpeg"); ) y 65 ( imagejpeg($tmp); ) 
				 * y comentamos la linea 57 ( imagejpeg($tmp,"./imagen/retoque.jpg",$calidad); )
				 */ 
				//Header("Content-type: image/jpeg");
				//imagejpeg($tmp);

				//Registra el usuario
		$query_new = mysqli_query($mysqli, "INSERT INTO sponsors (nombre,img_spo,status) VALUES ('".$nombre."','".$nombreImg."','1')");

		if ($query_new) {
			
			//$idalerta = '';
			//$status = "NU";
			//header ('Location: ../index.php?sta='.$status.'');
			//echo "Registro existoso y se guarda el archivo";
			header ('Location: listaSpon.php');
			unlink($ruta);

		} else {

			//echo "Error al subir archivo";
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
echo "Nombre: ".$nombre;
?>