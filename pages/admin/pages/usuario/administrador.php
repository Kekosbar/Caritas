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

    <title>Administrador - Caritas</title>

    <!-- Bootstrap core CSS-->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin.css" rel="stylesheet">
    <link href="exibir.css" rel="stylesheet">
    
    <script src="/./Caritas/pages/admin/js/padrao.js"></script>
    <script src="../../../../js/jquery.js"></script>
    <script src="../../../../js/sweetalert.js"></script>

    
    <script>
        import swal from 'sweetalert';

        function alerta(){
            swal("Oops", "Something went wrong!", "error");
            //alert ( "Oops, something went wrong!" );
        }
    </script>

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
            <li class="breadcrumb-item">Usuários</li>
            <li class="breadcrumb-item active">Administradores</li>
          </ol>

          <!-- Area Chart Example-->
          <div class="card mb-3">
              <div class="row" style="margin-left: 0px; padding: 5px">
                  <a href="novoAdmin.php"><button type="button" class="btn btn-outline-success">Adicionar</button></a>
              </div>
              <table class="table table-striped" style="width: 100%; max-width: 100%">
                  <thead>
                      <tr>
                          <th>Nome</th>
                          <th>Login</th>
                          <th>Email</th>
                          <th>Telefone</th>
                          <th>Opções</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $result = $bd->getUserAdmin();
                        if($result != null){
                            while ($row = $result->fetch_assoc()){
                                $id = $row["id"];
                                $nome = $row["nome"];
                                $login = $row["login"];
                                $email = $row["email"];
                                $telefone= $row["telefone"];
                                echo '<tr>
                                        <td>'.$nome.'</td>
                                        <td>'.$login.'</td>
                                        <td>'.$email.'</td>
                                        <td>'.$telefone.'</td>
                                        <td>
                                            <a href="editarAdmin.php?idAdmin='.$id.'"><button type="button" class="btn btn-outline-warning">Editar</button></a>
                                            <a href="deleteAdmin.php?idAdmin='.$id.'"><button type="button" class="btn btn-outline-danger">Deletar</button></a>
                                        </td>
                                    </tr>
                                ';
                            }
                        }
                      ?>
                      
                  </tbody>
              </table>
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

    <!-- Demo scripts for this page-->
    <script src="../../js/demo/datatables-demo.js"></script>
    <script src="../../js/demo/chart-area-demo.js"></script>

  </body>

</html>
