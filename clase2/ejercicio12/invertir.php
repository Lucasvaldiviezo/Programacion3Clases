<?php

function InvertirPalabra($palabra)
{
   $palabrainvertida = strrev ( $palabra );

   echo 'Palabra Normal: ' . $palabra . '<br>';
   echo 'Palabra Invertida: ' . $palabrainvertida;
}

?>