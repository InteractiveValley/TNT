<?php
include ('consultas.php');
$news = obtieneNews();
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
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">NEWS <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="active"><a href="listaNews.php">Lista</a></li>
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
        
        <div class="col-lg-10 col-lg-offset-1"> 
          <div class="page-header">
            <h1>Listado de Noticias</h1>
          </div>
          
          <div class="panel panel-default">
            <!-- Table -->
            <table class="table">
              <tr>
                <th>TITULO</th>
                <th>INFORMACIÓN</th>
                <th>FECHA</th>
                <th>IMAGEN</th>
                <th>ESTADO</th>
                <th>AJUSTES</th>
              </tr>
              <?php foreach($news as $newsx):?>
              <tr>
                <td><?php echo $newsx['titulo'];?></td>
                <td><?php echo $newsx['info'];?></td>
                <td><?php echo $newsx['fechanews'];?></td>
                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ver_modal_<?php echo $newsx['id']; ?>">
                   Ver imagen
                  </button>
                </td>
                <td>
                  <label class="label label-success">Activo</label>
                </td>
                <td>
                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#desctivar_<?php echo $newsx['id']; ?>">
                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                  </button>
                  <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editar_<?php echo $newsx['id']; ?>">
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
 <?php foreach($news as $newsx):?>
    <!-- Modal -->
    <div class="modal fade" id="ver_modal_<?php echo $newsx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $newsx['titulo'];?></h4>
          </div>
          <div class="modal-body">
              <center><?php echo "<img src='../img/news/".$newsx['img_news']."' class='img-responsive' />";?></center>
          </div>
        </div>
      </div>
    </div>
<?php endforeach;?>

<?php foreach($news as $newsx):?>
    <!-- Modal -->
    <form role="form" action="desactivarNew.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="desctivar_<?php echo $newsx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">ELIMINAR</h4>
          </div>
          <div class="modal-body">
           ¿Seguro que desea eliminar la noticia?
           <input type="hidden" name="id" value="<?php echo $newsx['id']; ?>">
            <input type="hidden" name="img_new" value="<?php echo $newsx['img_news']; ?>">
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

<?php foreach($news as $newsx):?>
    <!-- Modal -->
  <form role="form" action="editarNews.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editar_<?php echo $newsx['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">EDITAR</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="ejemplo_email_1">Titulo de la noticia</label>
              <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $newsx['titulo'];?>">
            </div>
            <div class="form-group">
              <label for="ejemplo_password_1">Información de la noticia</label>
              <textarea class="form-control" id="info" name="info" rows="5"><?php echo $newsx['info'];?></textarea>
            </div>
            <div class="form-group">
              <label for="ejemplo_archivo_1">Seleccionar imagen</label>
              <p>Imagen actual: <?php echo $newsx['img_news']; ?></p>
              <input id="imagen" name="imagen_nueva" type="file" class="form-control">
              <input type="hidden" name="img_original" value="<?php echo $newsx['img_news']; ?>">
              <p class="help-block">Recuerda que la imagen se recomienda de 550x340 px.</p>
            </div>
             <input type="hidden" name="id" value="<?php echo $newsx['id']; ?>">
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
