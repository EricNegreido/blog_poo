<?php
 include("../models/handler_models.php");

 try{
  $miconexion = mysqli_connect("localhost","root","","bbdd_blog");
  if(mysqli_connect_errno()){
    echo "Erro de conexion".mysqli_connect_error();
    exit();
  }
  $handler = new Handler_models($miconexion);
  $tabla_blog = $handler->getContenido();

  if($tabla_blog){
    foreach($tabla_blog as $value){
      echo"<h3>".$value->getTitulo() ." </h3>";
      echo"<h4>".$value->getFecha() ." </h4>";
      echo"<div style='width:400px'>".$value->getComentario() ." </div>";
      if($value->getImg() != ""){
        echo "<img src='../img/";
        echo $value->getImg() ."' width='300px'/>";
      }
    }
    echo "<hr/>";
  }
 }catch(Exception $e){
  echo "Error: ".$e->getMessage()."";
  die();
}

?>

<br/>

<a href="form.views.php">Volver</a>