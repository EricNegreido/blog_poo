<?php

  class Blog_models{

    //Propidades
    private $id;
    private $titulo;
    private $fecha;
    private $comentario;
    private $img;

    // public function getBlock(){
    //   }
  
    // public function setBlock($id){
    //   return [
    //     "id"=>$this->id,
    //     "titulo"=>$this->titulo,
    //     "fecha"=>$this->fecha,
    //     "comentario"=>$this->comentario,
    //     "img"=>$this->img
    //   ];
      // }
    //Metodos de acceso 
    public function getId(){
      return $this->id;
    }

    public function setId($id){
      $this->id = $id;
    }

    public function getTitulo(){
      return $this->titulo;
    }

    public function setTitulo($titulo){
      $this->titulo = $titulo;
    }

    public function getFecha(){
      return $this->fecha;
    }

    public function setFecha($fecha){
      $this->fecha = $fecha;
    }

    public function getComentario(){
      return $this->comentario;
    }

    public function setComentario($comentario){
      $this->comentario = $comentario;
    }

    public function getImg(){
      return $this->img;
    }

    public function setImg($img){
      $this->img = $img;
    }
  }

?> 