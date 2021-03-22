<?php

function ValidarPalabra($palabra,$max)
{
    $retorno = 0;
    $cuenta = strlen($palabra);

    if($cuenta <= $max)
    {
        if($palabra == 'Recuperatorio' || $palabra == 'Programacion' || $palabra == 'Parcial')
        {
            $retorno = 1;
        }
    }
    return $retorno;   
}

?>