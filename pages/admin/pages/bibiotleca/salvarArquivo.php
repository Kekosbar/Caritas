<?php
include '../../Arquivos/verificaLogin.php';

require_once '../../../../php/classes/BDconnect.php';
$bd = new BDconnect();

$arquivo = "";

if ($_FILES['arquivo']['type'] == "application/pdf") {  
    
    //$pathToSave = '/var/www/html/Caritas/pages/admin/uploads/';
    $pathToSave = $_SERVER["DOCUMENT_ROOT"]."/Caritas/uploads/";
    mkdir($pathToSave,0777,true);
            
    if ($_FILES['arquivo']) { // Verifica se o campo não está vazio.
        $dir = $pathToSave; // Diretório que vai receber o arquivo.
        $tmpName = $_FILES['arquivo']['tmp_name']; // Recebe o arquivo temporário.

        $name = $_FILES['arquivo']['name']; // Recebe o nome do arquivo.

        // move_uploaded_file( $arqTemporário, $nomeDoArquivo )
        if (move_uploaded_file($tmpName, $dir.$name)) { // move_uploaded_file irá realizar o envio do arquivo.        
            echo '<script> alert("Arquivo salvo com sucesso"); window.location = "biblioteca.php"; </script>';
        } else {
            echo '<script> alert("Ocorreu um erro"); window.location = "biblioteca.php"; </script>';
        }    
    }

}else{
    echo '<script> alert("Você esta entrando nesta página pulando passos"); window.location = "biblioteca.php"; </script>';
}
