<?php
$buscar = $_GET["pesquisa"];
require_once '../php/classes/BDconnect.php';
$bd = new BDconnect();
if($buscar != "")
    $result = $bd->getNoticiaPorTexto($buscar);
else
    $result = null;
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Caritas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <?php include '../HTMLS/links.html';?>
        <link href="../css/pesquisa.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <body>
        <?php include '../php/cabecalho.php'; ?>


        <!-- Page Content -->
        <div id="corpo" class="container">
            <?php
                if($result != null){
                    while($row = $result->fetch_assoc()){
                        $id = $row["id"];
                        $titulo = $row["titulo"];
                        $foto = $row["foto"];
                        $data = $row["data"];
                        echo '<div class="row">
                                <a href="noticia.php?idNoticia='.$id.'" class="row">
                                <div id="imagemNot">
                                    <img id="imgLista" src="data:image;base64,'.$foto.'"/>
                                </div>
                                <div id="tituloData">
                                    <span id="titulo">'.$titulo.'</span>
                                    <br/>
                                    '.$data.'
                                </div>
                                </a>
                            </div>
                            <hr>';
                    }
                }else{
                    echo '<span id="resultNegativo">Nenhum resultado foi encontrado</span>';
                }
            ?>
        </div>
        <!-- /.container -->

        <!-- Bootstrap core JavaScript -->
        <script src="/./Caritas/vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
        <?php include '../HTMLS/rodape.html';?>
    </body>
    <script src="/./Caritas/js/cabecalhoPegajoso.js"></script>
</html>