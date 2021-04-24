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



}
?>