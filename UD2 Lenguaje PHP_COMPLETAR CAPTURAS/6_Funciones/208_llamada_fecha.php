<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Ejemplo: Utilización include -->
<html>
     <head>
          <meta http-equiv="content-type" content="text/html; charset=UTF-8">
          <title>208 Fecha en castellano</title>
     </head>
     <body>
<?php
     include '208_funcion_fecha.inc.php';
     print "La fecha de hoy es " . fecha();
     
?>
     </body>
</html>