<?php
// verificamos la carga de la imagen
include("../models/handler_models.php");

try{
  $miconexion = mysqli_connect("localhost","root","","bbdd_blog");
  

  if($_FILES["img"]["error"]){

    switch($_FILES["img"]["error"]){
      case 1:
        echo "El tamaño del archivo excede el limite permitido por el servidor";
        break;
      case 2:
        echo "El tamaño del archivo excede los 2Mb permitidos";
        break;
      case 3:
        echo "El envío fue interrumpido";
        break;
      case 4:
        echo "No se ingreso archivo para enviar";
        break;
    }
  }else{
    echo "Se accedio a la imagen exitosamente";

    if((isset($_FILES["img"]["name"]) && ($_FILES["img"]["error"] == UPLOAD_ERR_OK))){
      $destino_de_ruta="../img/";
      move_uploaded_file($_FILES["img"]["tmp_name"], $destino_de_ruta . $_FILES["img"]["name"]);

      echo "<br> El archivo " . $_FILES["img"]["name"] . " se ha cargado en el dir de imagenes <br>";

    }else{
      echo "<br> Erro al cargar la imagen <br>";
    }
  }
  $handler = new Handler_models($miconexion);
  $blog = new Blog_models();

  $blog->setTitulo($_POST["titulo"]);
  $blog->setFecha(Date("Y-m-d H:i:s"));
  $blog->setComentario($_POST["comentario"]);
  $blog->setImg($_FILES["img"]["name"]);

  $handler->insertRegister($blog);
  echo "<br/> Se agrego un registro <br/>";

}catch(Exception $e){
  die("Erro ". $e->getMessage());
}

?>