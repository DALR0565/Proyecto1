<?php
    $total=0;
    $productos=json_decode(file_get_contents(__DIR__.'/jsonCarroCompras.json'),true);
    echo "<form method='post' action='resumen-compra.php'>
    <h1>Carro de compras</h1>
    <hr>";

    foreach($productos as $producto){
        if($producto['cantidad'] != 0){
            echo "<div class='contenedor'>
            <table>
                <tr><td><img src='".strtolower($producto['producto']).".png'/></td></tr>
                <tr><td><label>".$producto['producto']."</label></td></tr>
                <tr><td><label>Precio: $".$producto['precio']."</label></td></tr>
                <tr><td><label>Cantidad: ".$producto['cantidad']."</label></td></tr>
                <tr><td><label>Total: $".$producto['total']."</label></td></tr>
            </table>
            </div>
            <hr>";
        }
        $total=$total+$producto['total'];
    }
    echo "<tr><td><h2>El total a pagar es de: $".$total."</h2></td></tr>";
    echo "<div style='text-align: right;width:780px'>";
    echo "<input type=submit value='Comprar'></div>
    </form>";
?>

<!DOCTYPE html>
<style>
    input[type=submit]{
            background-color: #1C94C8;
            color: white;
            padding: 8px 10px;
            margin: 8px 0px;
            border: solid;
            cursor: pointer;
        }
    h1{
        font-family: sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    h2{
        font-family: sans-serif;
        color: chocolate;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    table{
            border: 3px solid #432332;
            background-color: #3ABAF1;
        }
        img{
            width: 100px;
            height: 100px;
        }
        .contenedor{
            /*background-color: #fcfcd7;*/
            height: 50px;
            margin: 6%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
</style>
<html>
    <head>
    </head>
    <body>
        
    </body>
</html>