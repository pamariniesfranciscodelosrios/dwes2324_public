<?php
require ("config.php");

    class Conectar{
        // al ser estático, solo necesitaré el nombre para poder acceder al método. 
        // Sin tener que crear objetos
        public static function conexion(){
            try{

                
                        //Datos y atributos usados para la conexion por pdo a mysql 
                $conexion=new PDO(DB_HOST.";".DB_NOMBRE,DB_USUARIO, DB_CONTRA);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->exec("SET CHARACTER SET UTF8"); 

                //∫echo "Conexion hecha correctamente";



            } catch (Exception $e) {
                die ("Error" . $e->getMessage());
                echo "la línea de error es: " . $e->getLine();
            }

            return $conexion;
        }


    }


?>


 