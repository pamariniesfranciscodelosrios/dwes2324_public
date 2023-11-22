<!doctype html>
<html>

<head>
  <title>Tema 3 </title>
</head>

  <body style="background-color:rgb(246,243,229);">

  <p>Usando Sesiones<p> 
<?php
/*
  Alumno: Nombre Apellido1 Apellido2
  Fecha: DD/MM/AAAA
  Finalidad: Ejercicios Tema 3 Usando sesiones
*/
 



/*


Directiva	Significado
session.use_cookies
Indica si se deben usar cookies (1) o propagación en la URL (0) para almacenar el SID.
session.use_only_cookies	
Se debe activar (1) cuando utilizas cookies para almacenar los SID, y además no quieres que se reconozcan los SID que se puedan pasar como parte de la URL (este método se puede usar para usurpar el identificador de otro usuario).
session.save_handler	
Se utiliza para indicar a PHP cómo debe almacenar los datos de la sesión del usuario. Existen cuatro opciones: en ficheros (files), en memoria (mm), en una base de datos SQLite (sqlite) o utilizando para ello funciones que debe definir el programador (user). El valor por defecto (files) funcionará sin problemas en la mayoría de los casos.
session.name	
Determina el nombre de la cookie que se utilizará para guardar el SID. Su valor por defecto es PHPSESSID.
session.auto_start	
Su valor por defecto es 0, y en este caso deberás usar la función session_start para gestionar el inicio de las sesiones. Si usas sesiones en el sitio web, puede ser buena idea cambiar su valor a 1 para que PHP active de forma automática el manejo de sesiones.
session.cookie_lifetime	
Si utilizas la URL para propagar el SID, éste se perderá cuando cierres tu navegador. Sin embargo, si utilizas cookies, el SID se mantendrá mientras no se destruya la cookie. En su valor por defecto (0), las cookies se destruyen cuando se cierra el navegador. Si quieres que se mantenga el SID durante más tiempo, debes indicar en esta directiva ese tiempo en segundos.
session.gc_maxlifetime	
Indica el tiempo en segundos que se debe mantener activa la sesión, aunque no haya ninguna actividad por parte del usuario. Su valor por defecto es 1440. Es decir, pasados 24 minutos desde la última actividad por parte del usuario, se cierra su sesión automáticamente.

*/

//ver las sesiones en Chrome
// F12 (Click the Application tab to open the Application panel). Under Storage expand Session, then select an origin.


//OPCION 1: // Iniciamos la sesión o recuperamos la anterior sesión existente
session_start();



/*session is started if you don't write this line can't use $_Session  global variable*/

$_SESSION["newsession"]="Mi primera sesión";

/*session created*/

echo $_SESSION["newsession"];


$value="Hello I am Antonio";
$_SESSION["sessiontwo"]=$value;

echo "<br>Antes de borrar: " .$_SESSION["sessiontwo"];
unset($_SESSION["sessiontwo"]);
/*session deleted. if you try using this you've got an error*/
/*session was getting*/

echo "<br>DESPUES< de borrar: " .$_SESSION["sessiontwo"];








// Comprobamos si la variable ya existe
     if (isset($_SESSION['visitas']))
        $_SESSION['visitas']++;
    else
        $_SESSION['visitas'] = 0;
 

    echo "SESSION: " ;
    print_r($_SESSION['visitas']);
  //OPCION 2: Si en lugar del número de visitas, quisieras almacenar el instante en que se produce cada una, la variable de sesión visitas deberá ser un array y por tanto tendrás que cambiar el código anterior por:


        // Iniciamos la sesión o recuperamos la anterior sesión existente
    //session_start();

    // En cada visita añadimos un valor al array "visitas"
       $_SESSION['visitasFecha'][] = date('d-m-Y H:i:s');


       echo "<br> VisitasFecha: " ;
    print_r($_SESSION['visitasFecha']);

  $identificador_sesion= session_id('newsession'); //Proporciona la id de la sesión introducida
  
  echo "<h1> id: $identificador_sesion";
   session_destroy(); //Destruye o finaliza todas las sesiones
?>
 






</tbody>
</table>















</body>

</html>
