<?php
/*135
153
531
513
315
351*/
$numero1 = 5;
$numero2 = 5;
$numero3 = 5;
$numeromedio =0;

if(($numero1 > $numero2 && $numero1 < $numero3) || 
($numero1 > $numero3 && $numero1 < $numero2))
{
    echo 'El numero del medio es: ',$numero1;
}elseif(($numero2 > $numero1 && $numero2 < $numero3) || 
($numero2 > $numero3 && $numero2 < $numero1))
{
    echo 'El numero del medio es: ',$numero2;
}else if(($numero3 > $numero1 && $numero3 < $numero2) || 
($numero3 > $numero2 && $numero3 < $numero1))
{
    echo 'El numero del medio es: ',$numero3;
}else
{
    echo 'No hay intermedio';
}

?>