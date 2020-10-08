<?php

require_once 'ficheros.php';

//subir imagenes asociadas a la pregunta y su respuestas en una carpeta en servidor
subir_fichero($_FILES['output_image']['name'], $_FILES['output_image']['tmp_name']);
subir_fichero($_FILES['output_imageOpcion1']['name'], $_FILES['output_imageOpcion1']['tmp_name']);
subir_fichero($_FILES['output_imageOpcion2']['name'], $_FILES['output_imageOpcion2']['tmp_name']);
subir_fichero($_FILES['output_imageOpcion3']['name'], $_FILES['output_imageOpcion3']['tmp_name']);

if(isset($_POST['submit'])){
      //crear fichero para escribir salida en formato .gift
      $archivo = fopen("formatogift.txt", "w");

      $pregArr = $_POST['pregunta'];
      $opcion1Arr = $_POST['opcion1'];
      $opcion2Arr = $_POST['opcion2'];
      $opcion3Arr = $_POST['opcion3'];
      $answerArr = $_POST['answer'];
      $feedbackArr = $_POST['feedback'];

      $preguntaImag = $_POST['preguntaImag'];
      $pregUrlImag = $_POST['pregUrlImag'];
      $opcion1Imag = $_POST['opcion1Imag'];
      $opcion1UrlImag = $_POST['opcion1UrlImag'];

      if(!empty($pregArr)){
          for($i = 0; $i < count($pregArr); $i++){
              if(!empty($pregArr[$i])){
                  $preg = $pregArr[$i];
                  $opcion1 = $opcion1Arr[$i];
                  $opcion2 = $opcion2Arr[$i];
                  $opcion3 = $opcion3Arr[$i];
                  $answer = $answerArr[$i];
                  $feedback = $feedbackArr[$i];

                  //armar estructura gift para preguntas multiple choice
                  fwrite($archivo, "".$preg."{".PHP_EOL);

                  //diferenciar opciones que se tildaron correctas de las falsas
                  if (isset($_POST['checkOpcion1']) && $_POST['checkOpcion1'] == '1'){
                    fwrite($archivo, "=".$opcion1.PHP_EOL);
                  }else{
                    fwrite($archivo, "~".$opcion1.PHP_EOL);
                  }

                  if (isset($_POST['checkOpcion2']) && $_POST['checkOpcion2'] == '1'){
                    fwrite($archivo, "=".$opcion2.PHP_EOL);
                  }else{
                    fwrite($archivo, "~".$opcion2.PHP_EOL);
                  }

                  if (isset($_POST['checkOpcion3']) && $_POST['checkOpcion3'] == '1'){
                    fwrite($archivo, "=".$opcion3.PHP_EOL);
                  }else{
                    fwrite($archivo, "~".$opcion3.PHP_EOL);
                  }

                  fwrite($archivo, "####".$feedback.PHP_EOL);
                  fwrite($archivo, "}".PHP_EOL);
                  fwrite($archivo, "".PHP_EOL);

              }
          }
      }

      if(!empty($preguntaImag)){
          for($i = 0; $i < count($preguntaImag); $i++){
              if(!empty($preguntaImag[$i])){

                  $preguntaImag = $preguntaImag[$i];
                  $pregUrlImag = $pregUrlImag[$i];
                  $opcion1Imag = $opcion1Imag[$i];
                  $opcion1UrlImag = $opcion1UrlImag[$i];

                  //armar estructura gift para preguntas con imagenes
                  fwrite($archivo, ":: CUESTION con IMAGENES ::{". PHP_EOL);
                  fwrite($archivo, "".$preguntaImag);
                  fwrite($archivo, "<a href\=imagenes/".$_FILES['output_image']['name'].">:</a>". PHP_EOL);
                  fwrite($archivo, "".$opcion1Imag. PHP_EOL);

                  //diferenciar opciones que se tildaron correctas de las falsas
                  if ( $_POST['opcion1check'] == '1'){
                    fwrite($archivo, "{=<img style\="."vertical-align: middle; margin: 10px; src\=imagenes/" .$_FILES['output_imageOpcion1']['name']."/>". PHP_EOL);
                  }else{
                    fwrite($archivo, "{~<img style\="."vertical-align: middle; margin: 10px; src\=imagenes/" .$_FILES['output_imageOpcion1']['name']."/>". PHP_EOL);
                  }

                  if ( $_POST['opcion2check'] == '1'){
                    fwrite($archivo, "{=<img style\="."vertical-align: middle; margin: 10px; src\=imagenes/" .$_FILES['output_imageOpcion2']['name']."/>". PHP_EOL);
                  }else{
                    fwrite($archivo, "{~<img style\="."vertical-align: middle; margin: 10px; src\=imagenes/" .$_FILES['output_imageOpcion2']['name']."/>". PHP_EOL);
                  }

                  if ( $_POST['opcion3check'] == '1'){
                    fwrite($archivo, "{=<img style\="."vertical-align: middle; margin: 10px; src\=imagenes/" .$_FILES['output_imageOpcion3']['name']."/>". PHP_EOL);
                  }else{
                    fwrite($archivo, "{~<img style\="."vertical-align: middle; margin: 10px; src\=imagenes/" .$_FILES['output_imageOpcion3']['name']."/>". PHP_EOL);
                  }

                  fwrite($archivo, "}". PHP_EOL);
              }
          }
      }
      fclose($archivo);
}
?>
