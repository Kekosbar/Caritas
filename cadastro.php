<!DOCTYPE html>

<?php
$firstNameErr = $emailErr = $NomeCompletoErr = $websiteErr = "";
$firstName = $email = $NomeCompleto = $estado = $cidade = $address = $senha = $confsenha = "llkl";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstName"])) {
    $firstNameErr = "O primeiro nome é obrigatório";
  } else {
    $firstName = $_POST["firstName"];
  }

  if (empty($_POST["NomeCompleto"])) {
    $NomeCompletoErr = "Insira seu nome completo";
  } else {
    $NomeCompleto = $_POST["NomeCompleto"];
  }

  if (empty($_POST["email"])) {
    $emailErr = "O campo email está vazio";
  } else {
    $email = $_POST["email"];
  }
  
  if (empty($_POST["estado"])) {
    $estado = "";
  } else {
    $estado = $_POST["estado"];
  }
  
  if (empty($_POST["cidade"])) {
    $cidade = "";
  } else {
    $cidade = $_POST["cidade"];
  }
  
  if (empty($_POST["address"])) {
    $address = "";
  } else {
    $address = $_POST["address"];
  }
  
  if (empty($_POST["senha"])) {
    $senha = "";
  } else {
    $senha = $_POST["senha"];
  }
  
  if (empty($_POST["confsenha"])) {
    $confsenha = "";
  } else {
    $confsenha = $_POST["confsenha"];
  }

}
?>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Caritas</title>

        <?php include './HTMLS/links.html'; ?>

        <!-- LINK DESTE ARQUIVO SOMENTE -->
        <link href="css/formulario.css" rel="stylesheet" type="text/css">

    </head>

    <body>
        <?php include './cabecalho.php'; ?>
        <div id="formulario" class="col-md-8 order-md-1">
            <center>
                <h1>Cadastro</h1>
                Cadastre-se no nosso site e receba emails contendo as mais novas e relevantes informações sobre as mais diversas ações e atividades da Caritas
            </center>
            <hr class="mb-4">

            <form class="needs-validation" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="row">
                    <div class="col-md-4 mb-1">
                        <label for="firstName">Primeiro Nome</label>
                        <input type="text" class="form-control" name="firstName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="NomeCompleto">Nome Completo</label>
                        <input type="text" class="form-control" name="NomeCompleto" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" name="estado" placeholder="" required="">
                        <div class="invalid-feedback">
                            Estado code required.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="estado">Cidade</label>
                        <input type="text" class="form-control" name="cidade" placeholder="" required="">
                        <div class="invalid-feedback">
                            Cidade code required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Endereço</label>
                    <input type="text" class="form-control" name="address" placeholder="Bairro, Rua exemplo 123" required="">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>
                <hr class="mb-4">
                
                <div class="mb-3">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha" placeholder="" required="">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>
                <div class="mb-1">
                    <label for="confsenha">Confirmar Senha</label>
                    <input type="password" class="form-control" name="confsenha" placeholder="" required="">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>
                <hr class="mb-4">
            
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Cadastrar</button>
            </form>
            <?php
                
                echo "$firstName <br>";
                echo "$email <br>";
                echo "$NomeCompleto <br>";
                echo "$estado <br>";
                echo "$cidade <br>";
                echo "$address <br>";
                echo "$senha <br>";
                echo "$confsenha <br>";
                echo ''+$_POST["firstName"];
                ?>
        </div>
    </body>

    <script src="js/cabecalhoPegajoso.js"></script>
</html>