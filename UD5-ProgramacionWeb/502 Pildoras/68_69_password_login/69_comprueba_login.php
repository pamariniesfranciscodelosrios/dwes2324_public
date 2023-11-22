<?php
require ("../config.php");


  //  ▒▒▒▒▒▒▒▒ Almacenando usuario y password en BD ▒▒▒▒▒▒▒▒

  $usuario = $_POST["usuario"]; //$_POST["usuario"];
  $contra = $_POST["contra"];
 

   
 //CONECTANDO CON LA BBDD
  //  ▒▒▒▒▒▒▒▒ Consultando a través de la clase Persona ▒▒▒▒▒▒▒▒
  try{
        
        $base=new PDO(DB_HOST.";".DB_NOMBRE,DB_USUARIO, DB_CONTRA);
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

        $sql= "SELECT * FROM ud5_pildoras_usuarios_pass WHERE user= :usuario";
        //esta función se encarga de preparar la consulta
        $resultado=$base->prepare($sql);  
        $resultado->bindValue(":usuario", $usuario);  
        $resultado->execute(); 

        $contador=0;
        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                echo "<br> Usuario ". $registro['user']. " / Contraseña es ". $registro['pass'];
                if(password_verify($contra,$registro['pass'])){
                 $contador++;
                 echo "<br>Encontrado";
                }
        
        }
 
        if($contador>0)
                echo "<brHay al menos un usuario: $usuario registrado";
        else
                echo "<br>NO Hay ningún usuario: $usuario registrado";


        $resultado->closeCursor();

}catch(PDOException $e) {
    echo $e -> getMessage();
}


?>