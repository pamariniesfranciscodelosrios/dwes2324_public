<?php
require ("../config.php");


  //  ▒▒▒▒▒▒▒▒ Almacenando usuario y password en BD ▒▒▒▒▒▒▒▒

  $usuario = $_POST["usuario"]; //$_POST["usuario"];
  $contra = $_POST["contra"];

  $pass_cifrado=password_hash($contra, PASSWORD_DEFAULT);
   //info a cifrar, modo de encriptación PASSWORD_DEFAULT (sal automática), se recomienda así
  //video 69 modificando el coste:
 $pass_cifrado_coste=password_hash($contra, PASSWORD_DEFAULT, array("cost"=>12));

  

  echo "Registro es $usuario ";
  echo "Contraseña sin Cifrar es $contra ";
  echo "Contraseña Cifrada es $pass_cifrado ";
 //CONECTANDO CON LA BBDD
  //  ▒▒▒▒▒▒▒▒ Consultando a través de la clase Persona ▒▒▒▒▒▒▒▒
  try{
        //Mejoramos el video de Píldoras con lo anterior
        //$base=new PDO("mysql:host=localhost; dbport=3307; dbname=dwes","root","");
        $base=new PDO(DB_HOST.";".DB_NOMBRE,DB_USUARIO, DB_CONTRA);
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

        $sql= "INSERT INTO ud5_pildoras_usuarios_pass (user, pass) VALUES (:usuario,:contra)";
        //esta función se encarga de preparar la consulta
        $resultado=$base->prepare($sql); 
        $usuario=htmlentities(addslashes($usuario)); 
        $resultado->bindValue(":usuario", $usuario); 
        $resultado->bindValue(":contra", $pass_cifrado_coste);   
        $resultado->execute(); 

        echo "Registro $usuario insertado";
        // No necesitamos imprimir en pantalla, solo saber si el usuario está o no está
        // Para ello utilizamos la función rowCount(), que como adivináis, nos dice el numero de registros..
        // 0 -> el usuario no existe, 1-> si el usuario existe
        // Necesitamos un usuario en nuestra tabla:  insert intoud5_pildoras_usuarios_pass(id, password, usuarios); 
        $numero_registro=$resultado->rowCount();

}catch(PDOException $e) {
    echo $e -> getMessage();
}


?>