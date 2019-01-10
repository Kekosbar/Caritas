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

$nome = $sobreNome = $email = $texto = "";
$nomeErr = $sobreNomeErr = $emailErr = $textoErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $validade = true;
    if(empty($_POST["nome"])) {$nomeErr = "ERRO! Insira o nome"; $validade = false;}
    else $nome = $_POST["nome"];
    
    if(empty($_POST["sobNome"])) {$sobreNomeErr = "ERRO! Insira o sobrenome"; $validade = false;}
    else $sobreNome = $_POST["sobNome"];
    
    if(empty($_POST["email"])) {$emailErr = "ERRO! Insira o email"; $validade = false;}
    else $email = $_POST["email"];
    
    if(empty($_POST["msm"])) {$textoErr = "ERRO! Insira a mensagem a ser enviada"; $validade = false;}
    else $texto = $_POST["msm"];
    
    if($validade){
        require_once './classes/BDconnect.php';
        $bd = new BDconnect();
        $resultado = $bd->addMensagem($nome, $sobreNome, $email, $texto);
        if($resultado){
            echo '<script> alerta("Sua mensagem foi recebida com sucesso"); </script>';
        }else{
            echo '<script> alerta("Ocorreu um erro, tente mais tarde"); </script>';
        }
    }else{
        echo '<script> alerta("'.$nomeErr.$sobreNomeErr.$emailErr.$textoErr.'"); </script>';
    }
    
}