<?php
include "ventas.php";
include_once "producto.php";
include_once "usuario.php";


if(isset($_POST["codigo"]) && isset($_POST["cantidad"]) && isset($_POST["formato"]) && isset($_POST["id"]))
{
    $codigo = $_POST["codigo"];
    $cantidad = $_POST["cantidad"];
    $formato = $_POST["formato"];
    $id = $_POST["id"];
    $arrayUsuarios = Usuario::LeerJSON("usuarios.json");
  
    $verificacionId = Usuario::VerificarID($id,$arrayUsuarios);

    if($verificacionId)
    {
        $resultado = Ventas::RealizarVenta($codigo,"ventas.json",$cantidad,$id,"productos.json","json");
        echo $resultado;
    }else 
    {
        echo 'El usuario no existe';
    }
}else
{
    echo 'Complete todos los datos';
}
?>