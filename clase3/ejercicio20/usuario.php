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

    public function Mostrar()
    {
        $cadena =  $this->nombre . "," . $this->clave . "," . $this->mail . ",\n";
        return $cadena;
    }
}


?>