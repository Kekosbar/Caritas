<?php

class UserAdmin {
    
    private $id;
    private $nome;
    private $login;
    private $data;
    private $cargo;
    private $telefone;
    private $email;
    private $foto;
    private $descricao;
    private $senha;
    
    function __construct($id, $nome, $login, $data, $cargo, $telefone, $email, $foto, $descricao, $senha) {
        $this->id = $id;
        $this->nome = $nome;
        $this->login = $login;
        $this->data = $data;
        $this->cargo = $cargo;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->foto = $foto;
        $this->descricao = $descricao;
        $this->senha = $senha;
    }

    function getNome() {
        return $this->nome;
    }

    function getLogin() {
        return $this->login;
    }

    function getData() {
        return $this->data;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function getFoto() {
        return $this->foto;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getSenha() {
        return $this->senha;
    }

    function getId() {
        return $this->id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

}
