<!DOCTYPE html>
<?php 
include('admin/consultas.php');
$spon = obtieneSponActivos();
$news = obtieneNewsActivas();
$parti = obtienePartActivas();
$actis = obtieneActi();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TNT</title>

    <!-- Bootstrap CSS -->
    <link href="utilidades/boot/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="utilidades/popover/css/jquery.webui-popover.min.css">

    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><img src="img/logo.png" alt="Logo TNT" width="140px"></a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#top">HOME</a>
                    </li>
                    <li>
                        <a class="" target="_blank" href="program.pdf">PROGRAM</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#news">NEWS</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#activities">ACTIVITIES</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#sponsors">SPONSORS</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#participants">PARTICIPANTS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Home Section -->
    <section id="top" class="top-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>TNT</h1>
                    <span id="segundo">

                        Transnational Tanteidan TNT is a non-profit organization dedicated to the study of lighting 
                        culture through practical methods, mainly by engaging in fieldwork. <br><br>
                        This organization was founded to review the present state of urban lighting by walking through 
                        our streets and watching with our own eyes, and experiencing how light unfolds in place rather
                        than relying on theories, ideologies and preconceptions. <br><br>
                        TNT promotes its members to observe, detect and gather experiences by visiting examples of urban 
                        lighting to select their own “heroes” and “villains” in the urban nightscape.  Hopefully this will 
                        help them obtain a more perceptive understanding of light in urban space and how ideas and 
                        lighting techniques and technologies can bring benefits to the urban environment. <br><br>
                        TNT Lighting Detectives Forum will be held in Mexico City during November 18-22, 2015 as part of 
                        the official activities of the International Year of Light. 2015. 
                    </span>
                    <br>
                    <center><a href="program.pdf" target="-blank"><button id="programaB">PROGRAM</button></a></center>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="news" class="news-section">
        <div class="container">
            <div id="tituloNews" class="col-lg-4"><h1>NEWS</h1></div>
            <div class="row">
                <div class="col-lg-12">

                    <!-- /Carousel -->
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            
                            <?php
                                $j = 1;
                                $inicio = 1;
                                $fin = 2; 
                                foreach ($news as $new) {

                                    if($j == $inicio){
                                    ?>
                                        <div class="item <?php if($j == 1){ echo "active";} ?>">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="thumbnail">
                                                        <img src="img/news/<?php echo $new['img_news']; ?>" width="400px">
                                                            <h3><?php echo $new['titulo']; ?></h3>
                                                            <span id="icono" class="glyphicon glyphicon-calendar"><?php echo $new['fechanews'];?></span>
                                                            <?php

                                                                if(strlen($new['info']) > 350){

                                                                    $texto = substr($new['info'], 0, 350);
                                                                    $textoCom = substr($new['info'], 350);
                                                                ?>

                                                                    <p><?php echo $texto;?>...</p>
                                                                    <button type="button" id="masInfo" class="btn" data-toggle="modal" data-target="#masInfo_<?php echo $new['id']; ?>">
                         
                                                                <?php

                                                                }else{

                                                                    $texto = $new['info'];
                                                                
                                                                ?>
                                                                
                                                                    <p><?php echo $texto;?></p>
                                                                
                                                                <?php
                                                                }
                                                                $j++;
                                                                $inicio = $inicio + 2;
                                                            ?>   
                                                    </div>
                                                </div>

                                    <?php
                                    }elseif ($j == $fin) {
                                    ?>  
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="thumbnail">
                                                        <img src="img/news/<?php echo $new['img_news']; ?>" width="400px">
                                                            <h3><?php echo $new['titulo']; ?></h3>
                                                            <span id="icono" class="glyphicon glyphicon-calendar"><?php echo $new['fechanews'];?></span>
                                                            <?php

                                                                if(strlen($new['info']) > 350){

                                                                    $texto = substr($new['info'], 0, 350);
                                                                    $textoCom = substr($new['info'], 350);
                                                                ?>

                                                                    <p><?php echo $texto;?>...</p>
                                                                    <button type="button" id="masInfo" class="btn" data-toggle="modal" data-target="#masInfo_<?php echo $new['id']; ?>">MAS INFO</button>

                                                                <?php

                                                                }else{

                                                                    $texto = $new['info'];
                                                                
                                                                ?>
                                                                
                                                                    <p><?php echo $texto;?></p>
                                                                
                                                                <?php
                                                                }
                                                                $j++;
                                                                $fin = $fin + 2;
                                                            ?>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                     <div class="modal fade" id="masInfo_<?php echo $new['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><?php echo $new['titulo'];?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <center>
                                                            <?php echo "<img src='img/news/".$new['img_news']."' class='img-responsive' />";?>
                                                        </center>
                                                        <span class="glyphicon glyphicon-calendar"><?php echo $new['fechanews'];?></span>
                                                        <br><br>
                                                        <div id="textoMas"><?php echo $new['info']; ?></div>

                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                <?php
                                }

                                if(($j-1)%2 != 0){
                                ?>
                                            </div>
                                        </div>    
                                <?php
                                }
                            ?>

                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>

                    </div>
                    <!-- /Carousel -->

                </div>
            </div>
        </div>
    </section>

    <!-- Activities Section -->
    <section id="activities" class="news-section">
        <div class="container">
            <div id="tituloNews" class="col-lg-4"><h1>ACTIVITIES</h1></div>
            <div class="row">
                <div class="col-lg-12">

                    <!-- /Carousel -->
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            
                            <?php
                                $j = 1;
                                $inicio = 1;
                                $fin = 2; 
                                foreach ($actis as $acti) {

                                    if($j == $inicio){
                                    ?>
                                        <div class="item <?php if($j == 1){ echo "active";} ?>">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="thumbnail">
                                                        <img src="img/activ/<?php echo $acti['img_act']; ?>" width="400px">
                                                            <h3><?php echo $acti['titulo']; ?></h3>
                                                            <span id="icono" class="glyphicon glyphicon-calendar"><?php echo $acti['fechanews'];?></span>
                                                            <?php

                                                                if(strlen($acti['info']) > 350){

                                                                    $texto = substr($acti['info'], 0, 350);
                                                                    $textoCom = substr($acti['info'], 350);
                                                                ?>

                                                                    <p><?php echo $texto;?>...</p>
                                                                    <button type="button" id="masInfo" class="btn" data-toggle="modal" data-target="#masInfo_<?php echo $acti['id']; ?>">
                         
                                                                <?php

                                                                }else{

                                                                    $texto = $acti['info'];
                                                                
                                                                ?>
                                                                
                                                                    <p><?php echo $texto;?></p>
                                                                
                                                                <?php
                                                                }
                                                                $j++;
                                                                $inicio = $inicio + 2;
                                                            ?>   
                                                    </div>
                                                </div>

                                    <?php
                                    }elseif ($j == $fin) {
                                    ?>  
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="thumbnail">
                                                        <img src="img/activ/<?php echo $acti['img_act']; ?>" width="400px">
                                                            <h3><?php echo $acti['titulo']; ?></h3>
                                                            <span id="icono" class="glyphicon glyphicon-calendar"><?php echo $acti['fechanews'];?></span>
                                                            <?php

                                                                if(strlen($acti['info']) > 350){

                                                                    $texto = substr($acti['info'], 0, 350);
                                                                    $textoCom = substr($acti['info'], 350);
                                                                ?>

                                                                    <p><?php echo $texto;?>...</p>
                                                                    <button type="button" id="masInfo" class="btn" data-toggle="modal" data-target="#masInfo_<?php echo $acti['id']; ?>">MAS INFO</button>

                                                                <?php

                                                                }else{

                                                                    $texto = $acti['info'];
                                                                
                                                                ?>
                                                                
                                                                    <p><?php echo $texto;?></p>
                                                                
                                                                <?php
                                                                }
                                                                $j++;
                                                                $fin = $fin + 2;
                                                            ?>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                     <div class="modal fade" id="masInfo_<?php echo $acti['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><?php echo $acti['titulo'];?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <center>
                                                            <?php echo "<img src='img/activ/".$acti['img_act']."' class='img-responsive' />";?>
                                                        </center>
                                                        <span class="glyphicon glyphicon-calendar"><?php echo $acti['fechanews'];?></span>
                                                        <br><br>
                                                        <div id="textoMas"><?php echo $acti['info']; ?></div>

                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                <?php
                                }

                                if(($j-1)%2 != 0){
                                ?>
                                            </div>
                                        </div>    
                                <?php
                                }
                            ?>

                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>

                    </div>
                    <!-- /Carousel -->

                </div>
            </div>
        </div>
    </section>

    <!-- Sponsors Section -->
    <section id="sponsors" class="sponsors-section">
        <div class="container">
                <div id="tituloSponsors" class="col-lg-4"><h1>SPONSORS</h1></div>
                <div class="col-lg-12">
                    
                    <?php
                        $i = 1;
                        $inicio = 1;
                        $fin = 4; 
                        foreach ($spon as $sp) {

                                if($inicio == $i){

                                    echo '<div class="row"><div class="col-lg-3"><img src="img/spon/'.$sp['img_spo'].'" class="img-responsive" alt=""><p></p></div>';
                                    $inicio = $inicio + 4;
                                    $i++;

                                }elseif ($fin == $i){
                                    
                                    echo '<div class="col-lg-3"><img src="img/spon/'.$sp['img_spo'].'" class="img-responsive" alt=""><p></p></div></div>';
                                    $fin = $fin + 4;
                                    $i++;

                                }else{

                                    echo '<div class="col-lg-3"><img src="img/spon/'.$sp['img_spo'].'" class="img-responsive" alt=""><p></p></div>';
                                    $i++;
                                }
                        }

                        if(($i-1) % 4 != 0){

                            echo '</div>';
                        }
                    ?>
                    
                    <!--

                    <div class="row">
                        <div class="col-lg-4">
                            <img src="img/300x100.png" class="img-responsive" alt="">
                            <p></p>
                        </div>
                        <div class="col-lg-4">
                            <img src="img/300x100.png" class="img-responsive" alt="">
                            <p></p>
                        </div>
                        <div class="col-lg-4">
                            <img src="img/300x100.png" class="img-responsive" alt="">
                            <p></p>
                        </div>    
                    </div>

                    -->

                </div> 

                <!--
                <div class="col-lg-12">
                        <div class="col-lg-3">
                            <img src="img/300x100.png" class="img-responsive" alt="">
                            <p></p>
                        </div>
                        <div class="col-lg-3">
                            <img src="img/300x100.png" class="img-responsive" alt="">
                            <p></p>
                        </div>
                        <div class="col-lg-3">
                            <img src="img/300x100.png" class="img-responsive" alt="">
                            <p></p>
                        </div> 
                        <div class="col-lg-3">
                            <img src="img/300x100.png" class="img-responsive" alt="">
                            <p></p>
                        </div>    
                    </div>
                </div>   
                -->                 
        </div>
    </section>

    <!-- Program Section 
    <section id="program" class="program-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Program Section</h1>
                </div>
            </div>
        </div>
    </section>
    -->

    <!-- Participants Section -->
    <section id="participants" class="participants-section">
        <div class="container">
            <div class="row">
                <div id="tituloParti" class="col-lg-4"><h1>PARTICIPANTS</h1></div>
            </div>

                <?php 

                    foreach ($parti as $par){
                    
                    ?>
                    
                    <div class="col-lg-3">
                        <a data-toggle="modal" data-target="#participante_<?php echo $par['id'];?>"><img src="img/part/<?php echo $par['img_part'];?>" alt="" class="img-responsive"></a> 
                    </div>

                    <div class="modal fade" id="participante_<?php echo $par['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"><?php echo $par['participante']; ?></h4>
                                </div>
                                <div class="modal-body">
                                    <center>
                                        <?php echo "<img width='80%' src='img/part/".$par['img_part']."' class='img-responsive' />";?>
                                    </center>
                                    <br><br>
                                    <div id="textoMas"><?php echo $par['descripcion'];?></div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                <?php
                    }
                ?>
        </div>
    </section>

    <!-- jQuery -->
    <script src="utilidades/jquery/jquery.js"></script>

    <!-- Bootstrap JS -->
    <script src="utilidades/boot/js/bootstrap.min.js"></script>
        
    <script src="utilidades/popover/js/jquery.webui-popover.min.js"></script> 

    <!-- Scrolling Js -->
    <script src="utilidades/boot/js/jquery.easing.min.js"></script>
    <script src="js/menu.js"></script>

    <script>

        $('a#popover').webuiPopover({

            multi:false,
            closeable:true,
            arrow:true
        });

    </script>

</body>

</html>
