<?php
class Usuario
{
    public $id;
    public $nombre;
    public $clave;
    public $mail;
    public $fecha;
    public $destino;

    public function __construct($nombre,$clave,$mail,$destino)
    {
            $this->id = rand(1,10000);
            $this->nombre = $nombre;
            $this->clave = $clave;
            $this->mail = $mail;
            $this->fecha = getdate();
            $this->destino = $destino;
    }

    public function UsuarioToCSV()
    {
        $cadena =  $this->nombre . "," . $this->clave . "," . $this->mail . ",\n";
        return $cadena;
    }

    public function UsuarioToJSON()
    {
        $cadena =  json_encode($this) . "\n";
        return $cadena;
    }

    public function Guardar($ruta,$formato)
    {
        $archivo = fopen($ruta,"a");
        if($formato == "csv")
        {
            $bool = fwrite($archivo, $this->UsuarioToCSV());
        }else if($formato == "json")
        {
            $bool = fwrite($archivo, $this->UsuarioToJSON());
        }
        fclose($archivo);
        return $bool;
    }

    public function Actualizar($ruta,$formato)
    {
        $arrayProductos = Producto::LeerJSON($ruta);
        if(isset($arrayProductos))
        {

        }
    }
    public static function LeerJSON($ruta)
    {
        $archivo = fopen($ruta,"r");
        $arrayUsuarios = [];
        while(!feof($archivo))
        {
            $linea = json_decode(fgets($archivo));
            if(!empty($linea))
            {
                array_push($arrayUsuarios,$linea);
            }                
        }
        fclose($archivo);
        return $arrayUsuarios;
    }

    public static function LeerCSV($ruta)
    {
        $arrayUsuarios = [];
        
        $archivo = fopen($ruta,"r");
        while(!feof($archivo))
        {
            $linea = fgets($archivo);
            if(!empty($linea))
            {
                $datos = explode(",",$linea);
                $nombre = $datos[0];
                $clave = $datos[1];
                $mail = $datos[2];
                $usuario = new Usuario($nombre,$clave,$mail);
                array_push($arrayUsuarios,$usuario);
            }                
        }
        fclose($archivo);

        return $arrayUsuarios;
    }

    public static function DibujarListado($arrayUsuarios)
    {
        $cadena = "<ul>";
        foreach($arrayUsuarios as $usuario)
        {
            $cadena .= "<li>" . $usuario->nombre . " - " . $usuario->mail . " - " . $usuario->destino .  "</li>";
        }
        $cadena .= "</ul>";
     
        return $cadena;
    }

    public static function Login($usuario)
    {
        $retorno = "Error inesperado";
        $arrayUsuario = Usuario::Leer("usuarios.csv");
        echo "Datos del Usuario a Validar: " . $usuario->mail . " | " . $usuario->nombre . " | " . $usuario->clave . "\n";
        foreach($arrayUsuario as $usuarioAux)
        {
            echo  $usuarioAux->mail . "\n";
            if($usuarioAux->mail == $usuario->mail)
            {
                if($usuarioAux->clave == $usuario->clave)
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

}

?>