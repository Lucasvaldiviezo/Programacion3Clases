<?php
class Producto{
    public $id;
    public $codigo;
    public $nombre;
    public $tipo;
    public $stock;
    public $precio;

    public function __construct($codigo,$nombre,$tipo,$stock,$precio)
    { 
        if($this->ValidarCodigo($codigo,999999))
        {
            $this->codigo = $codigo;
            $this->id = rand(1,10000);
            $this->nombre = $nombre;
            $this->tipo = $tipo;
            $this->stock = $stock;
            $this->precio = $precio;
        }
    }

    public static function VerificarProducto($producto,$ruta)
    {
        $retorno = "nuevo";
        $arrayProductos = Producto::LeerJSON($ruta);
        if(isset($arrayProductos))
        {
            foreach($arrayProductos as $auxProducto)
            {
                if($auxProducto->codigo == $producto->codigo)
                {
                    $retorno = "actualizar";
                    break;
                }
            }
        }
        return $retorno;
    }
    
    public function Actualizar($ruta,$formato)
    {
        $bool = "false";
        $arrayProductos = Producto::LeerJSON($ruta);
        if(isset($arrayProductos))
        {
            foreach($arrayProductos as $auxProducto)
            {
                if($this->codigo == $auxProducto->codigo)
                {
                    $auxProducto->stock += $this->stock;
                    $auxProducto->stock = (string)$auxProducto->stock;
                    break;
                }
            }
            $bool = $this->SobreEscribirArchivo($ruta,$formato,$arrayProductos);
        
        }

        return $bool;
    }


    public function SobreEscribirArchivo($ruta,$formato,$array)
    {
        $archivo = fopen($ruta,"w+");
        $bool = "false";
        if($formato == "csv")
        {
            $bool = fwrite($archivo,$this->ProductoToCSV());
        }else if($formato == "json")
        {
            $bool = fwrite($archivo,$this->ArrayProductosToJSON($array));
        }
        fclose($archivo);

        return $bool;
    }

    public function ValidarCodigo($codigo,$maximo)
    {
        $retorno = false;
        if($codigo <= $maximo)
        {
            $retorno = true;
        }
        return $retorno;
    }

    public function Guardar($ruta,$formato)
    {
        $archivo = fopen($ruta,"a");
        if($formato == "csv")
        {
            $bool = fwrite($archivo, Producto::ProductoToCSV());
        }else if($formato == "json")
        {
            $bool = fwrite($archivo, Producto::ProductoToJSON($this));
        }
        fclose($archivo);
        return $bool;
    }

    public static function ProductoToJSON($producto)
    {
        $cadena =  json_encode($producto) . "\n";
        return $cadena;
    }

    public function ArrayProductosToJSON($arrayProductos)
    {
        $cadena = "";
        foreach($arrayProductos as $auxProducto)
        {
            $cadena .=  Producto::ProductoToJSON($auxProducto);
        }

        return $cadena;
    }

    public static function VerificarArchivo($ruta)
    {
        $bool = false;
        $rutaCompleta = "C:/xampp/htdocs/programacion3/clase4/ejercicio25/" . $ruta;
        if(file_exists($rutaCompleta));
        {
            $bool = true;     
        } 

        return $bool;
    }
    public static function LeerJSON($ruta)
    {
        $archivo = fopen($ruta,"r");
        $arrayProductos = [];
        while(!feof($archivo))
        {
            $linea = json_decode(fgets($archivo));
            if(!empty($linea))
            {
                array_push($arrayProductos,$linea);
            }                
        }
        fclose($archivo);
        return $arrayProductos;
    }
}

?>