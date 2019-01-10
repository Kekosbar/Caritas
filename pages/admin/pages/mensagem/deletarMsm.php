<?php

include '../../Arquivos/verificaLogin.php';

require_once '../../../../php/classes/BDconnect.php';
$bd = new BDconnect();


if(!isset($_GET["id"])){
    echo "<script>alert('ERRO! Tentando acessar a página de forma incorreta');window.location.href='biblioteca.php';</script>";
}else{
    $id = $_GET["id"];
    if($id == -1){
        if($bd->deletarTodasMensagem())
            echo "<script>alert('Mensagens deletadas');window.location.href='mensagens.php';</script>";
        else
            echo "<script>alert('ERRO! Ocorreu um erro');window.location.href='mensagens.php';</script>";
    }else{
        if($bd->deletarMensagem($id))
            echo "<script>alert('Mensagem deletada');window.location.href='mensagens.php';</script>";
        else
            echo "<script>alert('ERRO! A mensagem já foi deletada');window.location.href='mensagens.php';</script>";
    }
}
