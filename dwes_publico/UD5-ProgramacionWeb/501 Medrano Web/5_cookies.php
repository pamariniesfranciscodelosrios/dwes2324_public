<!doctype html>
<html>

<head>
  <title>Tema 3 </title>
</head>

  <body style="background-color:rgb(246,243,229);">

  <p>Mostrando Cookies<p> 
<?php
/*
  Alumno: Nombre Apellido1 Apellido2
  Fecha: DD/MM/AAAA
  Finalidad: Crear primera Coockie
*/

//funciónque utilizamos para CREAR una cookie.
setcookie("alumno", "Antonio");
setcookie("software", $_SERVER['SERVER_SOFTWARE'], time()+3600); //expira en una hora

echo "<b>Autor: </b>" . $_COOKIE["alumno"];
echo "<br>Estamos utilizando: " . $_COOKIE["software"];
/*
"TestCookie": Es el nombre de la cookie.
$value: Es el valor de la cookie.
time() - 3600: Es el tiempo de expiración de la cookie. En este caso, se establece en el tiempo actual (time()) menos 3600 segundos, lo que significa que la cookie expirará 3600 segundos (1 hora) antes del momento actual, es decir, se eliminará.
"/rasmus/": Es el path o ruta para la cual la cookie está disponible. En este caso, la cookie solo está disponible para páginas bajo el path "/rasmus/" en el servidor.
"example.com": Es el dominio para el cual la cookie está disponible. En este caso, la cookie solo está disponible para el dominio "example.com".
1: Es un parámetro booleano (verdadero o falso) que indica si la cookie debe ser enviada solo a través de conexiones seguras (HTTPS). En este caso, se establece en 1, lo que significa verdadero. Esto indica que la cookie debe ser segura y solo se enviará a través de conexiones HTTPS.
*/
//ver las cookies en Chrome
// F12 (Click the Application tab to open the Application panel). Under Storage expand Cookies, then select an origin.

$value = 'something from somewhere';

//setcookie("TestCookie", $value);
setcookie("TestCookie", $value, time()+3600);  /* expire in 1 hour */
//Antes de eliminarla,tengo que quitarle el tiempo, o ponerlo en negativa

echo "<br><b>Test Cookie1: </b>" . $_COOKIE["TestCookie"];

setcookie("TestCookie2", $value, time()+3600);  /* expire in 1 hour */
//Antes de eliminarla,tengo que quitarle el tiempo, o ponerlo en negativa

echo "<br><b>Test Cookie2: </b>" . $_COOKIE["TestCookie2"];


print_r($_COOKIE);

?>

<table>
               <tbody>
                    <tr>
                         <th>Variable</th>
                         <th>Valor</th>
                    </tr>
        <?php   // ANEXO 4
          foreach ($_COOKIE as $variable => $valor) {
                print "<tr>";
                print "<td>".$variable."</td>";
                print "<td>".$valor."</td>";
                print "</tr>";
          }
        ?>
               </tbody>
               </table>

 
               






</tbody>
</table>


<?php
//$accesosPagina = 1;
if (isset($_COOKIE['accesos'])) { 
    $accesosPagina = $_COOKIE['accesos']; // recuperamos una cookie
    setcookie('accesos', ++$accesosPagina); // le asignamos un valor
}
else 
  {setcookie('accesos', "1");}

  echo "<h1>Acceso a la página: $accesosPagina </h1>";
?>













</body>

</html>
