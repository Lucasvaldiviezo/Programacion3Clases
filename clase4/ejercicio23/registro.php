<?php
include "usuario.php";
if(isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["mail"]) && isset($_POST["formato"]) && isset($_FILES["foto"]))
{
    $destino = "Usuario/Fotos/" . $_FILES["foto"]["name"];
    move_uploaded_file($_FILES["foto"]["tmp_name"],$destino);
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];
    $usuario = new Usuario($nombre,$clave,$mail,$destino);

    $formato = $_POST["formato"];
    $bool = $usuario->Guardar("usuarios.json",$formato);
    
    if($bool != false)
    {
        var_dump(Usuario::LeerJSON("usuarios.json"));
        echo 'Se guardaron los datos';
    }else
    {
        echo 'No se guardaron los datos';
    }

}else
{
    echo 'Complete todos los datos';
}
?>