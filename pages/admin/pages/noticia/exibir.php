<?php
$login_cookie = $_COOKIE['loginCaritas'];
if(!isset($login_cookie)){
    echo "<script>alert('Você precisa estar logado para acessar este local');window.location.href='../../../login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin.css" rel="stylesheet">
    <link href="exibir.css" rel="stylesheet">

  </head>

  <body id="page-top">

      <!-- Nav -->
      <?php include '../../Arquivos/nav.html';?>

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
            <li class="breadcrumb-item">Notícias</li>
            <li class="breadcrumb-item active">Exibir</li>
          </ol>

          <!-- Area Chart Example-->
          <div class="card mb-3">
              <div class="card-header">
                  Noticias Principal
              </div>
              <div class="card-body row">
                  <div id="noticia">
                      <img height="150px" width="200px" src="../../../../img/igreja.jpg"/>
                      <div class="card-header">Titulo da notícia</div>
                  </div>
              </div>
              <!-- ====================================================================================-->
              <div class="card-header">
                  Noticias Secundária
              </div>
              <div class="card-body row">
                  <div id="noticia">
                      <img height="150px" width="200px" src="../../../../img/img.jpg"/>
                      <div class="card-header">Titulo da notícia</div>
                  </div>
                  <div id="noticia">
                      <img height="150px" width="200px" src="../../../../img/img3.jpg"/>
                      <div class="card-header">Titulo da notícia</div>
                  </div>
              </div>
              <!-- ====================================================================================-->
              <div class="card-header">
                  Noticias Terciárias
              </div>
              <div class="card-body row">
                  <div id="noticia">
                      <img height="150px" width="200px" src="../../../../img/noticias/casaDoce2.JPG"/>
                      <div class="card-header">Titulo da notícia</div>
                  </div>
                  <div id="noticia" style="width: 230px;">
                      <img height="150px" width="200px" src="../../../../img/noticias/IMG-20180506-WA0006.jpg"/>
                      <div class="card-header">Feira da economia solidária teste um titulo grande</div>
                  </div>
                  <div id="noticia">
                      <img height="150px" width="200px" src="../../../../img/noticias/casaDoce.JPG"/>
                      <div class="card-header">Titulo da notícia</div>
                  </div>
              </div>
          </div>


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
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
    <?php include '../../alertas/logout.html'; ?>

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

    <!-- Demo scripts for this page-->
    <script src="../../js/demo/datatables-demo.js"></script>
    <script src="../../js/demo/chart-area-demo.js"></script>

  </body>

</html>
