<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Caritas</title>
        <!-- LINKS DE BOOTSTRAP -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" 
              integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="bootstrap/js/bootstrap.min.js" 
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.js"></script>
        <!-- SCRIPTS BOOTSTRAP -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- LINKS GLOBAL -->
        <link href="modelos/kelaby/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/cabecalho.css" rel="stylesheet" type="text/css">
        <!-- LINK DESTE ARQUIVO SOMENTE -->
        <link href="css/index.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php include './cabecalho.php'; ?>
        
        <!-- CARROSEL DE IMAGENS-->
        <!-- =================================================================================-->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/img.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Titulo 1</h5>
                        <p>Mensagem para o primeiro titulo</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/img2.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Titulo 2</h5>
                        <p>Mensagem para o segundo titulo</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/img3.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Titulo 3</h5>
                        <p>Mensagem para o terceiro titulo</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </body>
</html>
