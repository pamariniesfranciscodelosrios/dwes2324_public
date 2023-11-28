<?php
//Este archivo es el que hará referencia a la interfaz de usuario
//por tanto es el único , por ahora, que contiene HTML


?>
<head>

 
<meta charset="utf-8">
<title>Personas View</title>

</head>

<body>

    <h2>Personas VIEW</h2>

    <p>Esta práctica es un sistema CRUD MVC, video 82  Píldoras</p>  

    <?php 
    
    require("modelo/paginacion.php");
    
    /*
    <table>

    <tr><td> Nombre del artículo </td>
    <?php
    
        foreach($matriz_productos as $registro){
            
            echo " <tr><td>" . $registro["nombrearticulo"] . " </tr></td>";
          }

    ?>

    </table>
          ?>


    ?>
    */?>
     
     <h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table width="50%" border="0" align="center">
      <tr>
        <td class="primera_fila">Id</td>
        <td class="primera_fila">Nombre</td>
        <td class="primera_fila">Apellido</td>
        <td class="primera_fila">Dirección</td>
        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
      </tr>

      <?php
    //Buble para mostrar todos los registros de personas de la BBDD.
    foreach ($matriz_personas as $persona): ?>

      <tr>
        <td>
          <?php echo $persona["id"] ?>
        </td>
        <td>
          <?php echo $persona["nombre"] ?>
        </td>
        <td>
          <?php echo $persona["apellido"] ?>
        </td>
        <td>
          <?php echo $persona["direccion"] ?>
        </td>
        <!-- Botones para borrado y actulizacion -->
        <td class="bot"><a href="modelo/borrar.php?id=<?php echo $persona["id"] ?>"><input type='button' name='del' id='del'
              value='Borrar'></a></td>

        <!-- Añadimos los atributos necesarios para actualizar enviandolos por la url -->
        <td class='bot'><a
            href="modelo/editar.php?id=<?php echo $persona["id"] ?> & nom=<?php echo $persona["nombre"] ?> & ape=<?php echo $persona["apellido"] ?> & dir=<?php echo $persona["direccion"] ?>"><input
              type='button' name='up' id='up' value='Actualizar'></a></td>
      </tr>

      <?php endforeach; ?>
      <tr>
        <!-- Fila en la cual tenemos inputs para introducir los datos -->
        <td></td>
        <td><input type='text' name='Nom' size='10' class='centrado'></td>
        <td><input type='text' name='Ape' size='10' class='centrado'></td>
        <td><input type='text' name=' Dir' size='10' class='centrado'></td>
        
        <td class="bot"><a href="modelo/insertar.php?nom=$Nom & ape=$Ape & dir=$Dir"><input type='button' name='ins' id='ins'
              value='Insertar'></a></td> 
      </tr>

      <tr><td><?php
                            //---------------------------Paginacion----------------------------------
                            
                           for ($i = 1; $i <= $total_paginas; $i++) {
                              echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";
                            }
                        ?></td></tr>
    </table>
  </form>

     

 
    


</body>
</html>