<?php
function esPar($entero)
{
    $retorno = false;
    if($entero%2==0)
    {
        $retorno = true;
    }

    return $retorno;
}

function esImpar($entero)
{
    $retorno = true;
    if($entero%2 == 0)
    {
        $retorno = false;
    }

    return $retorno;
}

?>