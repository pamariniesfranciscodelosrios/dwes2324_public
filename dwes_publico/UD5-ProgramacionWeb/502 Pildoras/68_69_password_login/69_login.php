<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    h1 {
        text-align: center;
        color: #00F;
        border-bottom: dotted #0000FF;
        width: 50%;

    }

    table {
        border: 1px solid #F00;
        padding: 20px 50px;
        margin-top: 50px
    }

    body {
        display: flex;
        background-color: #FFC;
        flex-direction: column;
        align-content: center;
        align-items: center;
    }
    </style>

</head>

<body>
    <!-- HTML con estilizada para la inseccion de nuevos productos a la base de datos. Cuenta con todos los campos que componen a un nuevo objeto almacenado. A parte de esto cuenta con dos botones uno para enviar como otro para resetear el formulario. -->
    <h1>Login</h1>
    <form name="form1" method="post" action="69_comprueba_login.php">
        <table boder="0" align-items="center">
            <tr>
                <td>Usuario</td>
                <td><label for="usuario"></label>
                    <input type="text" name="usuario" id="usuario">
                </td>
            </tr>
            <tr>
                <td>Contraseña</t>
                <td><label for="contra"></label>
                    <input type="text" name="contra" id="contra">
                </td>
            </tr>
           
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><input type="submit" name="enviar" id="enviar" value="Buscar"></td>
                <td><input type="reset" name="Borrar" id="Borrar" value="Borrar"></td>
            </tr>
        </table>
    </form>

</body>

</html>