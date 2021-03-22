<?php
include 'esPar.php';
$entero = 503;


$retorno = esPar($entero);
$retorno2 = esImpar($entero);

echo 'Numero Enviado: ' . $entero . '<br>';
if($retorno == true && $retorno2 == false)
{
    echo 'Es Par';
}else if($retorno == false && $retorno2 == true)
{
    echo 'Es Impar';
}

?>