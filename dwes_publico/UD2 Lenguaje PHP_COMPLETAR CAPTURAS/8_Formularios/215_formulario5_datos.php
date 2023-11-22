<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Ejemplo: Validar datos en la misma página que el formulario -->
<html>
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <title>Desarrollo Web</title>
     </head>
     <body>
<?php
     // Compruebo que se haya seleccionado al menos un módulo y que el nombre NO esté vacío para MOSTRAR los datos, 
     // antes comprobabamos solo si se había pulsado enviar
     if (!empty($_POST['modulos']) && !empty($_POST['nombre'])) {
          $nombre = $_POST['nombre'];
          $modulos = $_POST['modulos'];

          print "Nombre: ".$nombre."<br />";
          foreach ($modulos as $modulo) {
               print "Modulo: ".$modulo."<br />";
          }
     }





     else {  // Si NO se cumple lo anterior, muestro las advertencias
          //Fíjate cómo cerramos aquí el bloque PHP para poder ejecutar HTML
?>  
     <form name="input" action="<?php $_SERVER['PHP_SELF'];?>" method="post">

     
          Nombre del alumno:
                                   <!-- COMPROBACION 1: Si pulsas botón enviar con el nombre, te lo mantiene en el formulario-->
          <input type="text" name="nombre" value="<?php if (isset ($_POST['nombre'])) echo $_POST['nombre'];?>" />
          <?php
               //COMPROBACION 2: En este caso, se ha pulsado el botón ENVIAR pero no se ha introducido un nombre: 
               if (isset($_POST['enviar']) && empty($_POST['nombre']))
               //Imprimo el error en PHP
                    echo "<span style='color:red'> &lt;-- Debe introducir un nombre!!</span>"
          ?>
          
          <br />
          <p>Módulos que cursa:


          <?php // Muestro Error Si no están vacias tras pulsar el botón enviar
          //COMPROBACION 3: Si pulsamos enviar sin escoger algún módulo (vacio): imprimo el ERROR 
               if (isset($_POST['enviar']) && empty($_POST['modulos']))
                    echo "<span style='color:red'> &lt;-- Debe escoger al menos uno!!</span>"
          ?>
          
          </p>


          <input type="checkbox" name="modulos[]" value="DWES"
               <?php
               //COMPROBACIÓN 4: Si hemos seleccionado algún módulo, buscamos si este primer módulo fue seleccionado para marcarlo
                    if(isset($_POST['modulos']) && in_array("DWES",$_POST['modulos']))
                         echo 'checked="checked"'; 
               ?>
          />  Desarrollo web en entorno servidor      <br />


          <input type="checkbox" name="modulos[]" value="DWEC"

               <?php 
               //COMPROBACIÓN 4: Si hemos seleccionado algún módulo, buscamos si este primer módulo fue seleccionado para marcarlo

                   if(isset($_POST['modulos']) && in_array("DWEC",$_POST['modulos']))
                         echo 'checked="checked"';
               
            ?>
          /> Desarrollo web en entorno cliente<br />    <br />


          
          <input type="submit" value="Enviar" name="enviar"/>
     </form>
<?php
     }
?>
     </body>
</html>