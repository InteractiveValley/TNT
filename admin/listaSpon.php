<?php
include ('consultas.php');
$sponsors = obtieneSpon();
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
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SPONSORS <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="active"><a href="listaSpon.php">Lista</a></li>
                <li><a href="nuevaSpon.php">Añadir</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PARTICIPANTES <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="listaParticipantes.php">Lista</a></li>
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
        
        <div class="col-lg-8 col-lg-offset-2"> 
          <div class="page-header">
            <h1>Listado de Sponsors</h1>
          </div>
          <div class="panel panel-default">
            <!-- Table -->
            <table class="table">
              <tr>
                <th>NOMBRE</th>
                <th>IMAGEN</th>
                <th>ESTADO</th>
                <th>AJUSTES</th>
              </tr>
              <?php foreach($sponsors as $sponx):?>
              <tr>
                <td><?php echo $sponx['nombre'];?></td>
                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ver_modal_<?php echo $sponx['id']; ?>">
                   Ver imagen
                  </button>
                </td>
                <td>
                  <label class="label label-success">Activo</label>
                </td>
                <td>
                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#desctivar_<?php echo $sponx['id']; ?>">
                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                  </button>
                     
                  <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editar_<?php echo $sponx['id']; ?>">
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

     <?php foreach($sponsors as $sponx):?>
        <!-- Modal -->
        <div class="modal fade" id="ver_modal_<?php echo $sponx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $sponx['nombre'];?></h4>
              </div>
              <div class="modal-body">
                  <center><?php echo "<img src='../img/spon/".$sponx['img_spo']."' class='img-responsive' />";?></center>
              </div>
            </div>
          </div>
        </div>
    <?php endforeach;?>

    <?php foreach($sponsors as $sponx):?>
    <!-- Modal -->
    <form role="form" action="desactivarSpon.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="desctivar_<?php echo $sponx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">ELIMINAR</h4>
          </div>
          <div class="modal-body">
           ¿Seguro que desea eliminar el sponsor?
           <input type="hidden" name="id" value="<?php echo $sponx['id']; ?>">
           <input type="hidden" name="img_spon" value="<?php echo $sponx['img_spo']; ?>">
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

  <?php foreach($sponsors as $sponx):?>
    <!-- Modal -->
    <form role="form" action="editarSpon.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editar_<?php echo $sponx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">EDITAR</h4>
          </div>
          <div class="modal-body">
          <div class="form-group">
            <label for="ejemplo_email_1">Nombre del sponsor</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $sponx['nombre']; ?>">
          </div>
          <div class="form-group">
            <label for="ejemplo_archivo_1">Seleccionar imagen</label>
            <p>Imagen actual: <?php echo $sponx['img_spo']; ?></p>
            <input id="imagen" name="imagen_nueva" type="file" class="form-control">
            <input type="hidden" name="img_original" value="<?php echo $sponx['img_spo']; ?>">
            <p class="help-block">Recuerda que la imagen se recomienda de 300x150 px.</p>
          </div>
          <input type="hidden" name="id" value="<?php echo $sponx['id']; ?>">
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
