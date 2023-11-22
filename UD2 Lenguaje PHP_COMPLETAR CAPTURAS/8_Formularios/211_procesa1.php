<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Ejemplo: Procesar datos post -->
<html>
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <title>211 procesa 1</title>
     </head>
     <body>
<?php
     //Recogemos los valores de las variables.
     $nombre = $_POST['nombre'];
     $modulos = $_POST['modulos']; // esta es un array de valores
    
     print "Nombre: ".$nombre."<br />";

     foreach ($modulos as $clave => $modulo) {
          print "Clave:". $clave . " Modulo: ".$modulo."<br />";
     }
?>
     </body>
</html>