<?php
include '../../Arquivos/verificaLogin.php';

require_once '../../../../php/classes/BDconnect.php';
$bd = new BDconnect();

$arquivo = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Preparar imagem para salvar no BD
    if (getimagesize($_FILES['image']['tmp_name']) == false){
        echo '<script> alert("Ocorreu um erro!"); window.location = "album.php"; </script>';
    }else {
        $imagem = addslashes($_FILES['image']['tmp_name']);
        $imagem = file_get_contents($imagem);
        $imagem = base64_encode($imagem);
        
        $resultado = $bd->addFotoNoAlbum($imagem);
        if($resultado){
            echo '<script> alert("Foto salva com sucesso"); window.location = "album.php"; </script>';
        }else{
            echo '<script> alert("Ocorreu um erro inesperado, tente mais tarde"); window.location = "album.php"; </script>';
        }
    }

}else{
    echo '<script> alert("Você esta entrando nesta página pulando passos"); window.location = "album.php"; </script>';
}

