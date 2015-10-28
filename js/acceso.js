$(document).ready(function() {

	$("#acceso").click(function(){

		if($("#user").val() == ""){

			$("#alertas").addClass("alert alert-danger");
			$("#alertas>p").html("<center>Ingrese el usuario</center>");
			$("#alertas").show();
            $("#alertas").fadeOut(3500);

		}else if($("#pass").val() == ""){

			$("#alertas").addClass("alert alert-danger");
			$("#alertas>p").html("<center>Ingrese la contraseña</center>");
			$("#alertas").show();
            $("#alertas").fadeOut(3500);

		}else{

			if($("#user").val() == "admin" && $("#user").val() == "admin"){

				//console.log("todo bien");
				window.location.href = "inicio.php";
			}else{

				$("#alertas").addClass("alert alert-danger");
				$("#alertas>p").html("<center>Datos incorrectos</center>");
				$("#alertas").show();
            	$("#alertas").fadeOut(3500);

            	$("#user").val("");
            	$("#pass").val("");

			}
		}

	});

});