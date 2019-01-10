<html>
    <head>
        <meta charset="UTF-8">
        <title>Caritas Quem Somos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <?php include '../HTMLS/links.html';?>
        <link href="../css/noticia.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <style>
        img#pdf{
            width: 100px;
        }
        div#pdf{
            
            width: 150px;
            padding: 4px;
        }
        div#arquivos{
            padding: 10px;
        }
    </style>
    
    <body>
        <?php include '../php/cabecalho.php'; ?>
        
        <!-- Page Content -->
        <div id="corpo" class="container">

            <div class="row">

                <!-- Post Content Column -->
                <div class="col-lg-8 justificar">

                    <!-- Title -->
                    <h1 class="center">Biblioteca de arquivos</h1>
                    <h2>Arquivos sobre dados públicos da Cáritas</h2>

                    <hr>
                    <div class="row">
                        <?php
                        $directory = "../uploads/";
                        $dh  = opendir($directory);
                        while (false !== ($filename = readdir($dh))) {
                            $files[] = $filename;
                        }
                        sort($files);
                        $total = count($files);
                        for ($i=2; $i<$total; $i++){
                            $nome = $files[$i];
                            echo '
                            <div id="pdf">
                              <center>
                              <a href="'.$directory.$nome.'" download>
                                  <img id="pdf" src="admin/img/PDF.jpg"><br/>
                                  '.$nome.'
                              </a>
                              </center>
                            </div>';
                        }
                      ?>
                    </div>
                </div>

                <!-- Sidebar Widgets Column -->
                <?php include '../php/slider.php'; ?>

            </div>
            <!-- /.row -->

        </div>
        <?php include '../HTMLS/rodape.html';?>
    </body>
    <script src="../js/cabecalhoPegajoso.js"></script>
</html>