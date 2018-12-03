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
    
    function addNoticia(Noticia $noticia){
//        $prepare = $this->conn->prepare("INSERT INTO Noticia (titulo, subtitulo, autor, texto, foto, categoria) VALUES (?,?,?,?,?,?)");
//        $prepare->bind_param("sss", $titulo, $subtitulo, $autor, $texto, $foto, $categoria);
        $titulo = $noticia->getTitulo();
        $subtitulo = $noticia->getSubTitulo();
        $autor = $noticia->getAutor();
        $texto = $noticia->getTexto();
        $foto = $noticia->getFoto();
        $categoria = $noticia->getCategoria();
        $local = $noticia->getLocal();
        $query = "INSERT INTO Noticia (titulo, subtitulo, autor, texto, foto, categoria, local) VALUES "
                . "('$titulo','$subtitulo','$autor','$texto','$foto',$categoria, '$local');";
        return $this->conn->query($query);
    }
    
    function getNoticias($categoria){
        $query = "SELECT id, titulo, subTitulo, autor, texto, foto, data, categoria, local FROM Noticia WHERE categoria = ".$categoria;
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
            return $result;
        } else {
            return null;
        }
    }
    
    function getNoticiaPorID($id){
        $query = "SELECT id, titulo, subTitulo, autor, texto, foto, data, categoria, local FROM Noticia WHERE id = ".$id;
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
            return $result;
        } else {
            return null;
        }
    }
            
    function finalizar(){
        $this->conn->close();
    }
    
    function msmErro(){
        return $this->conn->error;
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
