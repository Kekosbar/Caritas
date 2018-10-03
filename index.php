<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Caritas</title>
        
        <?php include './HTMLS/links.html';?>
        
        <!-- LINK DESTE ARQUIVO SOMENTE -->
        <link href="css/index.css" rel="stylesheet" type="text/css">
        <link href="css/album.css" rel="stylesheet">
        
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
        
        <!-- NOTICIAS
        =========================================================================================-->

        <div class="album py-5 bg-light">
            <center>
            <div id="titulo">
                <span>Notícias</span>
            </div>
            </center>
            <div class="container">

                <div class="row">
                    <div class="col-md-4">
                        <a href="#">
                        <div class="card mb-4 noticia">
                            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22208%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20208%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1662fc574fd%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A11pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1662fc574fd%22%3E%3Crect%20width%3D%22208%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2266.953125%22%20y%3D%22117.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                        <div class="card mb-4 noticia">
                            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22208%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20208%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1662fc574ff%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A11pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1662fc574ff%22%3E%3Crect%20width%3D%22208%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2266.953125%22%20y%3D%22117.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                        <div class="card mb-4 noticia">
                            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22208%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20208%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1662fc57502%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A11pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1662fc57502%22%3E%3Crect%20width%3D%22208%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2266.953125%22%20y%3D%22117.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- INDEFINIDO POR ENQUANTO
        =========================================================================================-->

        <div class="wrapper row3">
            <main class="hoc container clear"> 
                <!-- main body -->
                <!-- ################################################################################################ -->
                
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
                <!-- ################################################################################################ -->
                <!-- / main body -->
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
        
    </body>
    <script src="js/cabecalhoPegajoso.js"></script>
</html>
