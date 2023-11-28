<?php

    class Personas_model{
        private $db;
        private $personas;

        public function __construct(){
            //primero conectar con la bbdd
            include("modelo/Conectar.php");
            $this->db=Conectar::conexion();
            $this->personas=array(); //creará un array autmaticamente

        }

        /*
        public function get_productos(){
           $consulta= $this->db->query("SELECT * FROM productos"); 



           //recuperamos las filas
           while($filas=consulta->fetch(PDO::FETCH_ASSOC)){
                echo print_r($filas);
                $this->productos[]=$filas;
                //almaceno cada registro en una fila del array productos.

           }
           return $this->personas;

        }
        */
        
        /*
        COMENTARIO Youtube:
        Excelente muchas gracias, yo en vez de usar el while devolví directamente todos los registros con fetchAll(), así:*/

        public function get_personas()
        {

            require("paginacion.php");

            $consulta = "SELECT * FROM ud5_pildoras_datos_usuarios LIMIT $empezar_desde,$tamano_paginas;";

            $personas = $this->db->query($consulta)->fetchAll();

            return $personas;
        }
        
         


    }

?>