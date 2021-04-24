<?php
include "producto.php";
include "usuario.php";
include "ventas.php";

if(isset($_POST["codigo"]) && isset($_POST["idUsuario"]) && isset($_POST["cantidad"]))
{
    $idUsuario = $_POST["idUsuario"];
    $codigo = $_POST["codigo"];
    $cantidad = $_POST["cantidad"];
    
    $resultado = Ventas::RealizarVenta($codigo,$idUsuario,$cantidad);
    echo $resultado;

}else
{
    echo 'Complete todos los datos';
}
?>