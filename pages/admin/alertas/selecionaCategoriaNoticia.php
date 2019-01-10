
<!-- Modal -->
<div id="selCatNoticia" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Selecionar uma categoria para a notícia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div id="one" class="card-header divRadButton">
                    <a>
                        <input id="notRadPrin" type="radio" name="categoria" value="1" <?php if($categoria == 1) echo 'checked'; ?>>
                        <label for="notRadPrin">Noticias Principal</label>
                    </a>
                </div>
                <?php 
                    $result_d = $bd->getNoticias(1);
                    if($result_d != null){
                        $row_d = $result_d->fetch_assoc();
                        $id_d = $row_d["id"];
                        $titulo_d = $row_d["titulo"];
                        $foto_d = $row_d["foto"];
                    }
                ?>
                <div class="card-body row">
                    <div id="noticia">
                        <input style="display: none" name="NoticiaPrin" value="<?php if($result_d != null) echo $id_d;?>">
                        <img height="150px" width="200px" src="<?php if($result_d != null) echo 'data:image;base64,'.$foto_d;?>"/>
                        <div class="card-header"><?php if($result_d != null) echo $titulo_d; ?></div>
                    </div>
                </div>
                <!-- ====================================================================================-->
                <div id="two" class="card-header divRadButton">
                    <a>
                        <input id="notRadSec" type="radio" name="categoria" alt="vazio" value="2" <?php if($categoria == 2) echo 'checked'; ?>>
                        <label for="notRadSec">Noticias Secundária</label>
                    </a>
                </div>
                <div class="card-body row">
                    <?php 
                        $result_d = $bd->getNoticias(2);
                        $id_d = -1;
                        if($result_d != null){
                            $row_d = $result_d->fetch_assoc();
                            $id_d = $row_d["id"];
                            $titulo_d = $row_d["titulo"];
                            $foto_d = $row_d["foto"];
                        }
                    ?>
                    <div id="noticia">
                        <input id="notSec1" type="radio" name="notSubst" value="<?php echo $id_d;?>" <?php if($substitui == $id_d) echo ' checked'; ?>>
                        <label for="notSec1">Substituir notícia</label>
                        <br>
                        <img height="150px" width="200px" alt="vazio" src="<?php if($result_d != null) echo 'data:image;base64,'.$foto_d;?>"/>
                        <div class="card-header"><?php if($result_d != null) echo $titulo_d; ?></div>
                    </div>
                    <?php
                        $id_x = -2;
                        if($row_x = $result_d->fetch_assoc()){
                            $id_x = $row_x["id"];
                            $titulo_x = $row_x["titulo"];
                            $foto_x = $row_x["foto"];
                        }
                    ?>
                    <div id="noticia">
                        <input id="notSec2" type="radio" name="notSubst" value="<?php echo $id_x;?>" <?php if($substitui == $id_x) echo ' checked'; ?>>
                        <label for="notSec2">Substituir notícia</label>
                        <br>
                        <img height="150px" width="200px" alt="Vazio" src="<?php if($result_d != null) echo 'data:image;base64,'.$foto_x;?>"/>
                        <div class="card-header"><?php if($result_d != null) echo $titulo_x; ?></div>
                    </div>
                </div>
                <!-- ====================================================================================-->
                <div id="three" class="card-header divRadButton">
                    <a>
                        <input id="notRadTer" type="radio" name="categoria" value="3" <?php if($categoria == 3) echo 'checked'; ?>>
                        <label for="notRadTer">Noticias Terciária</label>
                    </a>
                </div>
                <div class="card-body row">
                    Uma notícia de menor expressão em relação aos grupos anteriores
                </div>
                <!-- ====================================================================================-->
                <div id="three" class="card-header divRadButton">
                    <a>
                        <input id="notRadCarrosel" type="radio" name="categoria" value="4" <?php if($categoria == 4) echo 'checked'; ?>>
                        <label for="notRadCarrosel">Noticias Carrosel</label>
                    </a>
                </div>
                <div class="card-body center row">
                    <img src="../../img/carrosel.png" style="width: 50%; height: 200px"/>
                    <div style="margin-left: 10px;">
                        <input id="tituloEx" type="checkbox" name="tituloEx" checked>
                        <label for="tituloEx">Exibir titulo no carrosel</label>
                        <br/>
                        <input id="subtituloEx" type="checkbox" name="subtituloEx" checked>
                        <label for="subtituloEx">Exibir sub-titulo no carrosel</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function myFunction() {
    this.style.background="#000000";
}
</script>
