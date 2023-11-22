<head>
<meta charset="utf-8">
<title>LOGIN Misma Pagina</title>
</head>

<body>

<?php

                setcookie("nombre_usuario", "admin", time()-1);
                echo "cookie destruida";
         

?>

    
</body>
</html>