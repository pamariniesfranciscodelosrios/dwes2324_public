<?php
try {

    $usuario='root';
    $password="";

    //dbport: 3306 para MySQL y 3307 para MariaDB

    $mbd = new PDO('mysql:host=localhost;dbport=3307;dbname=dwes', $usuario, $password);
    
    foreach($mbd->query('SELECT * fromud5_pildoras_usuarios_pass') as $fila) {
        print_r($fila);
    }
    $mbd = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}



//https://mariadb.com/resources/blog/developer-quickstart-php-data-objects-and-mariadb/
//https://stackoverflow.com/questions/52364415/php-with-mysql-8-0-error-the-server-requested-authentication-method-unknown-to
//ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
//https://www.youtube.com/watch?v=FYVahs3D7FU
/*Re-run the installer.
Select the quick action 're-configure' next to product 'MySQL Server'
Go through the options till you reach Authentication Method and select 'Use Legacy Authentication Method'
*/
?>



