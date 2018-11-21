      
<?php
    $login = $senha = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["login"])) 
            $login = $_POST["login"];
        if (!empty($_POST["senha"])) 
            $senha = $_POST["senha"];
        if($login != "" && $senha != ""){
            require_once '../php/classes/BDconnect.php';
            $bd = new BDconnect();
            if($bd->login($login, $senha)) {
                //echo "<script>alert('Logado com sucesso');</script>";
                setcookie("loginCaritas",$login);
                header('Location: admin/index.html');
                exit();
            }else
                echo "<script>alert('Login ou senha inválidos');</script>";
        }
    }
?>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Caritas Login</title>

        <?php include '../HTMLS/links.html'; ?>

        <!-- Custom styles for this template -->
        <link href="../css/login.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <?php include '../php/cabecalho.php'; ?>
        
        <br><br>
        <div id="formulario">
            <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h1 class="h3 mb-3 font-weight-normal">Efetuar Login</h1>
                <label for="inputEmail" class="sr-only">Login</label>
                <input name="login" type="email" id="inputEmail" class="form-control" placeholder="Login" required autofocus>
                <label for="inputPassword" class="sr-only">Senha</label>
                <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
            </form>
        </div>
</body>

        <?php include '../HTMLS/rodape.html'; ?>
    </body>
</html>
