<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2.4 Tipos de Datos. Constantes</title>
</head>
<body>
    <?php
    print "<h2>UD2.5 Condicionales. IF /ELSEIF / ELSE</h2>";
   
 
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
    
     


            // EL OPERADOR TERNARIO
            print "<h2>UD2.5 Condicionales. OPERADOR TERNARIO </h2>";
            $edad = 20;
            echo ($edad >= 20) ? 'Pasa' : 'Fuera';

            //VERSION CORTA / ELVIS
            print "<h2>UD2.5 Condicionales. OPERADOR TERNARIO versiones Cortas</h2>";
            $val = $_GET['user'] ?: 'default'; //true
            $user= $_GET['user'] ?? 'nobody';  //isset

            echo "<br/> El fichero es= $nombre_ejercicio";
            echo "<br/> La variable val tiene= $val";
            echo "<br/> La variable user tiene= $user";


            $nombre_ejercicio= $_SERVER['PHP_SELF'] ?? 'Fichero Sin definir';  //isset

            //1 Definir las variables
            $verdad=true;
            $mentira=false;


            //2 Recoger la salida con los operadores ternarios
            $valor1= $mentira ?: 'No es VERDAD';  //true
            $valor3= $verdad ?: 'No es TRUE';  //true

            $valor2= $inventada /*Variable que no he definido*/?? 'variable sin definir';  //isset
            

            //3 Mostrar las variables de salida
            echo "<br/> VALOR 1= $valor1";
            echo "<br/> VALOR 2= $valor2";
            echo "<br/> VALOR 3= $valor3";

            
            


// CONDICIONALES switch
print "<h2>UD2.5 Condicionales. switch </h2> ";
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
while ($a < 100)
{
    $a += 2;
    print "<br/>$a"; // MUESTRA A
}
    




print "<br /> BUCLE FOR <br /> ";

for ($i = 0; $i<10; $i++) 
  print "<br/>El valor de nuestro contador es : $i"; // Se muestran los valores 5 y 8
// Si solo contiene una linea , puedo omitir las llaves {}

print "<br/> BUCLE do - while ";
do {
    print "<br/>". $variable++;
    //$variable++;
} while ($variable <= 10);

    ?>
</body>
</html>