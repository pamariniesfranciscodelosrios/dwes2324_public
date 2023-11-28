<?php
// Lo incluimos aquí ya que requiere conexión con la bbdd

 //--------------------------PAGINACION--------------------------------
//variables usadas para la pagiancion

require_once("Conectar.php");
$base=Conectar::conexion();

$tamano_paginas = 3;

if (isset($_GET['pagina'])) {
  if ($_GET['pagina'] == 1) {
    header('Location:index.php');
  } else {
    $pagina = $_GET['pagina'];
  }
} else {
  $pagina = 1;
}

$empezar_desde = ($pagina - 1) * $tamano_paginas;

//query la cual ejecutaremos usando la paginacion.
$sql_total = "SELECT * FROM ud5_pildoras_datos_usuarios";

//Añadimos la query a ejecutar en resultado y la ejecutamos.
$resultado = $base->prepare($sql_total);
$resultado->execute(array());

//Variables usadas para la paginacion de las tuplas.
$num_filas = $resultado->rowCount();
$total_paginas = ceil($num_filas / $tamano_paginas);
// ceil redonde el resultado 3.7 -> 4

//--------------------------PAGINACION--------------------------------




?>