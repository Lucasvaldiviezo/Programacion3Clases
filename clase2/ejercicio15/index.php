<?php
include "rectangulo.php";
include "triangulo.php";

$rectangulo = new Rectangulo('red', 5,2);

$rectangulo->ToString();

$triangulo = new Triangulo('red',5,2);
$triangulo->ToString();
?>