<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>
<?php
  //Datos para la conexion de mysql con pdo.
  include("conexion.php");

  if (!isset($_POST['bot_actualizar'])) {
    //Variables obtenidas al pulsar el boton de actualizar.
    $id = $_GET['id'];  
    $nom = $_GET['nom'];
    $ape = $_GET['ape'];
    $dir = $_GET['dir'];
  }else{
    $id = $_POST['id'];  
    $nom = $_POST['nom'];
    $ape = $_POST['ape'];
    $dir = $_POST['dir'];

    //Se crea la consulta para actualizar los campo y se ejecuta.
    $sql = "UPDATE ud5_pildoras_datos_usuarios SET nombre=:miNom, apellido=:miApe, direccion=:miDir WHERE id =:miId";
    $resultado = $base->prepare($sql);
    $resultado -> execute(array(":miId"=>$id, ":miNom"=>$nom, ":miApe"=>$ape, ":miDir"=>$dir, ));

    //Redireccionamos a index.php
    header("Location:index.php");


  }


?>
<p>
 
</p>
<p>&nbsp;</p>

<!-- Se inserta la informacion del usuario en cada campo con php -->
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="25%" border-color="0px" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $id ?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $nom ?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $ape ?>"></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="dir" id="dir" value="<?php echo $dir ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>