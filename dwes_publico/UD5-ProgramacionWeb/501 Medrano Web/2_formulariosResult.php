<?php

if(isset($_GET["lenguajes"])){
    $lenguajes = $_GET["lenguajes"];
    foreach ($lenguajes as $lenguaje) {
        echo "$lenguaje <br />";
    }
}else{
    echo "<br />No hay lenguajes";
}
?>