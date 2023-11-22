
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2.4 Tipos de Datos. Constantes</title>
</head>
<body>
    <?php
    print "<h2> UD2.6 FUNCIONES. 209 Argumentos </h2>";
   

  //6. FUNCIONES 
    
  function precio_con_iva() 
   {
        global $precio_movil;
        $precio_iva = $precio_movil * 1.21;
         
        print "<br  /> 1- El precio con IVA es ". $precio_iva;
    }
   
    $precio_movil = 350;
    precio_con_iva();

    print "<br/> **********************";

    






    //FUNCIONES CONDICIONAL
   
    print "<br  /> FUNCIONES CONDICIONAL <br  /> ";

    $condicional = true;
    $precio = 10;
    print "<br  /> 1- Llamada antes de condicional";
    //precio_con_iva_condi();              
    // Da error, pues aquí aún no está definida la función
    //Además se para el código.
    if ($condicional) {
        function precio_con_iva_condi() {
                        global $precio;
                        $precio_iva = $precio * 1.21;
                        print "<br> El precio con IVA es ".$precio_iva;
         }
    }
    print "<br  /> 2- Llamada después de condicional";

    precio_con_iva_condi();               // Aquí ya no da error
    precio_con_iva_condi();   
    

       print "<br /> ARGUMENTOS <br  /> ";//ARGUMENTOS
    
    function precio_con_iva($precio_arg) {
        return $precio_arg * 1.21;
    }

    $precio = 10;

    // OPCION 1: guardandolo en una variable
    $precio_iva = precio_con_iva($precio);
    print "<br /> 1 - El precio con IVA es ".$precio_iva;

    // Opcion 2: sin almacenar en variable
    print "<br /> 2 - El precio con IVA es " . precio_con_iva($precio);
    
  // Variable del programa principal
  print "<br /> 3 - La Variable del programa principal (precio=10) es " . $precio;


    print "<br/><br/>  ARGUMENTOS POR DEFECTO <br  /> ";//ARGUMENTOS POR DEFECTO
    //ARGUMENTOS POR DEFECTO

    function precio_iva_defecto($precio_arg, $iva=0.21) {
        return $precio_arg * (1 + $iva);
        }
    
    $precio = 100;


    // OPCION 1: guardandolo en una variable y enviandole un IVA nuevo   //130
    $precio_iva = precio_iva_defecto($precio, 0.30);
    print "<br /> 1 - El precio con IVA  actualizando es ".$precio_iva;

    // Opcion 2: sin almacenar en variable y Utilizando el IVA por defecto (0,21)  //121
    print "<br /> 2 - El precio con IVA es " . precio_iva_defecto($precio);



    //ARGUMENTOS POR valor y por referencia
    print "<br/><br/>  ARGUMENTOS POR valor y por referencia <br  /> ";//ARGUMENTOS POR DEFECTO
    function precio_iva_referencia (&$precio /*le pasas su direcion de memoria 100325*/, $iva=0.21) {
        $precio *= (1 + $iva); 
        // No es necesario usar ningún return
    }

    $precio = 10;  //100325
    print "<br/><br/>1- ANTES de llamar a la función:  El precio con IVA es ".$precio ;  //10

    precio_iva_referencia($precio);

    print "<br/>2- DESPUES de llamar a la función:  El precio con IVA es ". $precio ;  //121
    

    ?>
</body>
</html>