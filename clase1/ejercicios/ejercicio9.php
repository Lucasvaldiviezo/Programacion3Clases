<?php
$color = array("Rosa","Amarillo","Rojo");
$precio = array(40,60,70);
$marca = array("Faber","Bic","Filgo");
$trazo = array("Fino","Medio","Grueso");

$lapicera1 = array("Color"=>$color[rand(0,2)],"Precio"=>$precio[rand(0,2)],"Marca"=>$marca[rand(0,2)],"Trazo"=>$trazo[rand(0,2)]);
$lapicera2 = array("Color"=>$color[rand(0,2)],"Precio"=>$precio[rand(0,2)],"Marca"=>$marca[rand(0,2)],"Trazo"=>$trazo[rand(0,2)]);
$lapicera3 =  array("Color"=>$color[rand(0,2)],"Precio"=>$precio[rand(0,2)],"Marca"=>$marca[rand(0,2)],"Trazo"=>$trazo[rand(0,2)]);

$cont = 1;
echo "Lapicera " . ($cont) . "<br>";
foreach($lapicera1 as $l=>$datos)
{
    echo $l . ":" . $datos . " | ";
}
$cont++;
echo "<br>";

echo "Lapicera " . ($cont) . "<br>";
foreach($lapicera2 as $l=>$datos)
{
    echo $l . ":" . $datos . " | ";
}
$cont++;
echo "<br>";

echo "Lapicera " . ($cont) . "<br>";
foreach($lapicera3 as $l=>$datos)
{
    echo $l . ":" . $datos . " | ";
}
$cont++;

?>