<!doctype html>
<html>

<head>
  <title>Tema 3 </title>
</head>

  <body style="background-color:rgb(246,243,229);">

 
<?php
/*
  Alumno: Nombre Apellido1 Apellido2
  Fecha: DD/MM/AAAA
  Finalidad: Ejercicios Tema 3 Mostrando Server
*/
?>
 
<p>Ejercicio resuelto<p>
<p>Haz una página PHP que utilice foreach para mostrar todos los valores del array $_SERVER en una tabla con dos columnas. La primera columna debe contener el nombrede la variable, y la segunda su valor.
</p>
          <table>
               <tbody>
                    <tr>
                         <th>Variable</th>
                         <th>Valor</th>
                    </tr>
        <?php   // ANEXO 4
          foreach ($_SERVER as $variable => $valor) {
                print "<tr>";
                print "<td>".$variable."</td>";
                print "<td>".$valor."</td>";
                print "</tr>";
          }
        ?>
               </tbody>
               </table>















</body>

</html>
