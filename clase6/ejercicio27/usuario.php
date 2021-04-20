<?php
include_once "AccesoDatos.php";
class Usuario
{
    public $id;
    public $nombre;
    public $apellido;
    public $clave;
    public $mail;
    public $FechaRegistro;
    public $localidad;

    public function __construct($nombre,$apellido,$clave,$mail,$localidad)
    {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->clave = $clave;
            $this->mail = $mail;
            $this->FechaRegistro = date("y-m-d");
            $this->localidad = $localidad;
    }

    public function InsertarUsuarioParametros()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (nombre,apellido,clave,mail,Fechaderegistro,localidad)values(:nombre,:apellido,:clave,:mail,:Fechaderegistro,:localidad)");
        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $consulta->bindValue(':Fechaderegistro', $this->FechaRegistro, PDO::PARAM_STR);
        $consulta->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
        $consulta->execute();		
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

}
?>