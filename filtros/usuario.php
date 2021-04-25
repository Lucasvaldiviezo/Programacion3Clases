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

    public function CambiarClave($claveVieja,$claveNueva)
    {
        $retorno = "No se pudo cambiar la clave";
        if($claveVieja == $this->clave)
        {
            echo $claveNueva . "\n";
            echo $this->id . "\n";
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("
                update usuarios 
                set clave = :claveNueva
                WHERE id=:id");
            $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
            $consulta->bindValue(':claveNueva',$claveNueva, PDO::PARAM_STR);
            $consulta->execute();
            $retorno = "Se cambio la clave";
        }
        
        return $retorno;
    }

    public static function TraerTodoLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, apellido as apellido,clave as clave,mail as mail, Fechaderegistro as Fechaderegistro, localidad as localidad from usuarios");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS,"Usuario");		
	}

    public static function TraerUsuario($id)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, apellido as apellido,clave as clave,mail as mail, Fechaderegistro as Fechaderegistro, localidad as localidad from usuarios WHERE id = $id");
		$consulta->execute();
        $retorno = $consulta->fetchObject("Usuario");	

        return $retorno;
    }

    public static function TraerUsuarioConMailNombre($mail,$nombre)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, apellido as apellido,clave as clave,mail as mail, Fechaderegistro as Fechaderegistro, localidad as localidad from usuarios WHERE mail = :mail AND nombre = :nombre");
		$consulta->bindValue(':mail', $mail, PDO::PARAM_STR);
		$consulta->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $consulta->execute();
        $retorno = $consulta->fetchObject("Usuario");	
        return $retorno;
    }

    public static function DibujarListado($arrayUsuarios)
    {
        $cadena = "<ul>";
        foreach($arrayUsuarios as $usuario)
        {
            $cadena .= "<li>" . $usuario->nombre . " - " . $usuario->apellido . " - " . $usuario->mail .  "</li>";
        }
        $cadena .= "</ul>";
     
        return $cadena;
    }


    //Filtros
    public static function TraerUsuariosOrdenados($orden)
    {
        $retorno = "No se pudo traer la lista";
        if($orden == "ASC" || $orden == "DESC")
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		    $consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, apellido as apellido,clave as clave,mail as mail, Fechaderegistro as Fechaderegistro, localidad as localidad from usuarios ORDER BY apellido $orden,nombre $orden");
		    $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"Usuario");	
        }	
		return $retorno;
    }

    
}
?>