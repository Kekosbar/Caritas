<html>
    <head>
        <script>
            function alerta(texto){
                alert(texto);
                window.location = "../";
            }
        </script>
    </head>
</html>

<?php

$nome = $telefone = $email = "";
$nomeErr = $telefoneErr = $emailErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $validade = true;
    if(empty($_POST["nome"])) {$nomeErr = "ERRO! Insira o nome completo"; $validade = false;}
    else $nome = $_POST["nome"];
    
    if(empty($_POST["telefone"])) {$telefoneErr = "ERRO! Insira o telefone"; $validade = false;}
    else $telefone = $_POST["telefone"];
    
    if(empty($_POST["email"])) {$emailErr = "ERRO! Insira o email"; $validade = false;}
    else $email = $_POST["email"];
    
    if($validade){
        require_once './classes/BDconnect.php';
        $bd = new BDconnect();
        require_once './classes/User.php';
        $user = new User(0, $nome, $telefone, $email);
        $resultado = $bd->addUser($user);
        if($resultado){
            echo '<script> alerta("Dados cadastrados com sucesso"); </script>';
        }else{
            echo '<script> alerta("Ocorreu um erro, tente mais tarde"); </script>';
        }
    }else{
        echo '<script> alerta("Ocorreu um erro, você esqueceu algum campo em branco"); </script>';
    }
}