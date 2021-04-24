<?php
include "producto.php";

if(isset($_POST["nombre"]) && isset($_POST["codigo"]) && isset($_POST["stock"]) && isset($_POST["tipo"]) && isset($_POST["precio"]))
{
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];
    $stock = $_POST["stock"];
    $precio = $_POST["precio"];
    $tipo = $_POST["tipo"];
    
    $producto = new Producto();
    $producto->__construct1($codigo,$nombre,$tipo,$stock,$precio);

    
    $resultado = Producto::GuardarBD($producto);
    echo $resultado;

}else
{
    echo 'Complete todos los datos';
}
?>