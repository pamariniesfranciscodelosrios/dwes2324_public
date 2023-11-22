<head>
<meta charset="utf-8">
<title>Documento Practica 1 Pildoras informaticas</title>
</head>

<body>
<?php

//PARTE 2
    session_start();  //PARTE2

        //Que hacemos si NO hay nada almacenado... ??
    if(!isset($_SESSION["usuario"])){
            header("Location:login.php"); 

    }

    print "<h1>Zona Usuarios Registrados </h1><br>";
    print "<br>Información muy importante <br>";


    // AMPLIA este ejercicio mostrando el nombre del usuario registrado

    print "<h2> Hola, muestra aquí el nombre del usuario registrado </h2>";


    print "<br> Info importante de tu sesión ..." ;

 
// Vamos a hacernos un sistema de navegación con tres páginas más, similares a esta (copiamos y pegamos).
  // Cambiamos el HOLA de esta primera página por "Usuario"

?>

<ol>
    <li> Crea un sistema de navegación con 3 páginas más copiando y pegando esta, para modificarla después   </li>
    <li> Está página hará de menú principal, y tendrás que llamarla desde las otras 3 páginas para Volver a Usuarios_Registrados Menú </li>
    <li> ¿Qué sucede si copias la URL cuando estás registrado, cierras la página y, desde el mismo navegador, la pegas?   </li>
    <li> ¿Cómo podrías evitar ese fallo de seguridad usando sesiones?  </li>

    <li> <b>Intenta averiguar estas cuestiones y responde a las preguntas en este mismo menú </b></li>


    
</ol>


</body>
</html>