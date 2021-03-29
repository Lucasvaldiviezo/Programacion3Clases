<?php
include "operario.php";
include "fabrica.php";


$operario1 = new Operario("Ramirez","Jorge",1);
$operario2 = new Operario("Valdiviezo","Lucas",2);
$operario3 = new Operario("Valdiviezo","Lucas",2);

$operario1->SetAumentarSalario(15000);
echo $operario1->Mostrar();
echo $operario2->Mostrar();

$bool = $operario1->Equals($operario2);
$bool2 = $operario2->Equals($operario3);

if($bool == true)
{
    echo 'Operario 1 es Igual a Operario 2<br>';
}else
{
    echo 'Operario 1 y 2 no son iguales<br>';
}

if($bool2 == true)
{
    echo 'Operario 2 es Igual a Operario 3<br>';
}else
{
    echo 'Operario 2 y 3 no son iguales<br>';
}

?>