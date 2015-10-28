<?php
include ('consultas.php');
$participantes = obtienePart();
?>
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
    <style type="text/css">
      .label-success, .label-warning{
        font-size: 14px;
      }
      span{
        font-size: 18px;
      }
    </style>

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
          <a class="navbar-brand" href="inicio.php">Administración TNT</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">NEWS <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="listaNews.php">Lista</a></li>
                <li><a href="nuevaNew.php">Añadir</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SPONSORS <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="listaSpon.php">Lista</a></li>
                <li><a href="nuevaSpon.php">Añadir</a></li>
              </ul>
            </li>
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PARTICIPANTES <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="active"><a href="listaParticipantes.php">Lista</a></li>
                <li><a href="nuevoParticipante.php">Añadir</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ACTIVITIES <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="listaActividades.php">Lista</a></li>
                <li><a href="nuevaActividad.php">Añadir</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="container">

      <div class="row">
        
        <div class="col-lg-10 col-lg-offset-1"> 
          <div class="page-header">
            <h1>Listado de Participantes</h1>
          </div>
          
          <div class="panel panel-default">
            <!-- Table -->
            <table class="table">
              <tr>
                <th>PARTICIPANTE</th>
                <th>DESCRIPCIÓN</th>
                <th>IMAGEN</th>
                <th>ESTADO</th>
                <th>AJUSTES</th>
              </tr>
              <?php foreach($participantes as $part):?>
              <tr>
                <td><?php echo $part['participante'];?></td>
                <td><?php echo $part['descripcion'];?></td>
                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ver_modal_<?php echo $part['id']; ?>">
                   Ver imagen
                  </button>
                </td>
                <td>
                    <label class="label label-success">Activo</label>
                </td>
                <td>
                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#desctivar_<?php echo $part['id']; ?>">
                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                  </button>
                  <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editar_<?php echo $part['id']; ?>">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                  </button> 
                </td>
              </tr>
              <?php endforeach;?>
            </table>
          </div>     
        </div>  

      </div>
    </div> <!-- /container -->
 <?php foreach($participantes as $part):?>
    <!-- Modal -->
    <div class="modal fade" id="ver_modal_<?php echo $part['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $part['participante'];?></h4>
          </div>
          <div class="modal-body">
              <center><?php echo "<img src='../img/part/".$part['img_part']."' class='img-responsive' />";?></center>
          </div>
        </div>
      </div>
    </div>
<?php endforeach;?>

 <?php foreach($participantes as $part):?>
    <!-- Modal -->
     <form role="form" action="desactivarPart.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="desctivar_<?php echo $part['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">ELIMINAR</h4>
          </div>
          <div class="modal-body">
           ¿Seguro que desea eliminar el participante?
            <input type="hidden" name="id" value="<?php echo $part['id']; ?>">
            <input type="hidden" name="img_part" value="<?php echo $part['img_part']; ?>">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
             <button type="submit" class="btn btn-primary">Aceptar</button>
          </div>
        </div>
      </div>
    </div> 
  </form>
    <?php endforeach;?>


 <?php foreach($participantes as $part):?>
    <!-- Modal -->
     <form role="form" action="editarPart.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editar_<?php echo $part['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">ACTIVAR</h4>
          </div>
          <div class="modal-body">
          <div class="form-group">
            <label for="ejemplo_email_1">Nombre del Participante</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $part['participante']; ?>">
          </div>
          <div class="form-group">
            <label for="ejemplo_password_1">Descripción del Participante</label>
            <textarea class="form-control" id="descrip" name="descrip" rows="5"><?php echo $part['descripcion']; ?></textarea>
          </div>
          <div class="form-group">
            <label for="ejemplo_archivo_1">Seleccionar imagen</label>
            <p>Imagen actual: <?php echo $part['img_part']; ?></p>
            <input id="imagen" name="imagen_nueva" type="file" class="form-control">
            <input type="hidden" name="img_original" value="<?php echo $part['img_part']; ?>">
            <p class="help-block">Recuerda que la imagen se recomienda de 500x500 px.</p>
          </div>
            <input type="hidden" name="id" value="<?php echo $part['id']; ?>">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
             <button type="submit" class="btn btn-primary">Aceptar</button>
          </div>
        </div>
      </div>
    </div> 
  </form>
<?php endforeach;?>
    <!-- jQuery -->
    <script src="../utilidades/jquery/jquery.js"></script>

    <!-- Bootstrap JS -->
    <script src="../utilidades/boot/js/bootstrap.min.js"></script>

  </body>
</html>
