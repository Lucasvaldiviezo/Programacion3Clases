<?php
include "producto.php";
include "usuario.php";
include "ventas.php";

var_dump(isset($_POST["nombre"]),isset($_POST["clavenueva"]),isset($_POST["clavevieja"]),isset($POST_["mail"]));
if(isset($_POST["nombre"]) && isset($_POST["clavenueva"]) && isset($_POST["clavevieja"]) && isset($POST_["email"]))
{
    $nombre = $_POST["nombre"];
    $claveNueva = $_POST["clavenueva"];
    $claveVieja = $_POST["clavevieja"];
    $mail = $_POST["email"];
    
    //$resultado = Ventas::RealizarVenta($codigo,$idUsuario,$cantidad);
    echo $resultado;

}else
{
    echo 'Complete todos los datos';
}
?>