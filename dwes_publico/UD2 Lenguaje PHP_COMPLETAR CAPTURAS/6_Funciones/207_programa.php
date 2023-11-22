<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>207 include</title>
</head>

<body>
    
    <?php
        //include '207_definiciones.php';
        //require '207_definiciones2.php'; 
        //Necesito
        include_once '207_definiciones.php';
        print "<br> 1 El grupo $grupo está definido en el archivo 207_definiciones ";
        print "<br> 2 En su dia sacó el disco $disco";
       
        
        //Si vuelvo a incluir el archivo se detiene aqui
        //include '207_definiciones.php';
        //include_once '207_definiciones2.php';
        print "<br> 3 funcion". funcion_test();


    ?>
</body>
</html>