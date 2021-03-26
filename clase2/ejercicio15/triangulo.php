<?php
include_once "figuraGeometrica.php";

class Triangulo extends FiguraGeometrica{
    private $base;
    private $altura;
    public function __construct($color,$base,$altura)
    {
        parent::__construct($color);
        $this->base = $base;
        $this->altura = $altura;
        $this->CalcularDatos();
    }

    protected function CalcularDatos()
    {
        $this->perimetro = $this->base + ($this->altura*2);
        $this->superficie = ($this->base * $this->altura)/2;
    }

    public function Dibujar()
    {
        $dibujo ='<span style="color:'. $this->color . ';">' . "
        *<br>
        ***<br>
        *****<br>
        *******<br>
        ";
        $cont = 0;
        $cont2 = 0;
        return $dibujo . '</p>';
    }

    public function ToString()
    {
        echo '<span style="color:'. "black" . ';">' . 'Datos del Rectangulo: <br> Base: ' . $this->base . '<br>Altura: ' . $this->altura . '<br> Perimetro: ' . $this->perimetro . '<br> Superficie: ' . 
        $this->superficie . '</p>' ."<br>" . $this->Dibujar();
    }

}

?>