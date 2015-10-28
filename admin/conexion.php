<?php

	 //Conexion 
	 $mysqli = new mysqli("127.0.0.1", "root", "CxN1KKO9Un", "tnt");
	 $mysqli->set_charset("utf8");
 
 	if ($mysqli->connect_errno) {
 		printf("Falló la conexión: %s\n", $mysqli->connect_error);
 		exit();
 	}
 
?>
