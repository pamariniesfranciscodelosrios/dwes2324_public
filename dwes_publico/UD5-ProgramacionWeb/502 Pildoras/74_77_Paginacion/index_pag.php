<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginación</title>
</head>
<body>
    <?php
        try {
            //Datos y atributos usados para la conexion por pdo a mysql 
            $base=new PDO ("mysql:host=localhost; dbname=dwes", "root", "");
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base->exec('SET CHARACTER SET UTF8'); 

            //variables usadas para la pagiancion
            $tamano_paginas = 3;

            if (isset($_GET['pagina'])) {
                if ($_GET['pagina']==1) {
                    header('Location:index.php');
                }else{
                    $pagina = $_GET['pagina'];
                }
            }else{
                $pagina = 1;
            }
            
            $empezar_desde = ($pagina-1)*$tamano_paginas;

            //query la cual ejecutaremos usando la paginacion.
            $sql_total = "SELECT nombrearticulo, seccion, precio, paisdeorigen FROM productos WHERE seccion ='DEPORTES'";

            //Añadimos la query a ejecutar en resultado y la ejecutamos.
            $resultado = $base->prepare($sql_total);
            $resultado->execute(array());

            //Variables usadas para la paginacion de las tuplas.
            $num_filas = $resultado->rowCount();
            $total_paginas = ceil($num_filas/$tamano_paginas);

            echo "Número de registros de la consulta: " . $num_filas . "<br>";
            echo "Mostramos: " . $tamano_paginas . " registros por página <br>";
            echo "Mostrando la página: " . $pagina . " de " . $total_paginas . "<br><br><br>";


            $resultado -> closeCursor();

            //query la cual ejecutaremos usando la paginacion.
            $sql_total = "SELECT nombrearticulo, seccion, precio, paisdeorigen FROM productos WHERE seccion ='DEPORTES' LIMIT $empezar_desde,$tamano_paginas";

            //Añadimos la query a ejecutar en resultado y la ejecutamos.
            $resultado = $base->prepare($sql_total);
            $resultado->execute(array());

            //Imprime todos los datos paginados que hemos hecho anteriormente.
            while ($registro = $resultado -> fetch(PDO::FETCH_ASSOC)) {
                echo "Nombre Articulo: " . $registro['nombrearticulo'] . " seccion: " . $registro['seccion'] . " precio: " . $registro['precio'] . " País: " . $registro['paisdeorigen']. "<br>";
            }

        } catch (Exception $e) {
            echo "<br> la línea de error : " . $e->getLine();
        }


        //---------------------------Paginacion----------------------------------

        for ($i=1; $i<=$total_paginas; $i++){
            echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";
        }

    ?>
</body>
</html>