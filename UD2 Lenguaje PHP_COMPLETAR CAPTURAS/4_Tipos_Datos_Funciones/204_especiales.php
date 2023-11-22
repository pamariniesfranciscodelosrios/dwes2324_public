<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2.4 Tipos de Datos. Constantes</title>
</head>
<body>
    <?php
    print "<h2>UD2.4 Tipos de Datos. Especiales</h2>";
   
    print("<br/><h3>PHP_SELF</h3>");
    //print_r($_SERVER['PHP_SELF']);
    print($_SERVER['PHP_SELF']);

    print("<br/><h3>SESSION</h3>");
    print($_SESSION);


    print("<br/><h3>POST</h3>");
    print($POST);

    print("<br/><h3>ENV</h3>");
    print($_GET);

    print("<br/><h3>SESSION</h3>");
    print_r($_SERVER['SESSION']);


    print("<br/><h3>SERVER_ADDR</h3>");
    print_r($_SERVER['SERVER_ADDR']);

    print("<br/><h3>SERVER_NAME</h3>");
    print_r($_SERVER['PHP_SELF']);

    print("<br/><h3>SERVER_PROTOCOL</h3>");
    print_r($_SERVER['SERVER_PROTOCOL']);

    print("<br/><h3>PATH_INFO</h3>");
    print_r($_SERVER['PATH_INFO']);

    print("<br/><h3>PHP_SELF</h3>");
    print_r($_SERVER['PHP_SELF']);


    print("<br/><h3>ORIG_PATH_INFO</h3>");
    print_r($_SERVER['ORIG_PATH_INFO']);

    print("<br/>Variable S_SERVER");
    print_r($_SERVER);


    ?>
</body>
</html>