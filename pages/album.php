<!DOCTYPE html>
<?php
require_once '../php/classes/BDconnect.php';
$bd = new BDconnect();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Caritas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <?php include '../HTMLS/links.html';?>
        <link href="../css/noticia.css" rel="stylesheet" type="text/css"/>
        
        <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Arial;
    }

    /* The grid: Four equal columns that floats next to each other */
    .column {
      float: left;
      width: 25%;
      padding: 10px;
    }

    /* Style the images inside the grid */
    .column img {
      opacity: 0.8; 
      cursor: pointer; 
    }

    .column img:hover {
      opacity: 1;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Expanding image text */
    #imgtext {
      position: absolute;
      bottom: 15px;
      left: 15px;
      color: white;
      font-size: 20px;
    }

    /* Closable button inside the expanded image */
    .closebtn {
      position: absolute;
      top: 10px;
      right: 15px;
      color: white;
      font-size: 35px;
      cursor: pointer;
    }
    
    #corpo{
        background-color: #b3b3b3;
    }
    
    .carousel-item{
        margin-left: 12%;
    }
    
    #carouselExampleControls img{
        width: 200px;
        height: 80px;
    }
    
    @media (min-width: 992px) {
        #carouselExampleControls img{
            width: 200px;
            height: 130px;
        }
    }
    
    </style>
        
    </head>
    
    <body>
        <?php include '../php/cabecalho.php'; ?>

        <!-- Page Content -->
        <div id="corpo" class="container">

            <div class="row">

                <!-- Post Content Column -->
                <div class="col-lg-8 justificar">
                    
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="background-color: #9c9c9c;">
                        <div class="carousel-inner">
                            <?php
                            
                                $result = $bd->getFotosAlbum();
                                if($result != null && $result->num_rows > 0){
                                    $i = 0;
                                    echo '
                                        <div class="carousel-item active center">
                                            <div class="row">
                                    ';
                                    while($row = $result->fetch_assoc()){
                                        $imagem = $row["imagem"];
                                        if($i > 0 && $i%6 == 0){
                                            echo '
                                                <div class="carousel-item">
                                            ';
                                        }
                                        if($i > 0 && $i%3 == 0){
                                            echo '
                                                <div class="row">
                                            ';
                                        }
                                        echo '
                                            <div class="column">
                                                <img src="data:image;base64,'.$imagem.'" style="width:100%" onclick="myFunction(this);">
                                            </div>
                                        ';
                                        $i++;
                                        if($i > 0){
                                            if($i%3 == 0){
                                                echo '</div>';
                                            }
                                            if($i%6 == 0){
                                                echo '</div>';
                                            }
                                        }
                                    }
                                    
                                    if($i > 0){
                                        if($i%3 != 0){
                                            echo '</div>';
                                        }
                                        if($i%6 != 0){
                                            echo '</div>';
                                        }
                                    }
                                }
                            ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <hr style="height: 0px; border: 1px solid #002752">
                    
                    <div class="container" style="padding: 0px;">
                      <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                      <img id="expandedImg" style="width:100%">
                      <div id="imgtext"></div>
                    </div>

                </div>

                <!-- Sidebar Widgets Column -->
                <?php include '../php/slider.php'; ?>
                
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- Bootstrap core JavaScript -->
        <script src="/./Caritas/vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script>
        function myFunction(imgs) {
          var expandImg = document.getElementById("expandedImg");
          var imgText = document.getElementById("imgtext");
          expandImg.src = imgs.src;
          imgText.innerHTML = imgs.alt;
          expandImg.parentElement.style.display = "block";
        }
        </script>
        
        <?php include '../HTMLS/rodape.html';?>
    </body>
    
</html>