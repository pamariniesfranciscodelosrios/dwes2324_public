<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Ejemplo: Procesar datos en la misma página que el formulario -->
<html>
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <title>Desarrollo Web</title>
     </head>
     <body>
<?php

          //Se muestrta solo si se ha pulsado el botón ENVIAR (isset)
     if (isset($_POST['boton_enviar'])) {
          $nombre = $_POST['nombre'];
          $modulos = $_POST['modulos'];
          print "Nombre: ".$nombre."<br />";
          foreach ($modulos as $modulo) {  //Warning a Juanma/Rafa key undefined
               print "Modulo: ".$modulo."<br />";
          }
     }
     else {
?>   <!-- ACTION: le indicamos PHP_SELF ya que se va a REDIRIGIR a este mismo archivo -->
          <form name="input"      action="<?php $_SERVER['PHP_SELF'];?>"      method="post">
               Nombre del alumno: <input type="text" name="nombre" /><br />
               
               <p>Módulos que cursa:</p>
               <input type="checkbox" name="modulos[]" value="DWES" />
               Desarrollo web en entorno servidor<br />
               <input type="checkbox" name="modulos[]" value="DWEC" />
               Desarrollo web en entorno cliente<br />
               <br />

               <!-- Ahora el botón submit tiene un atributo name "boton_enviar" -->
               <input type="submit" value="Enviar" name="boton_enviar"/>
          </form>
<?php
     }
?>
     </body>
</html>