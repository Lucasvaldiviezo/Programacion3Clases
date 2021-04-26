<?php
include_once  "producto.php";
include_once  "usuario.php";
class Ventas{

    public $id;
    public $idProducto;
    public $idUsuario;
    public $cantidad;
    public $Fechadeventa;


    public function __construct()
    {

    }

    public function __construct1($codigo,$nombreProducto,$cantidad,$idUsuario)
    {
        $this->id = rand(1,10000);
        $this->nombreProducto = $nombreProducto;
        $this->cantidad = $cantidad;
        $this->idUsuario = $idUsuario;
        $this->codigo = $codigo;
    }

    public static function RealizarVenta($codigo,$idUsuario,$cantidad)
    {
        $retorno = "No se pudo hacer";
        $producto = Producto::TraerProducto($codigo);
        $usuario = Usuario::TraerUsuario($idUsuario);
        if($producto != false && $usuario != false)
        {
            if($producto->stock >= $cantidad)
            {
                $producto->ReducirStock($cantidad,$codigo);
                $retorno = "Se realizo la venta";
            }
        }

        return $retorno;
    }

    public static function TraerTodoLasVentas()
	{
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select id,id_producto as idProducto,id_usuario as idUsuario, cantidad as cantidad,Fechadeventa as Fechadeventa from ventas");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Ventas");		
	}


    public static function DibujarListado($arrayVentas)
    {
        $cadena = "<ul>";
        foreach($arrayVentas as $venta)
        {
            $cadena .= "<li> ID: ". $venta->id . " - ID Producto: " . $venta->idProducto . " - ID Usuario: " . $venta->idUsuario . " - Cantidad: " . $venta->cantidad . 
            " - Fecha de Venta: " . $venta->Fechadeventa  .  "</li>";
        }
        $cadena .= "</ul>";
     
        return $cadena;
    }

    //Filtros

    public static function TraerTodoLasVentasEntre($numero1,$numero2)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select id,id_producto as idProducto,id_usuario as idUsuario, cantidad as cantidad,Fechadeventa as Fechadeventa from ventas WHERE cantidad BETWEEN :numero1 AND :numero2");
        $consulta->bindValue(':numero1', $numero1, PDO::PARAM_INT);
        $consulta->bindValue(':numero2', $numero2, PDO::PARAM_INT);
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Ventas");		
	}

    public static function CantidadVendidaEntreFechas($fecha1,$fecha2)
	{
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select SUM(cantidad) from ventas WHERE Fechadeventa BETWEEN :fecha1 AND :fecha2");
        $consulta->bindValue(':fecha1', $fecha1, PDO::PARAM_STR);
        $consulta->bindValue(':fecha2', $fecha2, PDO::PARAM_STR);
        $consulta->execute();			
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        return $resultado['SUM(cantidad)'];
	}

    public static function TraerPrimerosProductosEnviados($limite)
	{
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select id,id_producto as idProducto,id_usuario as idUsuario, cantidad as cantidad,Fechadeventa as Fechadeventa  from ventas ORDER BY Fechadeventa LIMIT $limite");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Ventas");
	}

    public static function NombresDeCadaVenta()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select ventas.id,productos.nombre as pnombre,usuarios.nombre as unombre FROM ventas,productos,usuarios WHERE ventas.id_producto = productos.id AND ventas.id_usuario = usuarios.id");
        $consulta->execute();			
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public static function TotalDeCadaVenta()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select ventas.id as id,TRUNCATE(ventas.cantidad*productos.precio,2) as total FROM ventas,productos WHERE ventas.id_producto = productos.id");
        $consulta->execute();			
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public static function CantidadProductoVendidoUsuario($idProducto,$idUsuario)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select ventas.id as id, SUM(cantidad) as cantidad FROM ventas WHERE id_producto = :idProducto AND id_usuario = :idUsuario");
        $consulta->bindValue(':idProducto', $idProducto, PDO::PARAM_INT);
        $consulta->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $consulta->execute();			
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public static function VentaEntreFechas($fecha1,$fecha2)
	{
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select id,id_producto as idProducto,id_usuario as idUsuario, cantidad as cantidad,Fechadeventa as Fechadeventa from ventas WHERE Fechadeventa BETWEEN :fecha1 AND :fecha2");
        $consulta->bindValue(':fecha1', $fecha1, PDO::PARAM_STR);
        $consulta->bindValue(':fecha2', $fecha2, PDO::PARAM_STR);
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Ventas");
	}

    

}
?>