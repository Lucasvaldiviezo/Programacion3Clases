<?php
include_once "AccesoDatos.php";
class Usuario
{
    public $id;
    public $nombre;
    public $apellido;
    public $clave;
    public $mail;
    public $Fechaderegistro;
    public $localidad;

    public function __construct()
    {

    }
    public function __construct1($nombre,$apellido,$clave,$mail,$localidad)
    {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->clave = $clave;
            $this->mail = $mail;
            $this->Fechaderegistro = date("y-m-d");
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
        $consulta->bindValue(':Fechaderegistro', $this->Fechaderegistro, PDO::PARAM_STR);
        $consulta->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
        $consulta->execute();		
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    public static function TraerTodoLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, apellido as apellido,clave as clave,mail as mail, Fechaderegistro as FechaRegistro, localidad as localidad from usuarios");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS,"Usuario");		
	}

    public static function DibujarListado($arrayUsuarios)
    {
        $cadena = "<ul>";
        foreach($arrayUsuarios as $usuario)
        {
            $cadena .= "<li> ID: ". $usuario->id . " - Nombre: " . $usuario->nombre . " - Apellido: " . $usuario->apellido . " - Clave: " . $usuario->clave . 
            " - Email: " .  $usuario->mail . " - Fecha de Registro: " . $usuario->Fechaderegistro . " - Localidad: " . $usuario->localidad .  "</li>";
        }
        $cadena .= "</ul>";
     
        return $cadena;
    }

    public static function Login($usuario)
    {
        $retorno = "Error inesperado";

        $arrayUsuarios = self::TraerTodoLosUsuarios();

        foreach($arrayUsuarios as $auxUsuario)
        {
            if(self::VerificarMail($usuario->mail,$auxUsuario['mail']))
            {
                if(self::VerificarClave($usuario->clave,$auxUsuario['clave']))
                {
                    $retorno = "Verificado";
                    break;
                }else
                {
                    $retorno = "Error en los datos";
                    break;
                }
            }else
            {
                $retorno = "Usuario no registrado";
            }
        }
        
        return $retorno;
    }

    public static function VerificarMail($mailLogeado,$auxMail)
    {
        $retorno = false;
        if($mailLogeado == $auxMail)
            {
                $retorno = true;
            }
        return $retorno;
    }

    public static function VerificarClave($claveLogeada,$auxClave)
    {
        $retorno = false;
        if($claveLogeada == $auxClave)
        {
            $retorno = true;
        }
        return $retorno;
    }
}
?>