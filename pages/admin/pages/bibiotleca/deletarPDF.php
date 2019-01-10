<?php
include '../../Arquivos/verificaLogin.php';

if(!isset($_GET["nomePdf"])){
    echo "<script>alert('ERRO! Tentando acessar a página de forma incorreta');window.location.href='biblioteca.php';</script>";
}else{
    $nomeFile = $_GET["nomePdf"];
    $directory = "../../../../uploads/";
    if(unlink($directory.$nomeFile))
        echo "<script>alert('Arquivo deletado com sucesso');window.location.href='biblioteca.php';</script>";
    else
        echo "<script>alert('ERRO! O arquivo não foi encontrado');window.location.href='biblioteca.php';</script>";
}

