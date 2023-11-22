<head>
<meta charset="utf-8">
<title>LOGIN </title>
</head>

<body>

<?php

require ("../config.php");

//para permitir o no , entrar a la zona de usuario autenticados
$autenticado = false; 
//si ha activado la casilla, se creará la cookie, si no no

//bloque try-catch, intenta y si no captura excepción
if(isset($_POST["enviar"])){
try{
        //Mejoramos el video de Píldoras con lo anterior
        //$base=new PDO("mysql:host=localhost; dbport=3307; dbname=dwes","root","");
        $base=new PDO(DB_HOST.";".DB_NOMBRE,DB_USUARIO, DB_CONTRA);
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");
        // definimos nuestra consulta en SQL, 
        // :login :password son los MARCADORES para la consulta 
        $sql= "SELECT * FROM ud5_pildoras_usuarios_pass where user= :login and pass= :password";
        //esta función se encarga de preparar la consulta
        $resultado=$base->prepare($sql);
        //convierte cualquier simbolo en HTML, comilla, guión bajo...
        //addslashes -> buscar en el manual php
        $login=htmlentities(addslashes($_POST["login"]));
        // lo mismo con el pass
        $password=htmlentities(addslashes($_POST["password"]));
        // ahora tenemos que identificar cada marcador de la sentencia SQL con su correspondiente valor (login/password)
        $resultado->bindValue(":login", $login);
        // bind = Unir, enlazar.. con el valor pasado en POST para enviar a SQL
        $resultado->bindValue(":password", $password); // bind = Unir, enlazar.. con el valor pasado en POST para enviar a SQL
        //ahora, ya preparada, podemos llamar a la función EXECUTE
        $resultado->execute(); 

        // No necesitamos imprimir en pantalla, solo saber si el usuario está o no está
        // Para ello utilizamos la función rowCount(), que como adivináis, nos dice el numero de registros..
        // 0 -> el usuario no existe, 1-> si el usuario existe
        // Necesitamos un usuario en nuestra tabla:  insert intoud5_pildoras_usuarios_pass(id, password, usuarios); 
        $numero_registro=$resultado->rowCount();

        //ahora compruebo
        if($numero_registro!=0)
        {
            //Usuario Existe
            //echo "<h2> Adelante ! </h2>"; //Enviamos notificación en HTML

            $autenticado=true; // se ha logueado con existo
            //Del video 62 cuando se logueaba con Sesiones en lugar de con Cookies
           


            if (isset($_POST["recordar"]))
            {
                //session_start();  //PARTE2
                //$_SESSION["usuario"]=$_POST["login"];
                setcookie("nombre_usuario", $_POST["login"], time() + 86400);
            }
         

        }else{
             // Usuario NO existe
            //Bucle infinito, le redirijo de nuevo a la página
            //header("location:login.php"); 
            echo "Usuario incorrecto";
        }


}catch(Exception $e){

    die("Error: " . $e->getMessage());

}

} // cierre condicional if isset enviar

?>



<?php 

    if($autenticado==false)
    {   //incluye el formulario, si nNO 
        if(!isset( $_COOKIE["nombre_usuario"]) )
             include("formulario.html");

    }




    if (isset($_COOKIE["nombre_usuario"]) )
        echo "Hola ". $_COOKIE["nombre_usuario"];
    else if ($autenticado == true )
        echo "Hola ". $_POST["login"];



    if ($autenticado == true || isset($_COOKIE["nombre_usuario"]) )
        include("zona_registrados.html"); //zona_registrados




    include("lorem_ipsum.html");
?>

    
</body>
</html>