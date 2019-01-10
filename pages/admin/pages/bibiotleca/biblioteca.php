<?php
include '../../Arquivos/verificaLogin.php';

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Caritas - Administrador</title>

    <!-- Bootstrap core CSS-->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin.css" rel="stylesheet">
    <link href="../../css/novaNoticia.css" rel="stylesheet">
    
    <style>
        img#pdf{
            width: 100px;
        }
        img#deletar{
            width: 40px;
            height: 40px;
        }
        div#pdf{
            width: 150px;
            padding: 4px;
        }
        div#arquivos{
            padding: 10px;
        }
    </style>

  </head>

  <body id="page-top">

      <!-- Nav -->
      <?php include '../../Arquivos/nav.php';?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php include '../../Arquivos/sidebar.html';?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Administrador</a>
            </li>
            <li class="breadcrumb-item">Biblioteca</li>
            <li class="breadcrumb-item active">Arquivos</li>
          </ol>

          <!-- Area Chart Example-->
          <div class="card mb-3">
              <div class="card-header">
                  Anexar um novo arquivo
              </div>
              <div style="padding: 10px;">
                  <form name="form" method="post" action="salvarArquivo.php" enctype="multipart/form-data">
                    <input id="arquivo" name="arquivo" type="file" accept="application/pdf" >
                    <br/><br/>
                    <label id="lbSubmit" for="submit" class="btLabel">Enviar</label>
                    <input class="none" type="submit" id="submit">
                </form>
              </div>
              
              <div class="card-header">
                  Arquivos anexados no site
              </div>
              <div id="arquivos" class="row">
                  <?php
                    $directory = "../../../../uploads/";
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
                          <a href="deletarPDF.php?nomePdf='.$nome.'"><img id="deletar" src="../../img/lixoIcon.png"></a>
                          <a href="'.$directory.$nome.'" download>
                              <img id="pdf" src="../../img/PDF.jpg"><br/>
                              '.$nome.'
                          </a>
                          
                          </center>
                        </div>';
                    }
                  ?>
              </div>
          </div>


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Cáritas Arquidiocesana de Diamantina 2019</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include '../../alertas/logout.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../../vendor/chart.js/Chart.min.js"></script>
    <script src="../../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin.min.js"></script>

  </body>

</html>
