<?php
$color = array("Rosa","Amarillo","Rojo");
$precio = array(40,60,70);
$marca = array("Faber","Bic","Filgo");
$trazo = array("Fino","Medio","Grueso");
$lapiceras = array(
    array("Color"=>$color[rand(0,2)],"Precio"=>$precio[rand(0,2)],"Marca"=>$marca[rand(0,2)],"Trazo"=>$trazo[rand(0,2)]),
    array("Color"=>$color[rand(0,2)],"Precio"=>$precio[rand(0,2)],"Marca"=>$marca[rand(0,2)],"Trazo"=>$trazo[rand(0,2)]),
    array("Color"=>$color[rand(0,2)],"Precio"=>$precio[rand(0,2)],"Marca"=>$marca[rand(0,2)],"Trazo"=>$trazo[rand(0,2)]));

$cont = 1;
foreach($lapiceras as $lapicera)
{
    echo "Lapicera " . ($cont) . "<br>";
    foreach($lapicera as $l=>$datos)
    {
        echo $l . ":" . $datos . " | ";
    }
    $cont++;
    echo "<br>";
}
?>