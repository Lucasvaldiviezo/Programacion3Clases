<?php

$numero1 = 2;
$numero2 = 3;
$resultado = 0;
$operador = "+";


switch($operador)
{
    case '+':
        $resultado = $numero1 + $numero2;
        echo 'El resultado de la Suma es: ',$resultado;
    break;

    case '-':
        $resultado = $numero1 - $numero2;
        echo 'El resultado de la Resta es: ',$resultado;
    break;

    case '*':
        $resultado = $numero1 * $numero2;
        echo 'El resultado de la Multiplicacion es: ',$resultado;
    break;

    case '/':
        if($numero2 == 0)
        {
        echo 'No se puede dividir por 0';
        }else
        {
        $resultado = $numero1 / $numero2;
        echo 'El resultado de la Division es: ',$resultado;
        }
    break;
    default: 
        echo "No hay operador seleccionado";
}

?>