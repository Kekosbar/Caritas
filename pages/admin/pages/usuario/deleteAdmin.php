<?php
include '../../Arquivos/verificaLogin.php';

require_once '../../../../php/classes/BDconnect.php';
$bd = new BDconnect();

$id;
if(empty($_GET["idAdmin"])) {
    header("Location: administrador.php");
    exit();
}
else{
    $id = $_GET["idAdmin"];
}

$bd->deletarUserAdmin($id);
header("Location: administrador.php");
exit();