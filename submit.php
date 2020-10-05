<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" charset="utf-8"></script>
    <title></title>

  </head>
  <body>

    <form method="post" action="submit.php">

        <div class="form-group fieldGroup">
          <!--botón para agregar múltiple opción - 3 preguntas -->
          <div class="input-group-addon">
              <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Múltiple Choice - 3 opciones </a>
          </div>
          <!-- rellenar múltiple opción - 3 preguntas -->
          <div class="form-group fieldGroupCopy" style="display: none;">
              <div class="input-group">
                  <input type="text" name="pregunta[]" class="form-control" placeholder="Ingrese enunciado de la Pregunta"/>
                  <input type="text" name="opcion1[]" class="form-control" placeholder="Opcion 1"/>
                  <input type="text" name="opcion2[]" class="form-control" placeholder="Opcion 2"/>
                  <input type="text" name="opcion3[]" class="form-control" placeholder="Opcion 3"/>
                  <input type="text" name="answer[]" class="form-control" placeholder="Respuesta Correcta"/>
                  <input type="text" name="feedback[]" class="form-control" placeholder="Feedback"/>
                  <div class="input-group-addon">
                      <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Borrar</a>
                  </div>
              </div>
          </div>
        </div>

        <div class="form-group fieldGroup4">
          <!--botón para agregar múltiple opción - 4 preguntas -->
          <div class="input-group-addon">
              <a href="javascript:void(0)" class="btn btn-success addMore4"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Múltiple Choice - 4 opciones </a>
          </div>
          <!-- rellenar múltiple opción - 4 preguntas -->
          <div class="form-group fieldGroup4Copy" style="display: none;">
              <div class="input-group">
                  <input type="text" name="pregunta[]" class="form-control" placeholder="Ingrese enunciado de la Pregunta"/>
                  <input type="text" name="opcion1[]" class="form-control" placeholder="Opcion 1"/>
                  <input type="text" name="opcion2[]" class="form-control" placeholder="Opcion 2"/>
                  <input type="text" name="opcion3[]" class="form-control" placeholder="Opcion 3"/>
                  <input type="text" name="opcion4[]" class="form-control" placeholder="Opcion 4"/>
                  <input type="text" name="answer[]" class="form-control" placeholder="Respuesta Correcta"/>
                  <input type="text" name="feedback[]" class="form-control" placeholder="Feedback"/>
                  <div class="input-group-addon">
                      <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Borrar</a>
                  </div>
              </div>
          </div>
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="Enviar Cuestionario"/>

    </form>




  <script type="text/javascript">
    $(document).ready(function(){
        //limites de preguntas
        //var maxGroup = 5;

        //agregar pregunta de 3 opciones
        $(".addMore").click(function(){
          //  if($('body').find('.fieldGroup').length < maxGroup){
                var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
                $('body').find('.fieldGroup:last').after(fieldHTML);
          //  }else{
          //      alert('MAXIMO '+maxGroup+' PREGUNTAS PERMITIDAS');
          // }
        });

        //agregar pregunta de 4 opciones
        $(".addMore4").click(function(){
          var fieldHTML = '<div class="form-group fieldGroup4">'+$(".fieldGroup4Copy").html()+'</div>';
          $('body').find('.fieldGroup4:last').after(fieldHTML);      
        });

        //borrar pregunta
        $("body").on("click",".remove",function(){
            $(this).parents(".fieldGroup").remove();
        });
    });
  </script>


  </body>
</html>
