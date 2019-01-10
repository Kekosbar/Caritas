<?php
include '../../Arquivos/verificaLogin.php';

$titulo = $subTitulo = $autor = $texto = $categoria = $foto = $substitui = $local = $imagem = $exibeTitulo = $exibesubtitulo = "";
$tituloErr = $subTituloErr = $autorErr = $textoErr = $categoriaErr = $fotoErr = $substituiErr = $localErr = "";
$textoDiv = "";

require_once '../../../../php/classes/BDconnect.php';
$bd = new BDconnect();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $validade = true;
    if(empty($_POST["titulo"])) {$tituloErr = "ERRO! Insira um titulo a notícia"; $validade = false;}
    else $titulo = $_POST["titulo"];
    
    if(empty($_POST["subTitulo"])) {$subTituloErr = "ERRO! Insira um sub titulo a notícia"; $validade = false;}
    else $subTitulo = $_POST["subTitulo"];
    
    if(empty($_POST["autor"])) {$autorErr = "ERRO! Insira o nome do escritor da notícia"; $validade = false;}
    else $autor = $_POST["autor"];
    
    if(empty($_POST["texto"])) {$textoErr = "ERRO! Insira o texto da notícia"; $validade = false;}
    else {
        $texto = htmlspecialchars($_POST['texto']);
        // Abaixo o texto final que deverá ser salvo no BD
        $textoDiv = $_POST['texto'];
        $textoDiv = str_replace("\n","<br>",$textoDiv);
    }
    
    if(empty($_POST["categoria"])) {$categoriaErr = "ERRO! Selecione uma categoria"; $validade = false;}
    else $categoria = $_POST["categoria"];
    
    if(empty($_POST["local"])) {$localErr = "ERRO! Insira o local"; $validade = false;}
    else $local = $_POST["local"];
    
    $exibeTitulo = $_POST['tituloEx'];
    $exibesubtitulo = $_POST['subtituloEx'];
    if($exibeTitulo == "on"){
        $exibeTitulo = 1;
    }else{
        $exibeTitulo = 0;
    }
    if($exibesubtitulo == "on"){
        $exibesubtitulo = 1;
    }else{
        $exibesubtitulo = 0;
    }
    
    if($categoria == 2){
        if(empty($_POST["notSubst"])) {$substituiErr = "ERRO! Selecione a notícia que será substituida"; $validade = false;}
        else $substitui = $_POST["notSubst"];
    }
    
    // Preparar imagem para salvar no BD
    if (getimagesize($_FILES['image']['tmp_name']) == false){
        $fotoErr = "ERRO! Selecione uma foto para a capa";
        $validade = false;
    }else {
        $foto = addslashes($_FILES['image']['tmp_name']);
        $name = addslashes($_FILES['image']['name']);
        $foto = file_get_contents($foto);
        $foto = base64_encode($foto);
        $imagem = $foto;
    }
    
    // Se estiver valido envia para o BD
    if($validade){
        if ($categoria == 1) {
//            $substitui = $_COOKIE["idNoticiaPrincipalCaritas"];
            $substitui = $_POST["NoticiaPrin"];
            $bd->trocaCategoria(3, $substitui);
        }
        else if ($categoria == 2 && $substitui > 0) {
            $bd->trocaCategoria(3, $substitui);
        }
        require_once '../../../../php/classes/Noticia.php';
        $noticia = new Noticia(0, $titulo, $subTitulo, $autor, $foto, $textoDiv, $categoria, $data, $local);
        if($categoria == 4){
            $noticia->setExibeTitulo($exibeTitulo);
            $noticia->setExibesubtitulo($exibesubtitulo);
        }
        $resultado = $bd->addNoticia($noticia);
        if($resultado){
            echo '<script> alert("Dados cadastrados com sucesso"); window.location = "exibir.php"; </script>';
        }else{
            echo '<script> alert("Ocorreu um erro, tente mais tarde"); window.location = "exibir.php"; </script>';
        }
    }else{
        $foto = "";
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
    <link href="exibir.css" rel="stylesheet">

    <!-- MEU CODIGO -->
    <link href="../../css/novaNoticia.css" rel="stylesheet">
    <script>
        function mostraFoto(){
            var img = document.getElementById("imgshow");
            var input = document.getElementById("inpImg");

            img.src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
        }
    </script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../../js/trocaCorDiv.js" type="text/javascript"></script>
  
  </head>

  <body id="page-top">

      <!-- NAV -->
      <?php include '../../Arquivos/nav.php'; ?>

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
            <li class="breadcrumb-item active">Novo</li>
          </ol>
          
          <form method="post" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
              <div class="form-group">
                  <label>Título da notícia</label><span <?php if($tituloErr != "") {echo 'class="erro">'; echo "$tituloErr";} else echo '>';?></span>
                  <input class="form-control" name="titulo" value="<?php echo "$titulo" ?>">
              </div>
              <div class="form-group">
                  <label>Subtitulo da notícia</label><span <?php if($subTituloErr != "") {echo 'class="erro">'; echo "$subTituloErr";} else echo '>';?></span>
                  <input class="form-control" name="subTitulo" value="<?php echo "$subTitulo" ?>">
              </div>
              <div class="form-group">
                  <label>Autor</label><span <?php if($autorErr != "") {echo 'class="erro">'; echo "$autorErr";} else echo '>';?></span>
                  <input class="form-control" name="autor" value="<?php echo "$autor" ?>">
              </div>
              <div class="form-group">
                  <label>Local</label><span <?php if($localErr != "") {echo 'class="erro">'; echo "$localErr";} else echo '>';?></span>
                  <input class="form-control" name="local" value="<?php echo "$local" ?>">
              </div>
              <div class="form-group">
                  <label for='inpImg' class="btLabel">Selecionar uma foto</label><span <?php if($fotoErr != "") {echo 'class="erro">'; echo "$fotoErr";} else echo '>';?></span>
                  <input id="inpImg" name="image" class="none"  type="file" accept="image/*" onchange="mostraFoto()" src="<?php echo $foto; ?>">
              </div>
              <div id="imagem">
                  <img id="imgshow" alt="Sem a foto da notícia" <?php echo 'src="data:image;base64,' . $imagem . '"'; ?> />
              </div>
              <br>
              <div class="form-group">
                  <label>Notícia</label><span <?php if($textoErr != "") {echo 'class="erro">'; echo "$textoErr";} else echo '>';?></span>
                  <textarea class="form-control" rows="8" name="texto" style="height: 400px"><?php echo "$texto"; ?></textarea>
              </div>
              
              <button type="button" class="btLabel" data-toggle="modal" data-target="#selCatNoticia">
                  Selecionar categoria
              </button><span <?php if($categoriaErr != "") {echo 'class="erro">'; echo "$categoriaErr";} else echo '>';?></span>
              <br><br>

              <label id="lbSubmit" for="submit" class="btLabel">Enviar</label>
              <input class="none" type="submit" id="submit">
              <!-- Seleciona Categoria Modal-->
            <?php include '../../alertas/selecionaCategoriaNoticia.php'; ?>
          </form>
        </div>
        <!-- /.container-fluid -->
        
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Cáritas Arquidiocesana de Diamantina</span>
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
