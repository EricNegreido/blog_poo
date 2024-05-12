<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body{
      background-color:#005544;
    }
    form{
      display:flex;
      flex-direction:column;
      width: 50%;
      margin: 0 auto;
      gap:5px;
    }
  </style>
</head>
<form action="../controllers/transactions.controller.php" method="post" enctype="multipart/form-data">
  <label for="titulo"> Titulo </label>
  <input type="text" name="titulo">
  <label for="comentario"> Comentario </label>
  <textarea name="comentario" cols="15" row="10"></textarea>
  <!-- MAX_TAM es limite que permitido que controlamos en este caso 2Mb -->
  <input type="hidden" name="MAX_TAM" values="2097152">
  <label for="Selecione una imagen con tamaño inferior a 2 Mb"></label>
  <input type="file" name="img">
  <input type="submit" value="Enviar">
  <div> <a href="show.views.php"> Pagina de vizualizacion del blog </a></div>
</form>
</body>
</html>