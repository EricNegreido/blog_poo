<?php
  include("blog_models.php");
  class Handler_models{

    private $conexion;

    public function __construct($conexion){
      $this->setConexion($conexion);
    }
    public function setConexion(mysqli $conexion){
      $this->conexion = $conexion;
    }

    public function getContenido(){
      $matriz = array();
      $cont = 0;
      $result = mysqli_query($this->conexion, "SELECT * FROM contenido ORDER BY fecha");

      while($reg = mysqli_fetch_assoc($result)){
        $blog = new Blog_models();

        $blog->setId($reg["id"]);
        $blog->setTitulo($reg["titulo"]);
        $blog->setFecha($reg["fecha"]);
        $blog->setComentario($reg["comentario"]);
        $blog->setImg($reg["imagen"]);
        $matriz[$cont] = $blog;
        $cont++;
      }

      return $matriz;
    }
    public function insertRegister(Blog_models $blog){
      // Hacemos consulta prepara para evitar inyeccion
      $sql = "INSERT INTO contenido (titulo,fecha,comentario,imagen) VALUES (?,?,?,?)";
      $stmt = $this->conexion->prepare($sql);
      $titulo = $blog->getTitulo();
      $fecha = $blog->getFecha();
      $comentario = $blog->getComentario();
      $img = $blog->getImg();
      $stmt->bind_param('ssss', $titulo, $fecha, $comentario,$img);
      $result = $stmt->execute();
      $stmt->close();
      return $result;

    }
  }
?>