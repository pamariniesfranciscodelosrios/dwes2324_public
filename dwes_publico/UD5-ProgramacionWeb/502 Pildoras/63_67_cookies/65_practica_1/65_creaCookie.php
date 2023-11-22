<!doctype html>
<html>

<head>
  <title>Video 65 Práctica 1 </title>
  <body style="background-color:rgb(246,243,229);">
</head>

  

<?php
/*
  Alumno: Nombre Apellido1 Apellido2
  Fecha: DD/MM/AAAA
  Finalidad: 
*/


    setcookie("idioma_seleccionado",$_GET["idioma"]);//, +86400);
    //  setcookie("idioma_seleccionado","en");//, +86400);
    //header("location:65_ver_cookie.php");

    if (!$_COOKIE["idioma_seleccionado"])
       header("location:65_pag1.php");
    else  if ($_COOKIE["idioma_seleccionado"] == "es")
        header("location:65_spanish.php");
    else if ($_COOKIE["idioma_seleccionado"] == "en")
        header("location:65_english.php");
?>



</body>

</html>
