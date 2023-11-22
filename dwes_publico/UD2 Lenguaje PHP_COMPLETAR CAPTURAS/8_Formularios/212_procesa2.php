<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Ejemplo: Procesar datos get -->
<html>
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <title>Desarrollo Web</title>
     </head>
     <body>
<?php
     $nombre = $_GET['nombre']; // He usado la variable Superglobal GET en lugar de POST
     $modulos = $_GET['modulos'];

     print "Nombre: ".$nombre."<br />";
     foreach ($modulos as $modulo) {
          print "Modulo: ".$modulo."<br />";
     }
?>
     </body>
</html>