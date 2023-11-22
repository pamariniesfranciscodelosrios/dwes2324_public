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

    print "<h2> Usuario " . $_SESSION["usuario"] . "<br></h2>";


    print "<br> Info importante de tu sesión ..." ;

    foreach($_SESSION as $key=> $value)
        print "<br> _SESSION[indice]:$key, VALOR:  $value" ;



        

?>

<p>Pulse <a href="usuarios_registrados.php">aquí</a> para Volver a Usuarios_Registrados Menú</p>
<p>Volver al <a href="login.php">inicio</a></p>





<p>Pulse <a href="logout.php">para Cerrar Sesión</a> </p>    

</body>
</html>