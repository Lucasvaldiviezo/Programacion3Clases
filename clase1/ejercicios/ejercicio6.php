<?php

$numeros = array();
$suma = 0;
$contador = 0;
$promedio = 0;

for($i = 0; $i<5 ; $i++)
{
    $aux = rand(1,10);
    $numeros[$i] = $aux;
    $suma = $suma + $aux;
    $contador++;
}

var_dump($numeros);
$promedio = $suma/$contador;

if($promedio > 6)
{
    echo '<br>El promedio es mayor a 6';
}else if($promedio< 6)
{
    echo '<br>El promedio es menor a 6';
}else
{
    echo '<br>El promedio es igual a 6';
}
?>