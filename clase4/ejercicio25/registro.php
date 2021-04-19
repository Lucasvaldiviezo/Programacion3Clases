<?php
include "producto.php";

if(isset($_POST["nombre"]) && isset($_POST["codigo"]) && isset($_POST["stock"]) && isset($_POST["formato"]) &&
isset($_POST["tipo"]) && isset($_POST["precio"]))
{
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];
    $stock = $_POST["stock"];
    $precio = $_POST["precio"];
    $tipo = $_POST["tipo"];
    $producto = new Producto($codigo,$nombre,$tipo,$stock,$precio);
    $formato = $_POST["formato"];

    if(Producto::VerificarArchivo("productos.json"))
    {
        $verificacion = Producto::VerificarProducto($producto,"productos.json");
        if($verificacion == "nuevo")
        {
            $producto->Guardar("productos.json","json");
            echo 'Producto Ingresado';
        }else if($verificacion == "actualizar")
        {
            $producto->Actualizar("productos.json","json");
            echo 'Producto Actualizado';
        }
    }else
    {
        $producto->Guardar("productos.json","json");
        echo 'Producto Ingresado';
    }  
}else
{
    echo 'Complete todos los datos';
}
?>