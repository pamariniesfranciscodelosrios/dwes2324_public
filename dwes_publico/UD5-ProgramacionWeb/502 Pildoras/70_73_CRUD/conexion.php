<?php
require ("../config.php");
 //Aqui se definen todos los datos de acceso a la BBDD. Como lo son el usuario contraseña, host y mas...
 
    try {
        //Datos y atributos usados para la conexion por pdo a mysql 
        $base=new PDO(DB_HOST.";".DB_NOMBRE,DB_USUARIO, DB_CONTRA);
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET UTF8"); 


      
    } catch (Exception $e) {
        echo "la línea de error es: " . $e->getLine();
    }
?>