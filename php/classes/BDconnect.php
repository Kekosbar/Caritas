<?php

class BDconnect {
    var $servername = "localhost";
    var $username = "caique";
    var $password = "449e149sis";
    var $banco = "Caritas";
    var $conn;
    
    function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->banco);
    }

    function login($login, $senha){
        $query = "SELECT * FROM userAdmin WHERE login = '$login' AND senha = '$senha'";
        $this->conn->query($query);
        if($this->conn->affected_rows > 0){
            return true;
        }else
            return false;
    }
    
    
    
    
    function getServername() {
        return $this->servername;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getBanco() {
        return $this->banco;
    }

    function getConn() {
        return $this->conn;
    }


}
