<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
         require_once("Conectar.php");
         $base=Conectar::conexion();
        //Obtenemos el id del objeto a borrar.
       
        
        
            $nombre = $_GET['Nom'];
            $apellido = $_GET['Ape'];
            $direccion = $_GET['Dir'];
        
            //Creamos las query para introducir un nuevo usuario con los datos recojidos anteriormente.
            $sql = "INSERT INTO ud5_pildoras_datos_usuarios (nombre, apellido, direccion) VALUES (:nom, :ape, :dir)";
        
            $resultado = $base->prepare($sql);
            $resultado->execute(array(":nom" => $nombre, ":ape" => $apellido, ":dir" => $direccion));
        
            //Y acabamos recargado la pagina.
            header("Location:../index.php");
        
        
          
       
       
       
       
       
       
       
        header("Location:../index.php");



    ?>
</body>
</html>