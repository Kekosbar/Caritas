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
    
    //  INSERT INTO
    //==============================================================================
    
    function addNoticia(Noticia $noticia){
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
    
    function addUserAdmin(UserAdmin $admin){
        $nome = $admin->getNome();
        $login = $admin->getLogin();
        $cargo = $admin->getCargo();
        $telefone = $admin->getTelefone();
        $email = $admin->getEmail();
        $foto = $admin->getFoto();
        $descricao = $admin->getDescricao();
        $senha = $admin->getSenha();
        $query = "INSERT INTO userAdmin(nome, login, cargo, telefone, email, foto, descricao, senha) VALUES "
                . "('$nome','$login','$cargo','$telefone','$email','$foto','$descricao','$senha');";
        return $this->conn->query($query);
    }
    
    function addUser(User $user){
        $nome = $user->getNome();
        $telefone = $user->getTelefone();
        $email = $user->getEmail();
        $query = "INSERT INTO user(nome, telefone, email) VALUES('$nome', '$telefone', '$email');";
        return $this->conn->query($query);
    }
    
    //  UPDATE
    //==============================================================================
    
    function trocaCategoria($catNova, $id){
        $query = "UPDATE Noticia SET categoria = $catNova WHERE id = $id;";
        return $this->conn->query($query);
    }
    
    function editarNoticia(Noticia $noticia){
        $id = $noticia->getId();
        $titulo = $noticia->getTitulo();
        $subTitulo = $noticia->getSubTitulo();
        $autor = $noticia->getAutor();
        $local = $noticia->getLocal();
        $foto = $noticia->getFoto();
        $texto = $noticia->getTexto();
        $categoria = $noticia->getCategoria();
        $query = "UPDATE Noticia SET titulo = '$titulo', subTitulo = '$subTitulo', autor = '$autor', local = '$local', foto = '$foto', "
                            . "texto = '$texto', categoria = $categoria WHERE id = $id;";
        return $this->conn->query($query);
    }
    
    function editarUserAdmin(UserAdmin $admin){
        $id = $admin->getId();
        $nome = $admin->getNome();
        $login = $admin->getLogin();
        $cargo = $admin->getCargo();
        $telefone = $admin->getTelefone();
        $email = $admin->getEmail();
        $foto = $admin->getFoto();
        $descricao = $admin->getDescricao();
        $senha = $admin->getSenha();
        $query = "UPDATE userAdmin SET nome = '$nome', login = '$login', cargo = '$cargo', telefone = '$telefone', email = '$email', foto = '$foto', "
                        . "descricao = '$descricao', senha = '$senha' WHERE id = $id";
        return $this->conn->query($query);
    }
    
    //  SELECT
    //==============================================================================
    
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
    
    function getUserAdmin(){
        $query = "SELECT * FROM userAdmin";
        $result = $this->conn->query($query);
        return $result;
    }
    
    function getUserAdminPorID($id){
        $query = "SELECT * FROM userAdmin WHERE id = $id";
        $result = $this->conn->query($query);
        return $result;
    }
    
    function getUser(){
        $query = "SELECT * FROM user";
        $result = $this->conn->query($query);
        return $result;
    }
    
    //  DELETE FROM
    //=================================================================================
    
    function deletarNoticia($id){
        $query = "DELETE FROM Noticia WHERE id = $id";
        return $this->conn->query($query);
    }
    
    function deletarUserAdmin($id){
        $query = "DELETE FROM userAdmin WHERE id = $id";
        return $this->conn->query($query);
    }
    
    //=================================================================================
    
    function finalizar(){
        $this->conn->close();
    }
    
    function msmErro(){
        return $this->conn->error;
    }
    
    // GETTERS E SETTERS
    //================================================================================
    
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
