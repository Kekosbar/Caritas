<!DOCTYPE html>
<?php
require_once './php/classes/BDconnect.php';
$bd = new BDconnect();
$bd->addVisita();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Caritas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        
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
        <link href="css/rodape.css" rel="stylesheet" type="text/css">
        
        <!-- LINK DESTE ARQUIVO SOMENTE -->
        <link href="css/index.css" rel="stylesheet" type="text/css">
        <link href="css/album.css" rel="stylesheet">
        <link href="css/carrosel.css" rel="stylesheet">
        <link href="modelos/css/custom.css" rel="stylesheet">
        <link href="modelos/css/grayscale.css" rel="stylesheet">
        
    </head>
    <body>
        <!--==========================================================================================
        CABEÇALHO
        ============================================================================================-->
        
        <?php include './php/cabecalho.php'; ?>
     
        <!--
            SOBRE A CARITAS
        =========================================================================================-->
        
        <section id="about" class="about" style="background-color: white;">
            <div class="container about_bg" style=" padding: 0;">
                <div class="row">
                    <div style="width: 500px;">
                        <img src="/./Caritas/img/caritasCasa.png" alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="about_content">
                            <h2>Seja Bem Vindo</h2>
                            <h3>Caritas Arquidiocesana de Diamantina</h3>
                            <p>A Caritas Arquidiocesana de Diamantina (CAD), fundada em 1998 é uma entidade civil de direito privado, sem fins lucrativos, de duração indeterminada, de caráter filantrópico e de assistência social, com sede no município de Diamantina</p>
                            <p>Atualmente, a Caritas atua com diversos projetos sociais que auxiliam <span id="impacto">+200 famílias</span> em torno de 34 municípios e região.</p>
                            <a class="btn know_btn">Quem Somos</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- CARROSEL DE IMAGENS-->
        <!-- =================================================================================-->
        
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                    $result = $bd->getNoticias(4);
                    if($result != null){
                        $num = 0;
                        while($row = $result->fetch_assoc()){
                            $num++;
                            $id = $row["id"];
                            $titulo = $row["titulo"];
                            $subTitulo = $row["subTitulo"];
                            $exibeTitulo = $row["exibeTitulo"];
                            $exibesubtitulo = $row["EXIBEsUBTITULO"];
                            $foto = $row["foto"];
                            echo '<div class="carousel-item';
                            if($num == 1)
                                echo ' active">';
                            else
                                echo '">';
                            echo '  <a href="pages/noticia.php?idNoticia='.$id.'">
                                    <center>
                                        <img class="alinharCent" src="data:image;base64,'.$foto.'" alt="">
                                        <div class="carousel-caption d-none d-md-block">';
                                            if($exibeTitulo == 1){
                                                echo "<h1>$titulo</h1>";
                                            }
                                            if($exibesubtitulo == 1){
                                                echo "<p>$subTitulo</p>";
                                            }
                           echo '       </div>
                                    </center>
                                    </a>
                                </div>';
                        }
                    }
                ?>
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
        
        <!-- NOTICIAS
        =========================================================================================-->

        <div class="album py-5" id="painelNoticias" style="background-color: #cbcbcb">
            <center>
            <div id="titulo">
                <span>Notícias</span>
            </div>
            </center>
            
            <div class="center" style="background-color: #eaeaea; padding-bottom: 20px">
                <?php 
                    $result = $bd->getNoticias(1);
                    if($result != null){
                        $row = $result->fetch_assoc();
                        $id = $row["id"];
                        $titulo = $row["titulo"];
                        $foto = $row["foto"];
                        $data = $row["data"];
                        $local = $row["local"];
                    }
                ?>
                <figure class="noticiaPrincipal" style="display: inline-block; ">
                    <a href="<?php echo 'pages/noticia.php?idNoticia='.$id;?>">
                        <img src="<?php if($result != null) echo 'data:image;base64,'.$foto;?>" style="width: 800px;">
                        <figcaption>
                            <span class="legenda"><?php if($result != null) echo $local; ?></span><br>
                            <?php if($result != null) echo $titulo; ?>
                        </figcaption>
                    </a>
                </figure>

                <div style="display: inline-block; padding: 20px; width: 400px; vertical-align: central">
                    <form style="padding: 30px; background-color: #fe3333; color: white;" method="post" action="php/cadastrarUser.php">
                        Cadastre o seu email e receba as mais novas notícias sobre a Cáritas
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-weight: bold; text-align: left">Nome</label>
                            <input name="nome" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome completo">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-weight: bold; text-align: left">Telefone Celular</label>
                            <input name="telefone" class="form-control" id="exampleInputPassword1" placeholder="(00) 00000-0000">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-weight: bold; text-align: left">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputPassword1" placeholder="exemplo@email.com" aria-describedby="emailHelp">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
            <!-- =================================================================================================================-->
            <?php 
                $result = $bd->getNoticias(2);
                if ($result != null) {
                    $row = $result->fetch_assoc();
                    $id = $row["id"];
                    $titulo = $row["titulo"];
                    $foto = $row["foto"];
                    $data = $row["data"];
                    $local = $row["local"];
                }
            ?>
            <div class="center" style="border-top: solid #a70202 4px; padding-top: 20px; background-color: #cbcbcb; width: 100%;  padding-bottom: 20px">
                <figure class="noticiaPrincipal">
                    <a href="<?php echo 'pages/noticia.php?idNoticia='.$id;?>">
                        <img src="<?php if($result != null) echo 'data:image;base64,'.$foto;?>" style="width: 580px; height: 400px">
                        <figcaption style="font-size: 22pt;">
                            <span class="legenda"><?php if($result != null) echo $local;?></span><br>
                            <?php if($result != null) echo $titulo;?>
                        </figcaption>
                    </a>
                </figure>
                <?php
                    if($row = $result->fetch_assoc()){
                        $id = $row["id"];
                        $titulo = $row["titulo"];
                        $foto = $row["foto"];
                        $data = $row["data"];
                        $local = $row["local"];
                    }
                ?>
                <figure class="noticiaPrincipal">
                    <a href="<?php echo 'pages/noticia.php?idNoticia='.$id;?>">
                        <img src="<?php if($row != null) echo 'data:image;base64,'.$foto;?>" style="width: 580px; height: 400px">
                        <figcaption style="font-size: 22pt;">
                            <span class="legenda"><?php if($row != null) echo $local;?></span><br>
                            <?php if($row != null) echo $titulo;?>
                        </figcaption>
                    </a>
                </figure>
            </div>
            <!-- =================================================================================================================-->
            <div id="notTerciaria" class="center">
                <div id="linha" class="row center">
                    <a href="#">
                        <div id="noticia" class="row">
                            <img src="img/noticias/IMG-20180506-WA0006.jpg">
                            <div id="escritos">
                                <span id="data">22/12/2019</span><br/>
                                <span id="titulo">Titulo da noticia</span>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div id="noticia" class="row">
                            <img src="img/noticias/IMG-20180506-WA0006.jpg">
                            <div id="escritos">
                                <span id="data">22/12/2019</span><br/>
                                <span id="titulo">Titulo da noticia</span>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div id="noticia" class="row">
                            <img src="img/noticias/IMG-20180506-WA0006.jpg">
                            <div id="escritos">
                                <span id="data">22/12/2019</span><br/>
                                <span id="titulo">Titulo da noticia</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div id="linha"class="row center">
                    <a href="#">
                        <div id="noticia" class="row">
                            <img src="img/noticias/IMG-20180506-WA0006.jpg">
                            <div id="escritos">
                                <span id="data">22/12/2019</span><br/>
                                <span id="titulo">Titulo da noticia</span>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div id="noticia" class="row">
                            <img src="img/noticias/IMG-20180506-WA0006.jpg">
                            <div id="escritos">
                                <span id="data">22/12/2019</span><br/>
                                <span id="titulo">Titulo da noticia</span>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div id="noticia" class="row">
                            <img src="img/noticias/IMG-20180506-WA0006.jpg">
                            <div id="escritos">
                                <span id="data">22/12/2019</span><br/>
                                <span id="titulo">Titulo da noticia</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <!--
            PROJETOS DA CARITAS
        ========================================================================-->
        
        <div id="projetos" class="center meuparalaxe row">
            <span id="titulo">Projetos</span><br/>
            <div class="row">
                <a href="pages/projetos/casaCirineu.php"><img src="img/BANNER - CASA DO CIRINEU.jpg"/><br/></a>
                <a href="pages/projetos/redeMargaridas.php"><img src="img/CARTAZ REDE DAS MARGARIDAS.jpg"/></a>
            </div>
        </div>
        
        <!--
            PORQUE AJUDAR A CARITAS
        ========================================================================-->
        
        <section id="why_us" class="about">
            <div class="container text-center">
                <div class="row center" style="padding-left: 10%; padding-right: 10%">
                    <div class="col-md-12">
                        <div style="width: 100%;">
                            <h2>Princípios e metas</h2>
                            <p>A Cáritas é uma instituição sem fins lucratívos, de caráter filantrópico e de assistência social.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="why_us_item">
                            <span class="fa fa-group"></span>
                            <h4>+200 famílias</h4>
                            <p>Nós ajudamos mais de 200 famílias do município de Diamantina e região, nas quais se encontram em situação de vulnerabilidade. O objetivo é ampliar ainda mais estes números</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="why_us_item">
                            <span class="fa fa-child"></span>
                            <h4>As crianças são o futuro</h4>
                            <p>A instituição conta com projetos que visam um apoio a criança e adolescente em seu desenvolvimento social, cultural e religioso.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="why_us_item">
                            <span class="fa fa-heart-o"></span>
                            <h4>Promoção da Fé</h4>
                            <p>Como uma das missões intituicionais, a promoção do Evangelho de Jesus Cristo</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="why_us_item">
                            <span class="fa fa-newspaper-o"></span>
                            <h4>Novos Projetos</h4>
                            <p>A Cáritas esta sempre em busca de novos projetos viáveis, que visem o amparo de pessoas em situações precárias</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!--
            COLABORE
        ========================================================================-->

        <section id="colaborar" class="meuparalaxe center">
            <span class="titulo">Colabore</span>
            <br/><br/><br/><br/><br/>
            Faça uma peguena colaboração a nossa causa
            <br/><br/><br/><br/><br/>
            <div id="imgsColabore" class="row center">
                <img src="img/doar.png"/>
                <div>
                    <br/><br/><br/>
                    <a href="">COLABORAR</a>
                </div>
                <img src="img/doar.png"/>
            </div>
        </section>

        <!--
            SE INSCREVA
        ========================================================================-->
        
        <section id="signup" class="signup-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <img src="img/logoCaritas.png" style="width: 25%;"/>
                        <br/>
                        <h2 class="text-white mb-5" style="font-size: 30pt;">Cadastre-se</h2>

                        <form method="post" action="php/cadastrarUser.php" class="form-inline" style="text-transform: none;">
                            <input type="text" name="nome" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" placeholder="NOME..." style="text-transform: none;">
                            <br/>
                            <input type="email" name="email" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" placeholder="EMAIL..." style="text-transform: none;">
                            <br/>
                            <input type="tel" name="telefone" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" placeholder="TELEFONE..." style="text-transform: none;">
                            <br/><br/>
                            <button type="submit" class="btn btn-primary mx-auto">CADASTRAR</button>
                        </form>

                    </div>
                </div>
            </div>
        </section>

        <!--
            ENDEREÇO E DADOS PARA CONTATO
        ========================================================================-->

        <section id="dadoscontato" class="contact-section bg-black">
            <div class="container">

                <div class="row">

                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <img src="img/icon/address.png"/>
                                <h4 class="text-uppercase" style="font-size: 16pt;">Endereço</h4>
                                <hr class="my-4">
                                <div class="small text-black-50">Praça Dom Joaquin, 16 - Centro<br/>Diamantina, MG</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <img src="img/icon/email.jpg"/>
                                <h4 class="text-uppercase m-0" style="font-size: 16pt;">Email</h4>
                                <hr class="my-4">
                                <div class="small text-black-50">
                                    <a href="#">caritasarquidiamantina@yahoo.com.br</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <img src="img/icon/phone.png"/>
                                <h4 class="text-uppercase m-0" style="font-size: 16pt;">Telefone</h4>
                                <hr class="my-4">
                                <div class="small text-black-50">(38) 3531-3583</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="social d-flex justify-content-center">
                    <a href="#" class="mx-2">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#" class="mx-2">
                        <i class="fa fa-facebook-f"></i>
                    </a>
                    <a href="#" class="mx-2">
                        <i class="fa fa-github"></i>
                    </a>
                </div>

            </div>
        </section>


        <!-- CONTATE-NOS
        ================================================================================================-->

        <section id="contatenos">
            <hr><br/>
            <div class="center">
                <span id="titulo">CONTATE-NOS</span><br/><br/>
                Envie-nos uma mensagem sobre o que você desejar. <br/>
                Faça uma pergunta, uma critica, uma análise ou deixei a sua opinião sobre o site ou a Cáritas.
                <form method="post" action="php/recebeMsm.php">
                    <div class="row">
                        <input type="text" name="nome" placeholder="Nome">
                        <input type="text" name="sobNome" class="direita" placeholder="Sobre Nome">
                    </div>
                    <div class="row">
                        <input class="completar" type="email" name="email" placeholder="Email">
                        <textarea class="completar" name="msm" rows="4" placeholder="Escreva aqui uma mensagem.."></textarea>
                        <input class="completar" id="enviar" type="submit" style="display: none"><br/>
                        <label for="enviar" class="btn btn-primary">Enviar</label>
                    </div>
                </form>
            </div>
            <br/><hr>
        </section>
        
        <?php include './HTMLS/rodape.html';?>
    </body>
    <script src="js/cabecalhoPegajoso.js"></script>
</html>
