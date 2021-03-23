<?php

abstract class FiguraGeometrica{
    protected $color;
    protected $perimetro;
    protected $superficie;

    public function __construct($color)
    {
        $this->SetColor($color);
    }


    public function SetColor($color)
    {
        $this->color = $color;
    }
    public function GetColor()
    {
        return $this->color;
    }
    
    public abstract function Dibujar();
    protected abstract function CalcularDatos();

    public function ToString()
    {
        $datos = 'Color: ' . GetColor() . '<br>Perimetro: ' . $this->perimetro . '<br>Superficie: ' . $this->superficie .'<br>';
        return $datos;
    }
}


?>