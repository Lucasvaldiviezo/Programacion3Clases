<?php
include 'validarPalabra.php';

$palabra = "Programacion";
$max = 13;
$retorno = ValidarPalabra($palabra,$max);

echo 'La Palabra es: ' . $palabra . " | El Retorno es: " . $retorno;

?>