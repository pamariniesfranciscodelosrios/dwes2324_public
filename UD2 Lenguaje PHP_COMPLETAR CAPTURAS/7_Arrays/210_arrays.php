<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2.4 Tipos de Datos. Constantes</title>
</head>
<body>
    <?php
   
   
   print "<h2>UD2.7 ARRAYS</h2>";
   
    //print ($_SERVER['PHP_SELF']);  //nombre y ruta del archivo

    //print "<br> ". $_SERVER["PHP_SELF"];  

    //*print_r($_SERVER);



    // array numérico
    $modulos1 = array(0 => "Programación", 1 => "Bases de datos", 2 => "Desarrollo web en entorno servidor");
    $alumnos = array("Jose Maria", "Juanma", "Pedro", "Rafa"); 


    
    print "<br> ALUMNOS";
    print_r($alumnos); 
    print "<br> El alumno 2 es". $alumnos[2];

    // array asociativo
    $modulos2 = array("PR" => "Programación", "BD" => "Bases de datos", "DWES" => "Desarrollo web en entorno servidor"); 

    
    print "<br> Modulos 2: ";
    print_r($modulos2);
    print "<br /> ARRAY MODULOS1: ". $modulos1[0];  


    //print "<br> print_r de la variable TEXTO:  ";
    //$texto= "hola";
    print_r ($texto);

    // array bidimensional
    $ciclos = array(
        "DAW" => array ("PR" => "Programación", "BD" => "Bases de datos", "DWES" => "Desarrollo web en entorno servidor"),
        "DAM" => array ("PR" => "Programación", "BD" => "Bases de datos", "PMDM" => "Programación multimedia y de dispositivos móviles")
    );

    print "<br /> ARRAY BIDIMENSIONAL CICLOS: <br/>";
    print_r($ciclos);
    print "<br /> SOLO UNA FILA: </br>";print_r($ciclos["DAW"]);


    print "<br /> PMDM: <br/>";
    print $ciclos["DAM"]["PMDM"];



     // array Multidimensinal NUMERICO
     //No le digo la clave, la establece de forma implicita
     $horario = array(
        array (3=>"Programación", 2=>"Bases de datos", 1=>"Desarrollo web en entorno servidor", 0=>"DWES"),
        array ("DWES", "Bases de datos","Programación multimedia y de dispositivos móviles"),
        array ("DIW", "Bases de datos", "Desarrollo web en entorno servidor"),
        array ("Programación", "DIW", "Desarrollo web en entorno servidor"),
        array ("DWES", "Bases de datos", "Desarrollo web en entorno servidor")
    );

    print "<br /> ARRAY BIDIMENSIONAL numerico horario: <br/>";
    print_r($horario);


    print "<br /> Horario Viernes a primera (DWES): <br/>";
    print $horario[0][1];




    //Arrays sin especificar tamaño
    print "<br/><u> <h3>Arrays sin especificar tamaño </u></h3><br/>";

    $cena_navidad[]="Pedro";
     
    print "<br> 1- "; print_r($cena_navidad);

    $cena_navidad[]="Rafa";
    print "<br> 2- "; print_r($cena_navidad);

    $cena_navidad[]="Juarma";
    print "<br> 2- "; print_r($cena_navidad);
 
    $cena_navidad[2]="Juanma"; //Corrijo el 2
    print "<br> 2- "; print_r($cena_navidad);




    print "<br/><u> <h3> Recorrer Arrays </u></h3><br/>";

     //7.1 Recorrer Arrays
    // cadena de texto
    $modulo = "Desarrollo web en entorno servidor";
    //$modulo[3] == "a";
    print $modulo[3];






    // FOREACH
    print "<br /> FOREACH <br />";
    //$modulos = array("PR" => "Programación", "BD" => "Bases de datos", "DWES" => "Desarrollo web en entorno servidor");
    foreach ($modulos2 as $valor) {
                print "Módulo: ".$valor. "<br />";
    }



    print "<br /> FOREACH con clave valor <br />";
    //$modulos = array("PR" => "Programación", "BD" => "Bases de datos", "DWES" => "Desarrollo web en entorno servidor");
    foreach ($modulos2 as $clave => $valor) {
                print "El código del módulo ".$clave." es ".$valor."<br />";
    }


    print "<br /> FOREACH con clave valor <br />";
    
    foreach ($cena_navidad as $clave => $valor) {
                print "El código de la cena ".$clave." es ".$valor."<br />";
    }



 // ANEXO FOREACH con clave valor <br />";
 print "<br /> FOREACH con clave valor de la variable SERVER <br />";
 foreach ($_SERVER as $clave => $valor) 
 {
    print "<br/>";
    print "<tr/>";
        print "<td> Clave: ".$clave."</td> --------- Valor: ";
        print "<td>".$valor."</td>";
    print "</tr>";

 }





 //7.3 Recorrer Arrays

 echo "<br><h2> 7.3 Recorrer Arrays </h2>";
 // array numérico
 //$deportes = array(0 => "Tenis", 1 => "Baloncesto", 2 => "Futbol");
 $deportes = array( "Tenis",  "Baloncesto", "Futbol");
 echo "<br>" .$deportes[0]."<br>";


 
     print "<br>" . "each ha sido eliminado desde la versión 8 de PHP";


     echo "<br><b> Recorrerriendo con while NEXT </b>";
  while ($valor = current($deportes)) 
  {
        print "<br/>El código del módulo ".$valor;
        next($deportes);
 } 



 echo "<br><br /> <b> Recorrerlo uno a uno </b>";

 print "<br/>Reinicio el puntero con reset: ".reset($deportes) ;
 print "<br/>La clave de la posición actual del array es: ".key($deportes) ;
 print "<br/>El elemento del array deportes es ".current($deportes) ;
 
 //Segundo elemento
 next($deportes);
 print "<br/>La clave de la posición actual del array es: ".key($deportes) ;
 print "<br/>El elemento del array deportes es ".current($deportes) ;

  //tercer elemento
  next($deportes);
  print "<br/>La clave de la posición actual del array es: ".key($deportes) ;
  print "<br/>El elemento del array deportes es ".current($deportes) ;


  //Vuelvo al 2º elemento
  prev($deportes);
  print "<br/>La clave de la posición actual tras usar PREV del array es: ".key($deportes) ;
  print "<br/>El elemento del array deportes es ".current($deportes) ;

 //print "<br/>El código del array deportes es ".current($deportes) ;

 //print "<br/>El código del array deportes es ".current($deportes) ;

 echo "<br><br /><b> Recorrerriendo con while NEXT </b>";

 //Eliminamos un elemento del array deportes
 unset ($deportes[1]);  // Qué posición tiene Futbol2?


//Comprobamos qué clave tiene ahora el valor 3 que era futbol
foreach ($deportes as $clave => $valor) 
{
   print "<br/>";
   print "<tr/>";
       print "<td> Clave: ".$clave."</td> --------- Valor: ";
       print "<td>".$valor."</td>";
   print "</tr>";

}

echo "<br><br /><b> Número de elementos del array Deportes es </b>" . count($deportes);




echo "<br><br /><b> BUSQUEDA</b>";

 
   print "<br /> BUSQUEDA CON in_array <br /> ";
      
   $para_buscar = "Futbol";
   if (in_array($para_buscar, $deportes)) 
    {
        
        print "<br/>Existe el elemento ".$para_buscar ;
        print "Su clave es ". array_search($para_buscar, $deportes);
    }   

    else
        print "NO Existe el elemento ".$para_buscar ;


    //busqueda con 
    $para_buscar = "0";
    if (array_key_exists($para_buscar, $deportes)) 
        {
            
            print "<br/>Existe el elemento ".$para_buscar ;
            print "El elemento es ". $deportes[$para_buscar];
        }   
    
        else
            print "NO Existe el elemento ".$para_buscar ;

 

    ?>
</body>
</html>