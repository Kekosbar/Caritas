
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Caritas Login</title>

        <?php include './HTMLS/links.html'; ?>

        <!-- Custom styles for this template -->
        <link href="css/login.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <?php include './cabecalho.php'; ?>

        <br><br>
        <div id="formulario">
            <form class="form-signin">

                <h1 class="h3 mb-3 font-weight-normal">Efetuar Login</h1>
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
        </div>
    </form>
</body>

        <?php include './HTMLS/rodape.html'; ?>
    </body>
</html>
