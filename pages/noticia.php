<?php
$id = "";
if(empty($_GET["idNoticia"])) header ("Location: ../");
else $id = $_GET["idNoticia"];
require_once '../php/classes/BDconnect.php';
$bd = new BDconnect();
$result = $bd->getNoticiaPorID($id);
if ($result != null) {
    $row = $result->fetch_assoc();
    $id = $row["id"];
    $titulo = $row["titulo"];
    $subTitulo = $row["subTitulo"];
    $autor = $row["autor"];
    $foto = $row["foto"];
    $texto = $row["texto"];
    $data = $row["data"];
    $local = $row["local"];
    
    $date = new DateTime($data);
    $data = $date->format('d/m/Y H:i');
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Caritas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <?php include '../HTMLS/links.html';?>
        <link href="../css/noticia.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <body>
        <?php include '../php/cabecalho.php'; ?>


        <!-- Page Content -->
        <div id="corpo" class="container">

            <div class="row">

                <!-- Post Content Column -->
                <div class="col-lg-8 justificar">

                    <!-- Title -->
                    <h1 class="center"><?php echo $titulo?></h1>
                    <h2><?php echo $subTitulo?></h2>

                    <!-- Author -->
                    <p class="lead">
                        by
                        <a href="#"><?php echo $autor?></a>
                    </p>

                    <hr>

                    <!-- Date/Time -->
                    <p><?php echo "Postado em: $data"; ?></p>

                    <hr>

                    <!-- Preview Image -->
                    <img id="imgPrincipal" src="<?php echo 'data:image;base64,'.$foto; ?>" alt="">

                    <hr>

                    <!-- Post Content -->
                    <?php echo $texto ?>

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
        
        <?php include '../HTMLS/rodape.html';?>
    </body>
    <script src="/./Caritas/js/cabecalhoPegajoso.js"></script>
</html>