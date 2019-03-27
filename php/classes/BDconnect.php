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
        $exibetitulo = $noticia->getExibeTitulo();
        $exibesubtitulo = $noticia->getExibesubtitulo();
        $query = "";
        if($categoria != 4){
            $query = "INSERT INTO Noticia (titulo, subtitulo, autor, texto, foto, categoria, local) VALUES "
                    . "('$titulo','$subtitulo','$autor','$texto','$foto',$categoria, '$local');";
        }else{
            $query = "INSERT INTO Noticia (titulo, subtitulo, autor, texto, foto, categoria, local, exibeTitulo, EXIBEsUBTITULO) VALUES "
                    . "('$titulo','$subtitulo','$autor','$texto','$foto',$categoria, '$local', $exibetitulo, $exibesubtitulo);";
        }
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
    
    function addVisita(){
        $query = "INSERT INTO Visitas() VALUES();";
        return $this->conn->query($query);
    }
    
    function addMensagem($nome, $sobreNome, $email, $texto){
        $query = "INSERT INTO Mensagens (nome, sobrenome, email, texto) VALUES('$nome','$sobreNome','$email','$texto');";
        return $this->conn->query($query);
    }
    
    function addArquivo($arquivo, $nome){
        $query = "INSERT INTO Arquivos (arq, nome) VALUES ('$arquivo', '$nome');";
        return $this->conn->query($query);
    }
    
    function addFotoNoAlbum($imagem){
        $query = "INSERT INTO Album (imagem) VALUES ('$imagem')";
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
        $exibetitulo = $noticia->getExibeTitulo();
        $exibesubtitulo = $noticia->getExibesubtitulo();
        $query = "UPDATE Noticia SET titulo = '$titulo', subTitulo = '$subTitulo', autor = '$autor', local = '$local', foto = '$foto', "
                            . "texto = '$texto', categoria = $categoria, exibeTitulo = $exibetitulo, EXIBEsUBTITULO = $exibesubtitulo WHERE id = $id;";
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
        $query = "SELECT id, titulo, subTitulo, autor, texto, foto, data, categoria, local, exibeTitulo, EXIBEsUBTITULO FROM Noticia WHERE categoria = ".$categoria;
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
    
    function getNoticiaPorTexto($texto){
        $query = "SELECT id, titulo, subTitulo, autor, foto, data FROM Noticia WHERE texto LIKE '%$texto%'";
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
    
    function getUserEmails(){
        $query = "SELECT email FROM user";
        $result = $this->conn->query($query);
        return $result;
    }
    
    function getVisitas(){
        $query = "SELECT month(data) AS mes, COUNT(0) AS total FROM Visitas GROUP BY month(data);";
        return $this->conn->query($query);
    }
    
    function getArquivos(){
        $query = "SELECT id, nome, arq FROM Arquivos";
        return $this->conn->query($query);
    }
    
    function getArquivosTestes(){
        $query = "SELECT arq FROM Arquivos";
        return $this->conn->query($query);
    }
    
    function getMensagens(){
        $query = "SELECT * FROM Mensagens;";
        return $this->conn->query($query);
    }
    
    function getFotosAlbum(){
        $query = "SELECT * FROM Album;";
        return $this->conn->query($query);
    }
    
    function getTotalMsmNLidas(){
        $query = "SELECT count(id) AS total FROM Mensagens WHERE lida = 0;";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        return $row["total"];
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
    
    function deletarMensagem($id){
        $query = "DELETE FROM Mensagens WHERE id = $id;";
        return $this->conn->query($query);
    }
    
    function deletarFotoAlbum($id){
        $query = "DELETE FROM Album WHERE id = $id";
        return $this->conn->query($query);
    }
    
    function deletarTodasMensagem(){
        $query = "TRUNCATE Mensagens;";
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
