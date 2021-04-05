<?php

class Usuario
{
    public $nombre;
    public $clave;
    public $mail;

    public function __construct($nombre,$clave,$mail)
    {
            $this->nombre = $nombre;
            $this->clave = $clave;
            $this->mail = $mail;
    }

    public function UsuarioToCSV()
    {
        $cadena =  $this->nombre . "," . $this->clave . "," . $this->mail . ",\n";
        return $cadena;
    }

    public function Guardar()
    {
        $archivo = fopen("usuarios.csv","a");
        $bool = fwrite($archivo, $this->UsuarioToCSV());
        fclose($archivo);
        return $bool;
    }

    public static function Leer($ruta)
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
            $cadena .= "<li>" . $usuario->nombre . " - " . $usuario->mail . " - " . $usuario->clave . "</li>";
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