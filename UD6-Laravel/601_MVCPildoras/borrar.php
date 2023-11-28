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
        $id = $_GET["id"];
        //Creamos la query para que con el id introducido lo borre en la base de datos
        $base -> query("DELETE FROM ud5_pildoras_datos_usuarios WHERE id='$id'");
        //Se vuelve a cargar el arvhivo del formulario.
        header("Location:../index.php");
    ?>
</body>
</html>