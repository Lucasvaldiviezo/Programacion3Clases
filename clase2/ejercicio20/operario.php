<?php

class Operario
{
    private $apellido;
    private $nombre;
    private $salario;
    private $legajo;

    function __construct($apellido,$nombre,$legajo)
    {
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->legajo = $legajo;
        $this->salario = 1;
    }
    

    public function GetNombreApellido()
    {
        $nombreApellido = $this->nombre . " - " . $this->apellido;
        return $nombreApellido;
    }

    public function GetSalario()
    {
        return $this->salario;
    }

    public function SetAumentarSalario($porcentaje)
    {
        if(!is_null($porcentaje) && is_numeric($porcentaje))
        {
            $aumento = ($this->salario * $porcentaje) / 100;
            $this->salario = $this->salario + $aumento;
        }
        
    }

    public function Mostrar()
    {
        $info = "Nombre y Apellido: " . $this->GetNombreApellido() . "<br>Legajo: " . $this->legajo . "<br>Salario: " . $this->GetSalario() . "<br><br>";
        return $info;
    }

    public static function MostrarOperario($operario)
    {
        return $operario->Mostrar();
    }

    public function Equals($operarioComp)
    {
        $bool = false;
        if($this->nombre == $operarioComp->nombre && $this->apellido == $operarioComp->apellido && $this->legajo == $operarioComp->legajo)
        {
            $bool = true;
        }
        return $bool;
    }
}

?>