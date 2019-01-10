<?php
include '../../Arquivos/verificaLogin.php';

$nome = $login = $data = $cargo = $telefone = $email = $foto = $imagem = $descricao = $senha = $confsenha = "";
$nomeErr = $loginErr = $dataErr = $cargoErr = $telefoneErr = $emailErr = $fotoErr = $imagemErr = $descricaoErr = $senhaErr = $confsenhaErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $validade = true;
    if(empty($_POST["nome"])) {$nomeErr = "ERRO! Insira o nome completo"; $validade = false;}
    else $nome = $_POST["nome"];
    
    if(empty($_POST["login"])) {$loginErr = "ERRO! Insira um login para acessar o site"; $validade = false;}
    else {
        $login = $_POST["login"];
        $login = $login + "@login";
    }
    
//    if(empty($_POST["dataNasc"])) {$dataErr = "ERRO! Insira a data de nascimento"; $validade = false;}
//    else $data = $_POST["dataNasc"];
    
    if(empty($_POST["cargo"])) {$cargoErr = "ERRO! Insira o seu cargo de atuação na Cáritas"; $validade = false;}
    else $cargo = $_POST["cargo"];
    
    if(empty($_POST["telefone"])) {$telefoneErr = "ERRO! Insira o telefone"; $validade = false;}
    else $telefone = $_POST["telefone"];
    
    if(empty($_POST["email"])) {$emailErr = "ERRO! Insira o email"; $validade = false;}
    else $email = $_POST["email"];
    
    if(empty($_POST["descricao"])) {$descricaoErr = "ERRO! Insira uma breve descrição"; $validade = false;}
    else $descricao = $_POST["descricao"];
    
    if(empty($_POST["senha"])) {$senhaErr = "ERRO! Insira a senha de acesso"; $validade = false;}
    else $senha = $_POST["senha"];
    
    if(empty($_POST["confSenha"])) {$confsenhaErr = "ERRO! Confirme a senha"; $validade = false;}
    else $confsenha = $_POST["confSenha"];
    
    if($senha != "" && $confsenha != ""){
        if($senha != $confsenha) {$senhaErr = "ERRO! Senhas diferentes"; $validade = false;}
    }
    
    // Preparar imagem para salvar no BD
    if (getimagesize($_FILES['image']['tmp_name']) == false){
        $fotoErr = "ERRO! Selecione uma foto para a capa";
        $validade = false;
    }else {
        $imagem = addslashes($_FILES['image']['tmp_name']);
        $name = addslashes($_FILES['image']['name']);
        $imagem = file_get_contents($imagem);
        $imagem = base64_encode($imagem);
    }
    
    if($validade){
        require_once '../../../../php/classes/BDconnect.php';
        $bd = new BDconnect();
        require_once '../../../../php/classes/UserAdmin.php';
        $admin = new UserAdmin(0, $nome, $login, $data, $cargo, $telefone, $email, $imagem, $descricao, md5($senha));
        $resultado = $bd->addUserAdmin($admin);
        if($resultado){
            header("Location: administrador.php");
            exit();
        }else{
            echo "<script>alert('Ocorreu um erro ao cadastrar os dados');</script>";
        }
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

    <title>Administrador - Caritas</title>

    <!-- Bootstrap core CSS-->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">    

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin.css" rel="stylesheet">
    
    <!-- MEU CODIGO -->
    <link href="../../css/novaNoticia.css" rel="stylesheet">
    
    <script src="/./Caritas/pages/admin/js/padrao.js"></script>
    <script>
        
        function mostraFoto(){
            var img = document.getElementById("imgshow");
            var input = document.getElementById("inpImg");

            img.src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
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
            <li class="breadcrumb-item active">Novo administrador</li>
          </ol>

          <!-- Area Chart Example-->
          <div class="card mb-3">
              
          <form method="post" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
              <div class="form-group">
                  <label>Nome completo</label><span <?php if($nomeErr != "") {echo 'class="erro">'; echo "$nomeErr";} else echo '>';?></span>
                  <input class="form-control" name="nome" value="<?php echo "$nome" ?>">
              </div>
              <div class="form-group">
                  <label>Login</label><span <?php if($loginErr != "") {echo 'class="erro">'; echo "$loginErr";} else echo '>';?></span>
                  <div class="row">
                      <input class="form-control" name="login" value="<?php echo "$login" ?>" style="width: 200px; margin-left: 10px">
                      <span style="padding: 5px; padding-right: 10px; padding-left: 10px; font-weight: bold; background-color: #d5d5d5">@login</span>
                  </div>
              </div>
              <div class="form-group">
                  <label>Cargo</label><span <?php if($cargoErr != "") {echo 'class="erro">'; echo "$cargoErr";} else echo '>';?></span>
                  <input class="form-control" name="cargo" value="<?php echo "$cargo" ?>">
              </div>
              <div class="form-group">
                  <label>Telefone</label><span <?php if($telefoneErr != "") {echo 'class="erro">'; echo "$telefoneErr";} else echo '>';?></span>
                  <input class="form-control" name="telefone" value="<?php echo "$telefone" ?>"/>
              </div>
              <div class="form-group">
                  <label>Email</label><span <?php if($emailErr != "") {echo 'class="erro">'; echo "$emailErr";} else echo '>';?></span>
                  <input class="form-control" name="email" value="<?php echo "$email" ?>">
              </div>
              <div class="form-group">
                  <label for='inpImg' class="btLabel">Selecionar uma foto</label><span <?php if($fotoErr != "") {echo 'class="erro">'; echo "$fotoErr";} else echo '>';?></span>
                  <input id="inpImg"  name="image" class="none"  type="file" accept="image/*" onchange="mostraFoto()" src="<?php echo $foto; ?>">
              </div>
              <div id="imagem">
                  <img id="imgshow" alt="Sem a foto do administrador" <?php echo 'src="data:image;base64,' . $imagem . '"'; ?> />
              </div>
              <br>
              <div class="form-group">
                  <label>Descrição</label><span <?php if($descricaoErr != "") {echo 'class="erro">'; echo "$descricaoErr";} else echo '>';?></span>
                  <textarea class="form-control" rows="8" name="descricao" style="height: 200px"><?php echo "$descricao"; ?></textarea>
              </div>
              <div class="form-group">
                  <label>Senha</label><span <?php if($senhaErr != "") {echo 'class="erro">'; echo "$senhaErr";} else echo '>';?></span>
                  <input class="form-control" name="senha" type="password">
              </div>
              <div class="form-group">
                  <label>Confirmar senha</label><span <?php if($confsenhaErr != "") {echo 'class="erro">'; echo "$confsenhaErr";} else echo '>';?></span>
                  <input class="form-control" name="confSenha" type="password">
              </div>

              <label id="lbSubmit" for="submit" class="btLabel">Enviar</label>
              <input class="none" type="submit" id="submit">
          </form>
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
