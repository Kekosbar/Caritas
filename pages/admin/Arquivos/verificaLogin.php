<?php

session_start();
if(!isset($_SESSION["caritaslogin"])){
    echo "<script>alert('Você precisa estar logado para acessar este local');window.location.href='/./Caritas/pages/login.php';</script>";
}