<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2.4 Tipos de Datos. Constantes</title>
</head>
<body>
    <?php
    print "<h2>UD2.4 Tipos de Datos. Constantes</h2>";
    print "<h3>Constantes definidas propias </h3>";
    /*
    Existe también en PHP una función, define, con la que puedes definir constantes, esto es, identificadores a los que se les asigna un valor que no cambia durante la ejecución del programa.Existe también en PHP una función, define, con la que puedes definir constantes, esto es, identificadores a los que se les asigna un valor que no cambia durante la ejecución del programa.
    */

    //Los identificadores no van precedidos por el signo "$" y por convención se escriben en mayuscula

          define ("PI", 3.1416);
        print "<br>  El valor de PI es ". PI; 
        // define ("PI", 3.1416, true);
        //El identificador se reconoce tanto por PI como por pi
        // Esto ya genera error desde PHP 7,3

    //No se pueden utilizar ARRAYS para constantes
    define("ALUMNO", "Antonio Marín");


    //Para mostrarlas, no se puede combinar con otro texto como si puedes hacer con las variables, has de usar el operador punto .
    print "<br> El valor de ALUMO es ". ALUMNO; 

    print "<br> El valor de ALUMO es ALUMNO"; 

    print "<br> Es un string?: (1 SI, nada NO)". is_string(ALUMNO); 
    print "<br> Es un float?: (1 SI, nada NO)". is_float(ALUMNO); 
    //No aparecerá:


    print "<h3>Constantes Predefinidas </h3>";

    print "<br>Estamos en la linea: ". __LINE__;   
    print "<br>Estamos en el fichero: ". __FILE__;   

    print "<br>El nombre del método es∫ ". __METHOD__	; 
    



    print "<br> SETTYPE y El GETTYPE"; 

    $b ="1,325";
    print "<br> 1. El tipo de B es: ". gettype($b); 
    
    settype($c, "boolean");
    print "<br> 2. El tipo de C es: ". gettype($c); 

    print "<br> 3. El tipo de B es: ". gettype($b); 



    ?>
</body>
</html>