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

    print "<h2> Hola " . $_SESSION["usuario"] . "<br></h2>";


    print "<br> Info importante de tu sesión ..." ;

    foreach($_SESSION as $key=> $value)
        print "<br> _SESSION[indice]:$key, VALOR:  $value" ;


// Vamos a hacernos un sistema de navegación con tres páginas más, similares a esta (copiamos y pegamos).
  // Cambiamos el HOLA de esta primera página por "Usuario"

?>

<ol>
    <li> <a href="usuarios_registrados1.php">PAGINA 1</a>   </li>
    <li> <a href="usuarios_registrados2.php">PAGINA 2</a>   </li>
    <li> <a href="usuarios_registrados3.php">PAGINA 3</a>   </li>

    <p>Pulse <a href="usuarios_registrados.php">aquí</a> para Volver a Usuarios_Registrados Menú</p>
    <p>Volver al <a href="login.php">inicio</a></p>
    
</ol>


<?php
// Una vez hecha la estructura anterior, tenemos que tener en cuenta un PROBLEMA: 
//Que nos podemos dejar la sesión ABIERTA. (Probarlo copiando la url en el mismo navegador) 
//http://localhost/dwes/Tema3_AppWeb/304_login2/usuarios_registrados3.php
?>

<p>Pulse <a href="logout.php">para Cerrar Sesión</a> </p>
</body>
</html>