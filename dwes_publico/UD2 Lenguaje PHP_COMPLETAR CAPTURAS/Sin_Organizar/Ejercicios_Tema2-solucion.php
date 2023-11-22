<!doctype html>
<html>

<head>
  <title> Ejercicios Tema 2 </title>
</head>

  <body style="background-color:rgb(246,243,229);">


<h1 style="color:blue;" align="center" >Tema 2. El lenguaje PHP </h1>
<?php
/*
  Alumno: Nombre Apellido1 Apellido2
  Fecha: DD/MM/AAAA
  Finalidad: Ejercicios Tema 2, el Lenguage PHP
*/


/*Ejercicios Tema 2 */
  print "Bienvenidos al tema 2 de  DWES, se va llamar El lenguaje PHP <br>";
  print "Estos ejercicios pueden estar salteados en la teoría<br>";// Es mejor ver un poco de todo varias veces e ir profundizando
  print "Cuenta, como no, la apariencia, la autenticidad y la originalidad de los datos  <br>";
  print "Se debe comentar cada aspecto que se haga, y si consideras mejorar su aspecto con tablas u otros elementos web, mejor.   ";
?>








<a href="https://akifrases.com/frase/177817"   target="_blank">Vease este link</a>. </p>

<h2 style="color:green;">1. Elementos del lenguaje PHP. </h1>
    <h3 style="color:green;">1.1 Generación de código HTML. </h3>


<p>Crea variables numéricas y cadenas relacionadas con productos de alguna empresa,
  un par con 2 decimales,
  un par con 4 decimales y
  una entero (sin decimales)
  una tipo cadena
</p>

<p>Muestra una de ellas con dos decimales</p>
<p>Muestra una de ellas en binario</p>
<p>Presentalo en notación científica</p>
<p>Muestra la cadena con printf</p>
<p> Almacena una variable real,con 3 decimales exactamente, en otra variable sin utilizar la función printf y muestrala </p>
<p> Crea una variable precioGasoil (4 decimales) y otra llamada descuento, y calcula lo que pagas por litro,
   aplícale después un 10% de IVA y muestra el valor en € con simbolo y 2 decimales </p>

<?php
//Bloque PHP
$cafe = 1.3;
$tostada = 1.5;
$refresco = 2;
$azucarillo = 0.0112;
$hielo = 0.1563;
$bar = "Budo";

  print "<b>* INVENTANTE 3 ejercicios parecidos a estos de apartados diferentes e indica su sección </b><br>";

echo "SOLUCIONES <br>";
//<p>Muestra una de las de 4 decimales con dos decimales</p>
printf ("Muestra las dos de 4 decimales con dos decimales:  %.2f   <br>", $azucarillo);
//<p>Muestra una de ellas en binario</p>
printf ("Muestra una de ellas en binario: %b   <br>", $refresco);
//<p>presentalo en notación científica</p>
printf ("presentalo en notación científica: %e   <br>", $hielo);
//<p>Muestra la cadena con printf
printf ("Muestra la cadena con printf, Bar-%s   <br>", $bar);

//Almacena una variable real,con 3 decimales exactamente, en otra variable sin utilizar la función printf y muestrala
$azucarillo3 = sprintf ("%.3f   <br>", $azucarillo);
echo "Almacena una variable real,con 3 decimales exactamente, en otra variable sin utilizar la función printf $azucarillo3";




$precioGasoil = 1.8156;

$descuento = 0.30; // Porcentaje

$litro = $precioGasoil - $descuento;
$litro_con_iva = $litro * 1.1 ;

echo "Precio Gasoil inicial:  $precioGasoil <BR>";

echo "Precio Litro Gasoil sin impuesto:  $litro <BR>";

echo "Con el impuesto :$litro_con_iva  <br>" ;
printf ("Precio Gasoil con el impuesto:  %.2f €  <br>", $litro_con_iva);

?>











    <h3 style="color:green;">1.2 Cadenas de texto. </h3>
    <?php
    //Bloque PHP



    ?>


    <h3 style="color:green;">1.3 Funciones relacionadas con los tipos de datos </h3>


    <?php
    //Bloque PHP

    echo "SOLUCIONES CADENAS <br>";


    ?>





    <h3 style="color:green;">1.4 Variables especiales de PHP. </h3>

    <?php
    //Bloque PHP




    ?>


<h2 style="color:green;">2. Estructuras de control. </h2>

<?php
//Bloque PHP




?>

    <h3 style="color:green;">2.1 Condicionales. </h3>

<p> Inventante dos variables con nombres de series y dos variables para su calificación en IMBD Muestra la que mejor calificación tenga</p>
    <?php
    //Bloque PHP

$serie1="Sherlock";
$seri2="Vikings";
$calificacion1 = 8.1;
$calificacion2 = 7.6;

  if($calificacion1 >$calificacion2)
      echo "$serie1 tiene mejor calificación en IMBD";
  else
    echo "$serie2 tiene mejor calificación en IMBD";


    ?>

    <h3 style="color:green;">2.2 Bucles. </h3>

    <?php
    //Bloque PHP




    ?>

<h2 style="color:green;">3. Funciones. </h2>
<p>Crea una función que reciba un codigo de modulo y muestre el nombre del Módulo sin usar IF/ELSE
0612. Desarrollo Web en Entorno Cliente
0613. Desarrollo Web en Entorno Servidor
0614. Despliegue de Aplicaciones Web
0615. Diseño de Interfaces Web
0617. Empresa e Iniciativa Emprendedora
0616. Proyecto de Desarrollo de Aplicaciones Web
</p>
<?php
//Bloque PHP


function modulosCiclo($modulo){
          if($modulo>=612 && $modulo<=617){

             switch($modulo){

                         case 612: $nombreModulo="0612. Desarrollo Web en Entorno Cliente"; break;

                         case 613: $nombreModulo="0613. Desarrollo Web en Entorno Servidor"; break;

                         case 614: $nombreModulo="0614. Despliegue de Aplicaciones Web"; break;

                         case 615: $nombreModulo="0615. Diseño de Interfaces Web"; break;

                         case 617: $nombreModulo="0617. Empresa e Iniciativa Emprendedora"; break;

                         case 616: $nombreModulo="0616. Proyecto de Desarrollo de Aplicaciones Web"; break;

             }

             //echo "El MODULO que le corresponde es $nombreModulo";
             return $nombreModulo;

          }

          else

             printf("El codigo del módulo no está en el rango");

}

$modulo=617;
echo "el modulo que corresponde al $modulo es ".  modulosCiclo($modulo);

?>


    <h3 style="color:green;">3.1 Inclusión de ficheros externos. </h3>
    <h3 style="color:green;">3.3 Ejecución y creación de funciones. </h3>
    <h3 style="color:green;">3.3 Argumentos. </h3>
<h2 style="color:green;">4. Tipos de datos compuestos.</h2>
    <h3 style="color:green;">4.1 Recorrer arrays</h3>
    <h3 style="color:green;">4.2 Funciones relacionadas con los tipos de datos compuestos.</h3>
<h2 style="color:green;">5. Formularios web.</h2>
    <h3 style="color:green;">5. Formularios web. </h3>
    <h3 style="color:green;">5.1 Procesamiento de la información devuelta por un formulario web. </h3>
    <h3 style="color:green;">5.2 Generación de formularios web en PHP. </h3>




//ACTIVIDADES DESPUÉS DEL ESQUELETO DE PUNTOS, Desordenadas, y que la vayan incorporando donde correspondan










<?php
echo "<br> ", $_SERVER['PHP_SELF']; //guión que se está ejecutando actualmente.
echo "<br> ",  $_SERVER['SERVER_ADDR']; //dirección IP del servidor web.
echo "<br> ",  $_SERVER['SERVER_NAME']; //nombre del servidor web.
echo "<br> ", $_SERVER['DOCUMENT_ROOT']; //directorio raíz bajo el que se ejecuta el guión actual.
echo "<br> ", $_SERVER['REMOTE_ADDR']; //dirección IP desde la que el usuario está viendo la página.
echo "<br> ", $_SERVER['REQUEST_METHOD']; //método utilizado para acceder a la página ('GET', 'HEAD', 'POST' o'PUT')






?>


</body>

</html>
