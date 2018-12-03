<!DOCTYPE html>

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
        
    </head>
    <body>
        <!--==========================================================================================
        CABEÇALHO
        ============================================================================================-->
        
        <?php include './php/cabecalho.php'; ?>
        
        <!-- CARROSEL DE IMAGENS-->
        <!-- =================================================================================-->
        
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <center>
                    <img class="alinharCent" src="img/BANNER - CASA DO CIRINEU.jpg" alt="First slide">
                    </center>
                </div>
                <div class="carousel-item">
                    <img class="alinharCent" src="img/carrosel/CARTAZ - 2018.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <center>
                        <img class="alinharCent" src="img/carrosel/apicultores.JPG" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Apicultores</h1>
                        <p>Auxiliamos apicultores de Diamantina e região</p>
                    </div>
                    </center>
                </div>
                <div class="carousel-item">
                    <center>
                        <img class="alinharCent" src="img/carrosel/feira.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Feira de Economia Solidária</h1>
                        <p></p>
                    </div>
                    </center>
                </div>
                <div class="carousel-item">
                    <center>
                        <img class="alinharCent" src="img/carrosel/oficina.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Oficina de capacitação</h1>
                        <p></p>
                    </div>
                    </center>
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
        
        <!-- NOTICIAS
        =========================================================================================-->

        <?php
            require_once './php/classes/BDconnect.php';
            $bd = new BDconnect();
        ?>
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
                <form style="padding: 30px; background-color: #fe3333; color: white;">
                    Cadastre o seu email e receba as mais novas notícias sobre a Cáritas
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="font-weight: bold; text-align: left">Nome</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome completo">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="font-weight: bold; text-align: left">Email</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="exemplo@email.com">
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
            <div style="background-color: #eaeaea; border-top: solid green 4px; ">
                <div class="container" style="padding-top: 20px; ">

                    <div class="row">
                        <div class="col-md-4 noticia">
                            <a href="pages/noticia1.php">
                                <div class="card mb-4" id="interna">
                                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="img/noticias/IMG-20180506-WA0006.jpg" data-holder-rendered="true">
                                <div class="card-body tituloNot">
                                    <p class="card-text">A Feira de Economia Solidária ocorreu neste sábado, 15/09/2018, na praça do mercado velho</p>
                                    <div class="d-flex justify-content-between align-items-center" style="bottom: 0; position: absolute; font-weight: bolder; font-size: 12pt">
                                        <small class="text-muted">12/22/2018</small>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-4 noticia">
                            <a href="pages/noticia2.php">
                            <div class="card mb-4 noticia" id="interna">
                                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="img/noticias/casaDoce.JPG" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                <div class="card-body tituloNot">
                                    <p class="card-text">Exemplo de notícia, Casa do Doce.....</p>
                                    <div class="d-flex justify-content-between align-items-center" style="bottom: 0; position: absolute; font-weight: bolder; font-size: 12pt">
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-4 noticia">
                            <a href="pages/noticia.php">
                            <div class="card mb-4 noticia" id="interna">
                                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22208%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20208%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1662fc57502%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A11pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1662fc57502%22%3E%3Crect%20width%3D%22208%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2266.953125%22%20y%3D%22117.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                <div class="card-body tituloNot">
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <div class="d-flex justify-content-between align-items-center" style="bottom: 0; position: absolute; font-weight: bolder; font-size: 12pt">
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- START THE FEATURETTES -->
        
        <hr class="featurette-divider">

        <div class="row featurette meuparalaxe">
          <div class="col-md-7">
            <h2 class="featurette-heading">Somos Solidaridade. Somos Cáritas! <span class="text-muted">Construindo um mundo melhor</span></h2>
            <p class="lead">A Cáritas atualmente auxilia mais de 100 famílias do município de Diamantina e região com programas e projetos sociais</p>
          </div>
          <div class="col-md-5">
              <img class="featurette-image img-fluid mx-auto" src="img/casa.jpg" data-src="holder.js/500x500/auto" alt="Generic placeholder image" >
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette meuparalaxe">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Exemplo incompleto <span class="text-muted">exemplo.</span></h2>
            <p class="lead">.......</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="img/imgExemplo.png" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette meuparalaxe">
          <div class="col-md-7">
            <h2 class="featurette-heading">Trilhamos um longo caminho. <span class="text-muted">Participe desta jornada</span></h2>
            <p class="lead">Venha nos ajudar a trilhar este caminho. Seja um voluntário da casa em algum dos nosso projetos ou faça uma pequena contribuição à instituição</p>
          </div>
          <div class="col-md-5">
              <img class="featurette-image img-fluid mx-auto" src="img/caminho.jpg" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">
        
        
        <div class="center">
            <figure id="container">
                <img src="img/fundoArvore.jpg" />  
                <figcaption>Colabore com a Cáritas e vem fazer parte da construção de um novo dia
                    <center>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" id="doeAgora">Doe Agora</button>
                    </center>
                </figcaption>
            </figure>
        </div>
        
        
        
        
        
        <!-- INDEFINIDO POR ENQUANTO
        =========================================================================================-->
<!--
        <div class="wrapper row3">
            <main class="hoc container clear"> 
                <!-- main body -->
                <!-- ################################################################################################ 
                
                <ul class="nospace services">
                    <li></li>
                    <li class="one_third first">
                        <article class="bgded overlay" style="background-image:url('images/demo/320x340.png');">
                            <div class="txtwrap"><i class="block fa fa-4x fa-jsfiddle"></i>
                                <h6 class="heading">Venenatis</h6>
                                <p>Pharetra sed felis vivamus in nulla varius mauris vitae semper justo […]</p>
                                <footer><a href="#">More »</a></footer>
                            </div>
                        </article>
                    </li>
                    <li class="one_third">
                        <article class="bgded overlay" style="background-image:url('images/demo/320x340.png');">
                            <div class="txtwrap"><i class="block fa fa-4x fa-language"></i>
                                <h6 class="heading">Sollicitudin</h6>
                                <p>Elementum interdum odio morbi quam turpis tincidunt in ipsum commodo […]</p>
                                <footer><a href="#">More »</a></footer>
                            </div>
                        </article>
                    </li>
                    <li class="one_third">
                        <article class="bgded overlay" style="background-image:url('images/demo/320x340.png');">
                            <div class="txtwrap"><i class="block fa fa-4x fa-lastfm"></i>
                                <h6 class="heading">Vestibulum</h6>
                                <p>Scelerisque odio praesent a purus vel nulla semper interdum ut eget […]</p>
                                <footer><a href="#">More »</a></footer>
                            </div>
                        </article>
                    </li>
                </ul>
                <!-- ################################################################################################ 
                <!-- / main body 
                <div class="clear"></div>
            </main>
        </div>
        
        <!-- PARCEIROS
        ================================================================================================-->
        
        <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/04.png');">
            <section class="hoc container clear"> 
                <center><h1>Parceiros</h1></center>
                <!-- ################################################################################################ -->
                <ul class="nospace group center">
                    <li class="one_quarter first">
                        <h6 class="heading font-x3">Our Clients</h6>
                    </li>
                    <li class="one_quarter"><i class="block btmspace-10 fa fa-4x fa-recycle"></i> Venenatis</li>
                    <li class="one_quarter"><i class="block btmspace-10 fa fa-4x fa-rebel"></i> Malesuada</li>
                    <li class="one_quarter"><i class="block btmspace-10 fa fa-4x fa-connectdevelop"></i> Fermentum</li>
                </ul>
                <!-- ################################################################################################ -->
            </section>
        </div>
        
        <?php include './HTMLS/rodape.html';?>
    </body>
    <script src="js/cabecalhoPegajoso.js"></script>
</html>
