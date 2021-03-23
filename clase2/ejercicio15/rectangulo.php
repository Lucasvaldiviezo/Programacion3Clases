<?php
include_once "figuraGeometrica.php";
class Rectangulo extends FiguraGeometrica
{
    private $ladoDos;
    private $ladoUno;

    public function __construct($color,$ladoDos,$ladoUno)
    {
        parent::__construct($color);
        $this->ladoDos = $ladoDos;
        $this->ladoUno = $ladoUno;
        $this->CalcularDatos();
    }

    protected function CalcularDatos()
    {
        $this->perimetro = 2*($this->ladoDos + $this->ladoUno);
        $this->superficie = $this->ladoUno * $this->ladoDos;
    }

    public function Dibujar()
    {
        $dibujo ='<span style="color:'. $this->color . ';">';
        $cont = 0;
        $cont2 = 0;
        while($cont < $this->ladoUno)
        {
            while($cont2 < $this->ladoDos)
            {
                $dibujo.= '*';
                $cont2++;
            }
            $dibujo .="<br>";
            $cont++;
            $cont2 = 0;
            
        }
        return $dibujo . '</p>';
    }

    public function ToString()
    {
        echo 'Datos del Rectangulo: <br> Lado Uno: ' . $this->ladoUno . '<br>Lado Dos: ' . $this->ladoDos . '<br> Perimetro: ' . $this->perimetro . '<br> Superficie: ' . 
        $this->superficie . "<br>" . $this->Dibujar();
    }
}


?>