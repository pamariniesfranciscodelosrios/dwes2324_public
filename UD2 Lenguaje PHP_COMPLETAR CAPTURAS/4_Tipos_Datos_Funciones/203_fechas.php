<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2.4 Tipos de Datos. FECHAS</title>
</head>
<body>
    <?php
    print "<h2>UD2.4 Tipos de Datos. FECHAS</h2>"; 
     
    date_default_timezone_set('Europe/Madrid'); // definimos nuestra zona

    
    $dia_dos_digitos = date("j");  
    $year = date("Y");      
    $hoy = date("F j, Y, g:i a");                 // September 27, 2023, 10:47 am
    $fecha_actual = date("d-m-Y h:i:s"); //mostrara algo asi: 11-02-2023 06:16:45




    print "<br>  El valor del dia del mes con los dos digitos es $dia_dos_digitos "; //. date("l") ;

    print "<br>  El valor del dia del mes es $dia_dos_digitos y el año es $year". date("Y") ;

    print "<br> "; 
    

      // EJEMPLOS DEL MANUAL PHP:
$hoy = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm
print "<br>  Hoy es $hoy "; 

$hoy = date("m.d.y");                         // 03.10.01
print "<br>  Hoy es $hoy "; 
$hoy = date("j, n, Y");                       // 10, 3, 2001
print "<br>  Hoy es $hoy "; 
$hoy = date("Ymd");                           // 20010310
print "<br>  Hoy es $hoy "; 
$hoy = date('h-i-s, j-m-y, it is w Day');     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
print "<br>  Hoy es $hoy "; 

$hoy = date('\i\t \i\s \t\h\e jS \d\a\y.');   // it is the 10th day.
print "<br>  Hoy es $hoy "; 

$hoy = date("D M j G:i:s T Y");               // Sat Mar 10 17:16:18 MST 2001
print "<br>  Hoy es $hoy "; 

$hoy = date('H:m:s \m \i\s\ \m\o\n\t\h');     // 17:03:18 m is month
print "<br>  Hoy es $hoy "; 

$hoy = date("H:i:s");                         // 17:16:18
print "<br>  Hoy es $hoy "; 

$hoy = date("Y-m-d H:i:s");                   // 2001-03-10 17:16:18 (el formato DATETIME de MySQL)
print "<br>  Hoy es $hoy "; 




?>

<?php
    print "<br> <h2> GETDATE en array </h2> "; 
    
    $hoy_getdate = getdate();
    print_r($hoy_getdate);
?>


</body>
</html>