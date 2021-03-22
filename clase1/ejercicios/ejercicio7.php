<?php
$numeros = array();
$cont = 0;
$cont2 = 0;
while($cont< 10)
{
    $aux = rand(1,10);
    if($aux%2!=0)
    {
        $numeros[$cont] = $aux;
        $cont++;
    }
}
echo "Impresion con For:";
for($i=0;$i<10;$i++)
{
    echo "<br>|| " . $numeros[$i] . " ||";
}

echo "<br><br>Impresion con While:";
while($cont2<10)
{
    echo "<br>|| " . $numeros[$cont2] . " ||";
    $cont2++;
}

echo "<br><br>Impresion con Foreach:";
foreach($numeros as $num)
{
    echo "<br>|| " . $num . " ||";

}

?>