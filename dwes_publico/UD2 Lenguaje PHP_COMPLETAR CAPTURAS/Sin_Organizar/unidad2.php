<?php
//2. Características del Lenguaje
    $ciclo="DAW";
    $modulo="DWES";
    print "<p>";
    printf("%s es un módulo de %d curso de %s", $modulo, 2, $ciclo);
    print "</p>";
    print  "Ciclo y Módulo: $ciclo, $modulo";
    echo "Ciclo y Módulo: $ciclo, $modulo";

    printf("El número PI vale %+.2f", 3.1416); // +3.14

    $txt_pi = sprintf("El número PI vale %+.3f", 3.1416);

    print "</p>" . $txt_pi;


    //3,5 Cadenas de texto
    $modulo="Cadena de texto";
    print "<p>Variable: $modulo</p>";

    print '<p>Variable2: $modulo</p>';

    $a = "Módulo ";
    $b = $a . "DWES"; // ahora $b contiene "Módulo DWES"
    $a .= "DWES"; // ahora $a también contiene "Módulo DWES"


    //4 FUNCIONES
    $a = $b = "3.1416"; // asignamos a las dos variables la misma cadena de texto
    settype($b, "float"); // y cambiamos $b a tipo float
    print "\$a vale $a y es de tipo ".gettype($a);
    print "<br />";
    print "\$b vale $b y es de tipo ".gettype($b);

    // Por defecto, se le asigna tipo DOUBLE
   
   //4..1	Isset, unset, isnull
   $a = "3.1416";
   if (isset($a)) // la variable $a está definida
        print "<br /> Antes de UNSET : \$a vale $a y es de tipo ".gettype($a);
   else {
    print "<br /> Antes de UNSET : \$a vale $a y es de tipo ".gettype($a);
   }
   
   unset($a); //ahora ya no está definida
   error_reporting(E_ERROR);

   if (isset($a)) // la variable $a está definida
   { 
    print "<br /> Despues d UNSET : \$a vale $a y es de tipo ".gettype($a);
   }    
    else {
    print "<br /> Despues de UNSET :  \$a vale $a y es de tipo ".gettype($a);
    }
    $vacia="";
    if (empty($vacia))
        print "<br /> Despues de empty :  \$a vale $vacia y es de tipo ".gettype($vacia);
    

    // DESACTIVAR WARNINGS
    
        /* Desactivar toda las notificaciónes del PHP

        error_reporting(0);

        
        // Notificar solamente errores de ejecución

        error_reporting(E_ERROR | E_WARNING | E_PARSE);


        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
        */

    
    //4.3 DEFINE Constantes
    
        define ("PI", 3.1416);
        print "El valor de PI es ". PI; 
        // define ("PI", 3.1416, true);
        //El identificador se reconoce tanto por PI como por pi
        // Esto ya genera error desde PHP 7,3
?> 


 <h3 style="color:green;">5 ESTRUCTURAS DE CONTROL. </h3>
 <?php
//5 ESTRUCTURAS DE CONTROL
    // CONDICIONALES
    
        $a=5;
        $b=0;
        
            if ($a < $b)
            print "a es menor que b";
            elseif ($a > $b)
            print "a es mayor que b";
            else
            print "a es igual a b";
        
        
    print "<br />";

            switch ($a) {
                case 0:
                print "a vale 0";
                break;
                case 1:
                print "a vale 1";
                break;
                default:
                print "a no vale 0 ni 1";
                }

                print "<br />";



    //BUCLES
    print "<br /> BUCLE WHILE <br />  ";

    $a = 1;
	while ($a < 8)
		$a += 3;
	print $a; // el valor obtenido es 10

    print "<br /> BUCLE FOR <br /> ";

    for ($a = 5; $a<10; $a+=3) {
        print $a; // Se muestran los valores 5 y 8
        print "<br />";
   }
?> 
   <h3 style="color:green;">6 FUNCIONES. </h3>
<?php
   //6. FUNCIONES 
   function precio_con_iva() {
    global $precio_movil;
    $precio_iva = $precio_movil * 1.21;
    print "El precio con IVA es ".$precio_iva;
    }
    $precio_movil = 350;
    precio_con_iva();


    //FUNCIONES CONDICIONAL
    print "<br  /> FUNCIONES CONDICIONAL <br  /> ";

    $iva = true;
    $precio = 10;
    print "<br  /> Llamada antes de condicional";
    //precio_con_iva_condi();               // Da error, pues aquí aún no está definida la función
    if ($iva) {
         function precio_con_iva_condi() {
                        global $precio;
                        $precioiva = $precio * 1.21;
                        print "El precio con IVA es ".$precioiva;
         }
    }
    print "<br  /> Llamada después de condicional";

    precio_con_iva_condi();               // Aquí ya no da error


    //ARGUMENTOS
    /*
    function precio_con_iva($precio_arg) {
        return $precio_arg * 1.18;
    }
    $precio_arg = 10;
    $precio_iva = precio_con_iva($precio_arg);
    print "El precio con IVA es ".$precio_iva;
    */
    //ARGUMENTOS POR DEFECTO

    /*function precio_con_iva($precio, $iva=0.21) {
        return $precio * (1 + $iva);
        }
    $precio = 10;
    $precio_iva = precio_con_iva($precio);
    print "El precio con IVA es ".$precio_iva;


    //ARGUMENTOS POR valor y por referencia

    function precio_con_iva(&$precio, $iva=0.18) {
        $precio *= (1 + $iva);
    }
    $precio = 10;
    precio_con_iva($precio);

    print "El precio con IVA es ".$precio ;  
    */
?> 

<h3 style="color:green;">7 ARRAYS. </h3>

<?php
   //7 ARRAYS
    // array numérico
    $modulos1 = array(0 => "Programación", 1 => "Bases de datos", 2 => "Desarrollo web en entorno servidor");
    // array asociativo
    $modulos2 = array("PR" => "Programación", "BD" => "Bases de datos", "DWES" => "Desarrollo web en entorno servidor"); 

    print_r($modulos2);
    print "<br /> ARRAY MODULOS1: ". $modulos1[0];  

    // array bidimensional
    $ciclos = array(
        "DAW" => array ("PR" => "Programación", "BD" => "Bases de datos", "DWES" => "Desarrollo web en entorno servidor"),
        "DAM" => array ("PR" => "Programación", "BD" => "Bases de datos", "PMDM" => "Programación multimedia y de dispositivos móviles")
    );

    print_r($ciclos);

/*
    // array numérico
    $modulos1 [0] = "Programación";
    $modulos1 [1] = "Bases de datos";
    ...
    $modulos1 [9] = "Desarrollo web en entorno servidor";
    // array asociativo
    $modulos2 ["PR"] = "Programación";
    $modulos2 ["BD"] = "Bases de datos";
    ...
    $modulos2 ["DWES"] = "Desarrollo web en entorno servidor"; 


    //Clave por defecto
    $modulos1 [ ] = "Programación";
    $modulos1 [ ] = "Bases de datos";
    ...
    $modulos1 [ ] = "Desarrollo web en entorno servidor"; 
*/

    //7,1 Recorrer Arrays
    // cadena de texto
    $modulo = "Desarrollo web en entorno servidor";
    // $modulo[3] == "a";

    print "<br /> FOREACH <br />";
    $modulos = array("PR" => "Programación", "BD" => "Bases de datos", "DWES" => "Desarrollo web en entorno servidor");
    foreach ($modulos as $valor) {
                print "Módulo: ".$valor. "<br />";
    }


    print "<br /> FOREACH con clave valor <br />";
    $modulos = array("PR" => "Programación", "BD" => "Bases de datos", "DWES" => "Desarrollo web en entorno servidor");
    foreach ($modulos as $clave => $valor) {
                print "El código del módulo ".$clave." es ".$valor."<br />";
    }

    // ANEXO 4
    foreach ($_SERVER as $variable => $valor) {
          print "<tr>";
          print "<td>".$variable."</td>";
          print "<td>".$valor."</td>";
          print "</tr>";
    }
   

    //7.3 Recorrer Arrays

    echo "<br>" . "TIPOS COMPUESTOS DE DATOS";
  // array numérico
  $deportes = array(0 => "Tenis", 1 => "Baloncesto", 2 => "Futbol");
  echo "<br>" .$deportes[0]."<br>";


  foreach ($deportes as $i   )
    print "<br>" . "Deportes : " . $i;

    foreach ($deportes as $i => $j   )
      print "<br>" . "Clave : " . $i . "Deporte" . $j;

      print "El deporte ".$i[1]." es ".$i[0]."";
      
      
      print "<br>" . "each ha sido eliminado desde la versión 8 de PHP";
    /*while ($modulo = each($modulos)) {
        print "El código del módulo ".$modulo[1]." es ".$modulo[0]."<br />";
   }
   */
  echo "<br> FUNCIONES <br>";

   while ($valor = current($deportes)) {
    print "El código del módulo ".$valor."<br />";
    next($deportes);
}


    $a = array();  // array vacío
    $modulos = array("Programación", "Bases de datos", "Desarrollo web en entorno servidor");   // array numérico

    unset ($modulos[0]);
    // El primer elemento pasa a ser $modulos [1] == "Bases de datos";
    print "<br /> DESPUÉS DE UNSET: <br /> ";

    print_r($modulos);


    print "<br /> BUSQUEDA CON in_array <br /> ";
    $modulos = array("Programación", "Bases de datos", "Desarrollo web en entorno servidor");
    
    $modulo = "Bases de datos";
    if (in_array($modulo, $modulos)) 
    print "Existe el módulo de nombre ".$modulo;



?> 