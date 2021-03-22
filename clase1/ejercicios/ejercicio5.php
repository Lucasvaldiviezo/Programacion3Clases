<?php
$numero=55;
$numeroLetra;

if($numero>=20 && $numero<=60){
    if($numero<30){
        if($numero==20){
            $numeroLetra = "Veinte.";
        }
        else{
            $numeroLetra =  "Veinti";
        }
    }
    elseif($numero<40){
        if($numero==30){
            $numeroLetra = "Treinta.";
        }
        else{
            $numeroLetra = "Treinta y ";
        }
    }
    elseif($numero<50){
        if($numero==40){
            $numeroLetra =  "Cuarenta.";
        }
        else{
            $numeroLetra =  "Cuarenta y ";
        }
    }
    elseif($numero<60){
        if($numero==50){
            $numeroLetra =  "Cincuenta.";
        }
        else{
            $numeroLetra = "Cincuenta y ";
        }
    }
    elseif($numero==60){
        $numeroLetra = "Sesenta.";
    }

    $numero=substr($numero,1,1);
    switch($numero){
        case '1':
            $numeroLetra .= "uno.";
            break;
        case '2':
            $numeroLetra .= "dos.";
            break;
        case '3':
            $numeroLetra .= "tres.";
            break;
        case '4':
            $numeroLetra .= "cuatro.";
            break;
        case '5':
            $numeroLetra .= "cinco.";
            break;
        case '6':
            $numeroLetra .= "seis.";
            break;
        case '7':
            $numeroLetra .= "siete.";
            break;
        case '8':
            $numeroLetra .= "ocho.";
            break;
        case '9':
            $numeroLetra .= "nueve.";
            break;
    }

    echo 'El numero ingresado es: ',$numeroLetra;

}
else{
    echo "El numero ingresado no esta entre 20 y 60";
}

?>