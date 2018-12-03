<?php

class Noticia {
    
    private $id;
    private $titulo;
    private $subTitulo;
    private $autor;
    private $foto;
    private $texto;
    private $categoria;
    private $data;
    private $local;
    
    function __construct($id, $titulo, $subTitulo, $autor, $foto, $texto, $categoria, $data, $local) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->subTitulo = $subTitulo;
        $this->autor = $autor;
        $this->foto = $foto;
        $this->texto = $texto;
        $this->categoria = $categoria;
        $this->data = $data;
        $this->local = $local;
    }
    
    function getId() {
        return $this->id;
    }
        
    function getTitulo() {
        return $this->titulo;
    }

    function getSubTitulo() {
        return $this->subTitulo;
    }

    function getAutor() {
        return $this->autor;
    }

    function getFoto() {
        return $this->foto;
    }

    function getTexto() {
        return $this->texto;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getData() {
        return $this->data;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setSubTitulo($subTitulo) {
        $this->subTitulo = $subTitulo;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setData($data) {
        $this->data = $data;
    }

    function getLocal() {
        return $this->local;
    }

    function setLocal($local) {
        $this->local = $local;
    }
    
}
