<?php
//Creamos una clase producto. Se usara para crear objetos de tipo producto
class Producto{
    private $cantidad;
    private $precio;
    private $nombre;
    private $stock;

    //Constructor
    public function __construct($cant,$pre,$nom,$stoc){
        $this->cantidad=$cant;
        $this->precio=$pre;
        $this->nombre=$nom;
        $this->stock=$stoc;
    }

    //Metodos de get y set de cada atributo
    public function setCantidad($cantidad){
        $this->cantidad=$cantidad;
    }
    public function getCantidad(){
        return $this->cantidad;
    }

    public function setPrecio($precio){
        $this->precio=$precio;
    }
    public function getPrecio(){
        return $this->precio;
    }


    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function getStock(){
        return $this->stock;
    }

    public function setStock($stockN){
        $this->stock=$stockN;
    }
}
    if(isset($_POST['cerrar'])){
        echo "<script>window.location='login.php'</script>";
    }
    if($_POST){

        //Creamos los objetos.
        $producto1=new Producto($_POST["select1"],600.00,"Audifonos",5);
        $producto2=new Producto($_POST["select2"],12000.00,"iPhone",6);
        $producto3=new Producto($_POST["select3"],6500.00,"Laptop HP",4);
        $producto4=new Producto($_POST["select4"],9000.00,"Laptop Acer",5);
        $producto5=new Producto($_POST["select5"],10000.00,"Laptop ASUS",7);
        $producto6=new Producto($_POST["select6"],10200.00,"Laptop DELL",5);
        
        $stock1=$producto1->getStock();
        $stock2=$producto2->getStock();
        $stock3=$producto3->getStock();
        $stock4=$producto4->getStock();
        $stock5=$producto5->getStock();
        $stock6=$producto6->getStock();
        //Condicional que verifica que se selecciona al menos un producto
        $condicional=$producto1->getCantidad()!=0 || $producto2->getCantidad()!=0 || $producto3->getCantidad()!=0 ||
        $producto4->getCantidad()!=0 || $producto5->getCantidad()!=0 || $producto6->getCantidad()!=0;

        if($condicional){
            //Creamos un array que alamacene todos los objetos para despues convertirlo a un JSON
            $carro= [['producto'=>$producto1->getNombre(),'cantidad'=>$producto1->getCantidad(),'precio'=>$producto1->getPrecio(),'total'=>($producto1->getCantidad()*$producto1->getPrecio())],
            ['producto'=>$producto2->getNombre(),'cantidad'=>$producto2->getCantidad(),'precio'=>$producto2->getPrecio(),'total'=>($producto2->getCantidad()*$producto2->getPrecio())],
            ['producto'=>$producto3->getNombre(),'cantidad'=>$producto3->getCantidad(),'precio'=>$producto3->getPrecio(),'total'=>($producto3->getCantidad()*$producto3->getPrecio())],
            ['producto'=>$producto4->getNombre(),'cantidad'=>$producto4->getCantidad(),'precio'=>$producto4->getPrecio(),'total'=>($producto4->getCantidad()*$producto4->getPrecio())],
            ['producto'=>$producto5->getNombre(),'cantidad'=>$producto5->getCantidad(),'precio'=>$producto5->getPrecio(),'total'=>($producto5->getCantidad()*$producto5->getPrecio())],
            ['producto'=>$producto6->getNombre(),'cantidad'=>$producto6->getCantidad(),'precio'=>$producto6->getPrecio(),'total'=>($producto6->getCantidad()*$producto6->getPrecio())]
            ];
            $jsonCarro=json_encode($carro);
            $jsonArchivo = file_put_contents("jsonCarroCompras.json",$jsonCarro);
            echo "<script>window.location='carro-de-compras.php'</script>";
        }else{
            echo "<script>alert('Por favor, seleccione un producto');</script>";
        }
        
    }else{
            $stock1=5;
            $stock2=6;
            $stock3=4;
            $stock4=5;
            $stock5=7;
            $stock6=5;
    }
    
?>

<!DOCTYPE html>
<html>
    <style>
        h1{
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        input[type='submit']{
            background-color: #3ABAF1;
            font-family: sans-serif;
            font-size: medium;
            color: black;
            padding: 8px 10px;
            margin: 8px 0px;
            border: solid;
            cursor: pointer;
            width: 10%;
        }
        p{
            font-family: sans-serif;
            font-size: medium;
            display: flex;
            justify-content: start;
            align-items: start;
            margin-left: 1%;
        }
        table{
            border: 3px solid #432332;
            background-color: #3ABAF1;
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
        .carro{
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
        }
        .contenedor{
            height: 45px;
            margin: 6%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
        p{
            font-family: Arial;
            width: 50%;
        }
        body{
            background-color: #b9f8f0;
        }
    </style>
<head>
</head>
<body>
    <form method="post" action="usuario.php">
    
    <h1>Tienda E-COMMERCE
    <div style='text-align: right;width:780px'>
        <button type="submit" name="carrito"><img class="carro" src="carrito-de-compras.png"></button>
    </div>
    </h1>
    <section>
    
        <hr>
        <!------------------------------1 ARTICULO-------------------------------------------->
        <div class="contenedor">
        <table>
            <tr><td><img src="audifonos.png"/></td></tr>
            <tr><td><label>Audifonos</label></td></tr>
            <tr><td><label>Precio: $600.00</label></td></tr>
            <tr><td>
            <?php
            echo "<label>Stock: ".$stock1."</label><br>";
            echo "Cantidad: ";
            echo "<select name='select1'>";
            
            for ($i=0; $i <= $stock1; $i++) {
                echo "<option value='".$i."'>".$i."</option>";
            }
            echo "</select>";
            ?>
            </td></tr>
        </table>
        <p>Audifonos de alta gama</p>
        </div>
    <!------------------------------2 ARTICULO-------------------------------------------->
        <hr>
        <div class="contenedor">
        <table>
            <tr><td><img src="iphone.png"/></td></tr>
            <tr><td><label name="iphone">iPhone</label></td></tr>
            <tr><td><label>Precio: $12,000.00</label></td></tr>
            
            <tr><td>
            <?php
            echo "<label>Stock: ".$stock2."</label><br>";
            echo "Cantidad: ";
            echo "<select name='select2'>";
            for ($i=0; $i <= $stock2; $i++) {
                echo "<option value='".$i."'>".$i."</option>";
            }
            echo "</select>";
            ?>
            </td></tr>
        </table>
        <p>iPhone ultimo modelo</p>
        </div class="contenedor">
        <!------------------------------3 ARTICULO-------------------------------------------->
        <hr>
        <div class="contenedor">
        <table>
            <tr><td><img src="laptop hp.png"/></td></tr>
            <tr><td><label>Laptop HP</label></td></tr>
            <tr><td><label>Precio: $6,500.00</label></td></tr>

            <tr><td>
            <?php
            echo "<label>Stock: ".$stock3."</label><br>";
            echo "Cantidad: ";
            echo "<select name='select3'>";
            for ($i=0; $i <= $stock3; $i++) {
                echo "<option value='".$i."'>".$i."</option>";
            }
            echo "</select>";
           
            ?>
            </td></tr>
        </table>
        <p>Laptop HP de alto rendimiento</p>
        </div>
        <!------------------------------4 ARTICULO-------------------------------------------->
        <hr>
        <div class="contenedor">
        <table>
            <tr><td><img src="laptop acer.png"/></td></tr>
            <tr><td><label>Laptop Acer</label></td></tr>
            <tr><td><label>Precio: $9,000.00</label></td></tr>
           
            <tr><td>
            <?php
            echo "<label>Stock: ".$stock4."</label><br>";
            echo "Cantidad: ";
            echo "<select name='select4'>";
            for ($i=0; $i <= $stock4; $i++) {
                echo "<option value='".$i."'>".$i."</option>";
            }
            echo "</select>";
            
            ?>
            </td></tr>
        </table>
        <p>Laptop Acer de alto rendimiento</p>
        </div>
        <!------------------------------5 ARTICULO-------------------------------------------->
        <hr>
        <div class="contenedor">
        <table>
            <tr><td><img src="laptop asus.png"/></td></tr>
            <tr><td><label>Laptop ASUS</label></td></tr>
            <tr><td><label>Precio: $10,000.00</label></td></tr>
            
            <tr><td>
            <?php
            echo "<label>Stock: ".$stock5."</label><br>";
            echo "Cantidad: ";
            echo "<select name='select5'>";
            for ($i=0; $i <= $stock5; $i++) {
                echo "<option value='".$i."'>".$i."</option>";
            }
            echo "</select>";
    
            ?>
            </td></tr>
        </table>
        <p>Laptop ASUS de alto rendimiento en juegos.</p>
        </div>

        <!------------------------------6 ARTICULO-------------------------------------------->
        <hr>
        <div class="contenedor">
        <table>
            <tr><td><img src="laptop dell.png"/></td></tr>
            <tr><td><label>Laptop DELL</label></td></tr>
            <tr><td><label>Precio: $10,200.00</label></td></tr> 
            <tr><td>
            <?php
            echo "<label>Stock: ".$stock6."</label><br>";
            echo "Cantidad: ";
            echo "<select name='select6'>";
            for ($i=0; $i <= $stock6; $i++) {
                echo "<option value='".$i."'>".$i."</option>";
            }
            echo "</select>";
            ?>
            </td></tr>
        </table>
        <p>Laptop HP de alto rendimiento</p>
        </div>
        <hr>
        <input type="submit" value="Cerrar sesion" name="cerrar">
    </section>
    </form>
</body>
</html>