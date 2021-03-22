<?php

function CalcularPotencia()
{
    for($i = 1; $i<5; $i++)
    {
        for($j=1;$j<5;$j++)
        {
            $resultado = pow($i,$j);
            echo 'Numero: ' . $i . ' | Potencia: ' . $j . ' | Resultado: ' . $resultado . "<br>";
        }
    }
}

?>