<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Administracion TNT</title>

    <!-- Bootstrap CSS -->
    <link href="../utilidades/boot/css/bootstrap.min.css" rel="stylesheet">

    <!-- Css -->
    <link href="../css/styleAdmin.css" rel="stylesheet">

  </head>

  <body>

    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Administración TNT</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="container">

      <div class="row">
        
        <div class="col-lg-8 col-lg-offset-2"> 
          <div class="page-header">
            <h1>Acceso restringido</h1>
          </div>

          <div id="alertas"><p></p></div>

          <div class="col-lg-4 col-lg-offset-4">
            
            <div class="form-group">
              <label for="ejemplo_email_1">Usuario</label>
              <input type="text" class="col-lg-4 form-control" id="user" name="user" placeholder="Escriba su usuario">
            </div>
            <br><br>
             <div class="form-group">
              <label for="ejemplo_email_1">Contraseña</label>
              <input type="password" class="col-lg-4 form-control" id="pass" name="pass" placeholder="Escriba su contraseña">
            </div>
            <br><br>
            <button type="submit" class="btn btn-default" id="acceso">Ingresar</button>

          </div>
        </div>  

      </div>

    </div> <!-- /container -->

    <!-- jQuery -->
    <script src="../utilidades/jquery/jquery.js"></script>
    <script src="../js/acceso.js"></script>

    <!-- Bootstrap JS -->
    <script src="../utilidades/boot/js/bootstrap.min.js"></script>

  </body>
</html>
