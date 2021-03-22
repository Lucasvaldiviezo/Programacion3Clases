
<?php
$resultado = 0;
$contador = 0;

for($i=1; $i<=1000; $i++)
{
    $resultado = $resultado + $i;
    $contador++;
}

printf("El resultado es: %d y se sumaron %d numeros",$resultado,$contador);
?>