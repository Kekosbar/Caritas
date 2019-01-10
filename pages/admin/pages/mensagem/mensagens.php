<?php 
include '../../Arquivos/verificaLogin.php';

require_once '../../../../php/classes/BDconnect.php';
$bd = new BDconnect();

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Language" content="pt-br">

    <title>Administrador - Caritas</title>

    <!-- Bootstrap core CSS-->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin.css" rel="stylesheet">
    <link href="../../css/mensagens.css" rel="stylesheet">
    
    <script src="/./Caritas/pages/admin/js/padrao.js"></script>
    <script src="../../../../js/jquery.js"></script>
    <script src="../../../../js/sweetalert.js"></script>

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
            <li class="breadcrumb-item active">Mensagens</li>
          </ol>

          <!-- Area Chart Example-->
          <div id="corpo" class="card mb-3">
              <?php
              $result = $bd->getMensagens();
              if ($result != null && $result->num_rows > 0) {
                  echo '<a id="botaoDeleteTudo" class="btn btn-outline-danger" href="deletarMsm.php?id=-1">Deletar Tudo<img id="deletar" src="../../img/lixoIcon.png"></a><br/>';
                  while ($row = $result->fetch_assoc()) {
                      $id = $row["id"];
                      $nome = $row["nome"];
                      $sobrenome = $row["sobrenome"];
                      $email = $row["email"];
                      $texto = $row["texto"];
                      $data = $row["data"];
                      $date = new DateTime($data);
                      $data = $date->format('d/m/Y');

                      echo '<div class="row">
                                <div id="dadosUser">
                                    <img id="usuario" src="../../img/userIcon.jpg">
                                    <span id="data">' . $data . '</span><br/>
                                    <b>Nome:</b> ' . $nome . ' ' . $sobrenome . '<br/>
                                    <b>Email:</b> ' . $email . '<br/>
                                </div>
                                <div id="texto" class="speech-bubble">
                                    ' . $texto . '
                                    <a href="deletarMsm.php?id='.$id.'"><img id="deletar" src="../../img/lixoIcon.png"></a>
                                </div>
                            </div>
                            <hr>';
                  }
              }else{
                  echo '<span id="vazio">Não há novas mensagens</span>';
              }
              ?>
          </div>


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Caritas Arquidiocesana de Diamantina 2019</span>
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
