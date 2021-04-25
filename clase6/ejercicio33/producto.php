<?php
include_once "AccesoDatos.php";
class Producto{
    public $id;
    public $codigo;
    public $nombre;
    public $tipo;
    public $stock;
    public $precio;
    public $Fechadecreacion;
    public $Fechademodificacion;

    public function __construct()
    { 
        
    }
    public function __construct1($codigo,$nombre,$tipo,$stock,$precio)
    { 
        if($this->ValidarCodigo($codigo,99999999))
        {
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->tipo = $tipo;
            $this->stock = $stock;
            $this->precio = $precio;
            $this->Fechadecreacion = date("y-m-d");
            $this->Fechademodificacion = date("y-m-d");
        }
    }

    public function ModificarProducto($nombre,$tipo,$stock,$precio)
    {
        $retorno = "No se pudo modificar el producto";
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("
            update productos 
            set nombre = :nombre,
            tipo = :tipo,
            stock = :stock,
            precio = :precio
            WHERE codigo=:codigo");
        $consulta->bindValue(':codigo',$this->codigo, PDO::PARAM_INT);
        $consulta->bindValue(':nombre',$nombre, PDO::PARAM_STR);
        $consulta->bindValue(':tipo',$tipo, PDO::PARAM_STR);
        $consulta->bindValue(':stock',$stock, PDO::PARAM_INT);
        $consulta->bindValue(':precio',$precio, PDO::PARAM_STR);
        $consulta->execute();
        $retorno = "Se modifico el producto";
        
        
        return $retorno;
    }

    public static function TraerTodoLosProductos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,codigo as codigo,nombre as nombre, tipo as tipo,stock as stock,precio as precio, Fechadecreacion as Fechadecreacion, Fechademodificacion as Fechademodificacion from productos");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS,"Producto");		
	}

    public static function TraerProducto($codigo)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select id,codigo as codigo,nombre as nombre, tipo as tipo,stock as stock,precio as precio, Fechadecreacion as Fechadecreacion, Fechademodificacion as Fechademodificacion from productos WHERE codigo = $codigo");
		$consulta->execute();
        $retorno = $consulta->fetchObject("Producto");	
        return $retorno;
    }



    public static function DibujarListado($arrayProductos)
    {
        $cadena = "<ul>";
        foreach($arrayProductos as $producto)
        {
            $cadena .= "<li> ID: ". $producto->id . " - Codigo: " . $producto->codigo . " - Nombre: " . $producto->nombre . " - Tipo: " . $producto->tipo . 
            " - Stock: " .  $producto->stock . " - Precio: " . $producto->precio . " - Fecha de Creacion: " . $producto->Fechadecreacion . " - Fecha de Modifcacion: " . $producto->Fechademodificacion .  "</li>";
        }
        $cadena .= "</ul>";
     
        return $cadena;
    }

    public function InsertarProducto()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into productos(Codigo,nombre,tipo,stock,precio,Fechadecreacion,Fechademodificacion)values(:codigo,:nombre,:tipo,:stock,:precio,:Fechadecreacion,:Fechademodificacion)");
        $consulta->bindValue(':codigo', $this->codigo, PDO::PARAM_STR);
        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
        $consulta->bindValue(':stock', $this->stock, PDO::PARAM_INT);
        $consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);
        $consulta->bindValue(':Fechadecreacion', $this->Fechadecreacion, PDO::PARAM_STR);
        $consulta->bindValue(':Fechademodificacion', $this->Fechademodificacion, PDO::PARAM_STR);
        $consulta->execute();		
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    public function AumentarStock($stock,$codigo)
	{
            $auxProducto = self::TraerProducto($codigo);
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update productos 
				set stock = stock + :stock
				WHERE id=:id");
			$consulta->bindValue(':id',$auxProducto->id, PDO::PARAM_INT);
			$consulta->bindValue(':stock',$stock, PDO::PARAM_INT);
			return $consulta->execute();
	}
    
    public function ReducirStock($stock,$codigo)
	 {
            $auxProducto = self::TraerProducto($codigo);
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update productos 
				set stock = stock - :stock
				WHERE id=:id");
			$consulta->bindValue(':id',$auxProducto->id, PDO::PARAM_INT);
			$consulta->bindValue(':stock',$stock, PDO::PARAM_INT);
			return $consulta->execute();
	 }

    public static function GuardarBD($producto)
    {
        $retorno = "No se pudo hacer";
        if(self::ProductoExisteDB($producto))
        {
            $producto->AumentarStock($producto->stock,$producto->codigo);
            $retorno = "Actualizado";
        }else
        {
            echo $producto->InsertarProducto();
            $retorno = "Ingresado";
        }

        return $retorno;
    }

    public static function ProductoExisteDB($producto)
    {
        $retorno = false;
        $arrayProductos = self::TraerTodoLosProductos();
        if(isset($arrayProductos))
        {
            foreach($arrayProductos as $auxProducto)
            {
                if($producto->codigo == $auxProducto->codigo && $producto->nombre == $auxProducto->nombre)
                {
                    $retorno = true;
                    break;
                }
            }
        }
        return $retorno;
    }

    public static function ProductoExisteArchivo($codigo,$ruta)
    {
        $retorno = false;
        $arrayProductos = Producto::LeerJSON($ruta);
        if(isset($arrayProductos))
        {
            foreach($arrayProductos as $auxProducto)
            {
                if($auxProducto->codigo == $codigo)
                {
                    $retorno = true;
                    break;
                }
            }
        }
        return $retorno;
    }

    
    
    public function Actualizar($ruta,$formato,$operacion,$cantidad)
    {
        $bool = "false";
        $arrayProductos = Producto::LeerJSON($ruta);
        if(isset($arrayProductos))
        {
            foreach($arrayProductos as $auxProducto)
            {
                if($this->codigo == $auxProducto->codigo)
                {
                    if($operacion == "+")
                    {
                        $auxProducto->stock += $cantidad;
                        $auxProducto->stock = (string)$auxProducto->stock;
                        break;
                    }else if($operacion == "-")
                    {
                        $auxProducto->stock -= $cantidad;
                        $auxProducto->stock = (string)$auxProducto->stock;
                    }
                }
            }
            $bool = $this->SobreEscribirArchivo($ruta,$formato,$arrayProductos);
        
        }

        return $bool;
    }

    public function SobreEscribirArchivo($ruta,$formato,$array)
    {
        $archivo = fopen($ruta,"w");
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

    public static function ObjetoAProducto($objeto)
    {
        return Producto($objeto);
    }
}
?>