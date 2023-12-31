<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>CRUD</title>
  <link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>
  <?php
include("conexion.php");
//Para realizar la conexion se puede hacer en una sola linea.
/*$conexion=$base->query("SELECT * FROM ud5_pildoras_datos_usuarios");
$registros = $conexion->fetchAll(PDO::FETCH_OBJ);*/

$registros = $base->query("SELECT * FROM ud5_pildoras_datos_usuarios")->fetchAll(PDo::FETCH_OBJ);

//Obtemer datos al introducir nuevo usuario y pulsar boton de insertar.
if (isset($_POST['cr'])) {
  $nombre = $_POST['Nom'];
  $apellido = $_POST['Ape'];
  $direccion = $_POST['Dir'];
  
  //Creamos las query para introducir un nuevo usuario con los datos recojidos anteriormente.
  $sql = "INSERT INTO ud5_pildoras_datos_usuarios (nombre, apellido, direccion) VALUES (:nom, :ape, :dir)";
  $resultado = $base -> prepare($sql);
  $resultado -> execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":dir"=>$direccion));

  //Y acabamos recargado la pagina.
  header("Location:index.php");

}

?>

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
    foreach ($registros as $persona): ?>

      <tr>
        <td>
          <?php echo $persona->id ?>
        </td>
        <td>
          <?php echo $persona->nombre ?>
        </td>
        <td>
          <?php echo $persona->apellido ?>
        </td>
        <td>
          <?php echo $persona->direccion ?>
        </td>
        <!-- Botones para borrado y actulizacion -->
        <td class="bot"><a FALTA-COMPLETAR ver archivo imagen con mismo nombre.png ?>"><input type='button' name='del' id='del'
              value='Borrar'></a></td>

        <!-- Añadimos los atributos necesarios para actualizar enviandolos por la url -->
        <td class='bot'><a
        FALTA-COMPLETAR ver archivo imagen con mismo nombre.png  ?>"><input
              type='button' name='up' id='up' value='Actualizar'></a></td>
      </tr>

      <?php endforeach; ?>
      <tr>
        <!-- Fila en la cual tenemos inputs para introducir los datos -->
        <td></td>
        <td><input type='text' name='Nom' size='10' class='centrado'></td>
        <td><input type='text' name='Ape' size='10' class='centrado'></td>
        <td><input type='text' name=' Dir' size='10' class='centrado'></td>
        <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p>
</body>

</html>