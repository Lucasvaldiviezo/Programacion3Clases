<?php 

echo "va por Get<br>";
var_dump($_GET);
echo "<br>va por Post<br>";
var_dump($_POST);

echo "<br>Bienvenido/a ", $_POST["txtNombre"];

?>