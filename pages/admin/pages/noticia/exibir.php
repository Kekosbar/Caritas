<?php
include '../../Arquivos/verificaLogin.php';

require_once '../../../../php/classes/BDconnect.php';
$bd = new BDconnect();

// Clique no DELETAR
if ($_GET['fn'] == "deletar"){
    if (!empty($_GET['id'])){
        $id = $_GET['id'];
        $bd->deletarNoticia($id);
    }
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

    <title>Caritas - Administrador</title>

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
                  <?php
                    $result = $bd->getNoticias(1);
                    if($result != null){
                      $row = $result->fetch_assoc();
                      $id = $row["id"];
                      $titulo = $row["titulo"];
                      $foto = $row["foto"];
                      
                      echo '
                         <div id="noticia">
                            <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 10pt; margin-bottom: 15px;"></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="editar.php?idNoticia='.$id.'">Editar</a>
                                <a class="dropdown-item" href="?fn=deletar&id='.$id.'">Excluir</a>
                              </div>
                            </div>
                            <img height="150px" width="200px" src="data:image;base64,'.$foto.'"/>
                            <div class="card-header">'.$titulo.'</div>
                        </div> 
                        ';
                    }
                  ?>
              </div>
              <!-- ====================================================================================-->
              <div class="card-header">
                  Noticias Secundária
              </div>
              <div class="card-body row">
                  <?php
                    $result = $bd->getNoticias(2);
                    if($result != null){
                    while($row = $result->fetch_assoc()){
                      $id = $row["id"];
                      $titulo = $row["titulo"];
                      $foto = $row["foto"];
                      
                      echo '
                         <div id="noticia">
                            <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 10pt; margin-bottom: 15px;"></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="editar.php?idNoticia='.$id.'">Editar</a>
                                <a class="dropdown-item" href="?fn=deletar&id='.$id.'">Excluir</a>
                              </div>
                            </div>
                            <img height="150px" width="200px" src="data:image;base64,'.$foto.'"/>
                            <div class="card-header">'.$titulo.'</div>
                        </div> 
                        ';
                    }
                    }
                  ?>
              </div>
              <!-- ====================================================================================-->
              <div class="card-header">
                  Noticias Terciárias
              </div>
              <div class="card-body row">
                  <?php
                    $result = $bd->getNoticias(3);
                    if($result != null){
                    while($row = $result->fetch_assoc()){
                      $id = $row["id"];
                      $titulo = $row["titulo"];
                      $foto = $row["foto"];
                      
                      echo '
                         <div id="noticia">
                            <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 10pt; margin-bottom: 15px;"></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="editar.php?idNoticia='.$id.'">Editar</a>
                                <a class="dropdown-item" href="?fn=deletar&id='.$id.'">Excluir</a>
                              </div>
                            </div>
                            <img height="150px" width="200px" src="data:image;base64,'.$foto.'"/>
                            <div class="card-header">'.$titulo.'</div>
                        </div> 
                        ';
                    }
                    }
                  ?>
              </div>
              <!-- ====================================================================================-->
              <div class="card-header">
                  Noticias Carrosel
              </div>
              <div class="card-body row">
                  <?php
                    $result = $bd->getNoticias(4);
                    if($result != null){
                    while($row = $result->fetch_assoc()){
                      $id = $row["id"];
                      $titulo = $row["titulo"];
                      $foto = $row["foto"];
                      
                      echo '
                         <div id="noticia">
                            <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 10pt; margin-bottom: 15px;"></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="editar.php?idNoticia='.$id.'">Editar</a>
                                <a class="dropdown-item" href="?fn=deletar&id='.$id.'">Excluir</a>
                              </div>
                            </div>
                            <img height="150px" width="200px" src="data:image;base64,'.$foto.'"/>
                            <div class="card-header">'.$titulo.'</div>
                        </div> 
                        ';
                    }
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

    <!-- Demo scripts for this page-->
    <script src="../../js/demo/datatables-demo.js"></script>
    <script src="../../js/demo/chart-area-demo.js"></script>

  </body>

</html>
