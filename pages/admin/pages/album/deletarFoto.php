<?php
include '../../Arquivos/verificaLogin.php';

if(!isset($_GET["id"])){
    echo "<script>alert('ERRO! Tentando acessar a página de forma incorreta');window.location.href='album.php';</script>";
}else{
    $id = $_GET["id"];
    require_once '../../../../php/classes/BDconnect.php';
    $bd = new BDconnect();
    $resultado = $bd->deletarFotoAlbum($id);
    if($resultado){
        echo "<script>alert('Foto deletada com sucesso');window.location.href='album.php';</script>";
    }else{
        echo "<script>alert('ERRO! Ocorreu um erro, tente mais tarde');window.location.href='album.php';</script>";
    }
}

