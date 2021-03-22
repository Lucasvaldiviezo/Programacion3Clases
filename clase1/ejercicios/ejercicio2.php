<?php
$hoy = new DateTime();
$primavera = new DateTime("September 21");
$invierno = new DateTime("June 21");
$verano = new DateTime("December 21");
$otoño = new DateTime("March 21");


echo "La fecha de hoy es: ",$hoy->format('m-d-Y') . "<br>" ;
echo "La fecha 2 de hoy es: ",$hoy->format('d-m-Y') . "<br>";
echo "La fecha 3 de hoy es: ",$hoy->format('Y-d-m') . "<br>";

$mes = date('m');
switch($mes)
    {
        case 12:
        case 01:
        case 02:
            echo "La estacion actual es Verano";
            break;
        case 03:
        case 04:
        case 05:
            echo "La estacion actual es Otoño";
            break;
        case 06:
        case 07:
        case 8:
            echo "La estacion actual es Invierno";
            break;
        case 9:
        case 10:
        case 11:
            echo "La estacion actual es Primavera";
            break;
    }
?>