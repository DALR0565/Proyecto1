<?php
$nombre=$_POST["txtusuario"];
$contrasena=$_POST["txtcontrasena"];

if($nombre == "daniel"){
    if($contrasena == "123"){
        echo "<script>window.location='usuario.html'</script>"
    }else{

    }
}else{
    if($nombre == "administrador "){
        if($contrasena == "asd"){
            echo "<script>window.location='admin.html'</script>"
        }else{

        }
    }
}
?>