
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
                    <a href="#one">
                        <input id="notRadPrin" type="radio" name="categoria" value="1" <?php if($categoria == 1) echo 'checked'; ?>>
                        <label for="notRadPrin">Noticias Principal</label>
                    </a>
                </div>
                <?php 
                    $result = $bd->getNoticias(1);
                    if($result != null){
                        $row = $result->fetch_assoc();
                        $id = $row["id"];
                        $titulo = $row["titulo"];
                        $foto = $row["foto"];
                    }
                ?>
                <div class="card-body row">
                    <div id="noticia">
                        <img height="150px" width="200px" src="<?php if($result != null) echo 'data:image;base64,'.$foto;?>"/>
                        <div class="card-header"><?php if($result != null) echo $titulo; ?></div>
                    </div>
                </div>
                <!-- ====================================================================================-->
                <div id="two" class="card-header divRadButton">
                    <a href="#two">
                        <input id="notRadSec" type="radio" name="categoria" alt="vazio" value="2" <?php if($categoria == 2) echo 'checked'; ?>>
                        <label for="notRadSec">Noticias Secundária</label>
                    </a>
                </div>
                <div class="card-body row">
                    <?php 
                        $result = $bd->getNoticias(2);
                        if($result != null){
                            $row = $result->fetch_assoc();
                            $id = $row["id"];
                            $titulo = $row["titulo"];
                            $foto = $row["foto"];
                        }
                    ?>
                    <div id="noticia">
                        <input id="notSec1" type="radio" name="notSubst" value="1" <?php if($substitui == 1) echo 'checked'; ?>>
                        <label for="notSec1">Substituir notícia</label>
                        <br>
                        <img height="150px" width="200px" alt="vazio" src="<?php if($result != null) echo 'data:image;base64,'.$foto;?>"/>
                        <div class="card-header"><?php if($result != null) echo $titulo; ?></div>
                    </div>
                    <?php
                        if($result != null){
                            $row = $result->fetch_assoc();
                            $id = $row["id"];
                            $titulo = $row["titulo"];
                            $foto = $row["foto"];
                        }
                    ?>
                    <div id="noticia">
                        <input id="notSec2" type="radio" name="notSubst" value="2" <?php if($substitui == 2) echo 'checked'; ?>>
                        <label for="notSec2">Substituir notícia</label>
                        <br>
                        <img height="150px" width="200px" alt="Vazio" src="<?php if($result != null) echo 'data:image;base64,'.$foto;?>"/>
                        <div class="card-header"><?php if($result != null) echo $titulo; ?></div>
                    </div>
                </div>
                <!-- ====================================================================================-->
                <div id="three" class="card-header divRadButton">
                    <a href="#three">
                        <input id="notRadTer" type="radio" name="categoria" value="3" <?php if($categoria == 3) echo 'checked'; ?>>
                        <label for="notRadTer">Noticias Terciária</label>
                    </a>
                </div>
                <div class="card-body row">
                    Uma notícia de menor expressão em relação aos grupos anteriores
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
