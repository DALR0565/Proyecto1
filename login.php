<?php
//Si hay una peticion POST se reciben y almacenan en variables
if(isset($_POST['txtusuario'])){
    $nombre=$_POST["txtusuario"];
    $contrasena=$_POST["txtcontrasena"];

    if($nombre == "cliente"){
        if($contrasena == "123"){
            echo "<script>window.location='usuario.php'</script>";
        }else{
            $error="<tr><td><B><FONT COLOR='red'>Error!</B><br><B>Contrasena incorrecta</FONT></B></td></tr>";
        }
    }else{
        if($nombre == "administrador"){
            if($contrasena == "asd"){
                echo "<script>window.location='admin.php'</script>";
            }else{
                $error="<tr><td><B><FONT COLOR='red'>Error!</B><br><B>Contrasena incorrecta</FONT></B></td></tr>";
            }
        }else{
            $error="<tr><td><B><FONT COLOR='red'>Error!</B><br><B>Usuario no existe</FONT></B></td></tr>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <!--Declaramos un estilo para la tabla, los campos de texto, imagen, etc.-->
    <style>
        form{
            margin: 5%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        table{
            border: 2px solid #353A46;
            background-color: #3ABAF1;
        }

        input[type=text], input[type=password]
        {
            width: 100%;
            padding: 8px 20px;
            border: 2px solid #CCC;
            box-sizing: border-box;
        }
        img{
            width: 100px;
            height: 100px;
        }
        label
        {
            font-size: 14px;
            font-weight: bold;
            font-family: Arial;
        }
        input[type=submit]{
            background-color: #1C94C8;
            color: white;
            padding: 8px 10px;
            margin: 8px 0px;
            border: solid;
            cursor: pointer;
            width: 40%;

        }
        body{
            background-color: #b9f8f0;
        }
    </style>
<head>
    <title>Tienda</title>
</head>
<body>
    <form method="post" action="login.php">
        <table>
            <tr><td colspan="2" style="background-color: #33A8DB; padding-bottom: 5px; padding-top: 5px;"><label>Iniciar Sesion</label></td></tr>
            <tr><td align="center" rowspan="5"><img src="iniciar_sesion.png"/></td><td><label>Usuario</label></td></tr>
            <tr><td><input type="text" name="txtusuario" placeholder="nombre de usuario"/></td></tr>
            <tr><td><label>Contrasena</label></td></tr>
            <tr><td><input type="password" name="txtcontrasena" placeholder="contrasena"/></td></tr>
            <tr><td><input type="submit" value="Ingresar"/></td></tr>
            <tr><td>
            <?php
                if(isset($error)){
                    echo $error;
                }
            ?>
            </td></tr>
            <!--En caso de que la contrasena o usuario no existan se imprime el mensaje correspondiente-->
        </table>
    </form>
</body>
</html>