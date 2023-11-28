<?php

    include("modelo/Personas_model.php"); //incluimos el resto de archivos MVC
    


    //ejecuto el constructor del modelo

    $personas = new Personas_model(); //creamos objeto y se llama al constructor

    $matriz_personas= $personas->get_personas();

    include("vista/Personas_view.php");


?>