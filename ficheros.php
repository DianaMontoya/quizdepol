<?php

//funcion para subir imagenes asociadas a la pregunta y su respuestas en una carpeta en servidor
function subir_fichero ($nombre_fichero, $nombre_tmp){
  $target_path = "imagenes/";
  $target_path = $target_path . basename($nombre_fichero);
  if(move_uploaded_file($nombre_tmp, $target_path)) {
     echo "El archivo ".  basename($nombre_fichero).
     " ha sido subido al servidor";
     echo "<br/>";
  } else{
     echo "Ha ocurrido un error, trate de nuevo!";
     echo "<br/>";
  }
}
