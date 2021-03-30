<?php

class Fabrica
{
    private $cantMaxOperarios = 5;
    private $operarios = [];
    private $razonSocial;


    public function __construct($rs)
    {
        if(!is_null($rs))
        {
            $this->razonSocial = $rs;
        }else
        {
            $this->razonSocial = "Sociedad Anonima";
        }     
    }

    public function Mostrar()
    {
        echo $this->razonSocial . "<br>";
        $this->MostrarOperarios();

    }

    private function MostrarOperarios()
    {
        foreach($operarios as $op)
        {
            echo $op->Mostrar();
        }
    }

    private function RetornarCostos()
    {
        $suma = 0;
        foreach($operarios as $op)
        {
            $suma = $suma + $op->GetSalario();
        }
        return $suma;
    }

    public function MostrarCostos()
    {
        echo "El costo operativo es: " . $this->RetornarCostos();
    }

    public static function Equals($fabrica,$op)
    {
        $bool = false;
        if(is_a($fabrica,'Fabrica') && is_a($operario,'Operario'))
        {
            foreach($fabrica->operarios as $op)
            {
                if($operario->Equals($op) == true)
                {
                    $bool = true;
                    break;
                }
            }
        }
        return $bool;
    }

    public function Add($operario)
    {
        if(is_a($operario,'Operario'))
        {
            if(Fabrica::Equals($this,$operario) == false && $this->operarios )
            {

            }
        }
    }
}
?>