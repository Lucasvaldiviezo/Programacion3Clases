<?php

class fabrica
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
        return $this->razonSocial;
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


    public function Add($operario)
    {
        if(is_a($operario,'Operario'))
        {
            
        }
    }
}
?>