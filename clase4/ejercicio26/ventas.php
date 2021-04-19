<?php
include "producto.php";
include "usuario.php";
class Ventas{

    public $id;
    public $codigo;
    public $nombreProducto;
    public $cantidad;
    public $idUsuario;

    public function __construct($codigo,$nombreProducto,$cantidad,$idUsuario)
    {
        $this->id = rand(1,10000);
        $this->nombreProducto = $nombreProducto;
        $this->cantidad = $cantidad;
        $this->idUsuario = $idUsuario;
        $this->codigo = $codigo;
    }

    public static function RealizarVenta($codigo,$ruta,$cantidad,$idUsuario,$archivoProductos,$formato)
    {
        $retorno = 'No se pudo realizar la venta';
        $arrayProductos = Producto::LeerJSON($archivoProductos);
        foreach($arrayProductos as $auxProducto)
        {
            if(Producto::VerificarProducto($auxProducto->codigo,$archivoProductos))
            {
                if($auxProducto->stock >= $cantidad)
                {
                    $producto = new Producto($auxProducto->codigo,$auxProducto->nombre,$auxProducto->tipo,$auxProducto->stock,$auxProducto->precio);
                    $venta = new Ventas($codigo,$auxProducto->nombre,$cantidad,$idUsuario);
                    $producto->Actualizar($archivoProductos,$formato,"-",$cantidad);
                    if(Ventas::GuardarVenta($ruta,$formato,$venta))
                    {
                        $retorno = "Se realizo la venta";
                        break;
                    }
                }else
                {
                    $retorno = 'No hay stock suficiente';
                }
            }else
            {
                $retorno = 'El Producto no existe';
            }
        }

        return $retorno;
    }

    public function VentaToJSON($venta)
    {
        $cadena =  json_encode($venta) . "\n";
        return $cadena;
    }

    public static function GuardarVenta($ruta,$formato,$venta)
    {
        
        $archivo = fopen($ruta,"a");
        if($formato == "csv")
        {
            //$bool = fwrite($archivo, $this->UsuarioToCSV());
        }else if($formato == "json")
        {
            $bool = fwrite($archivo, $venta->VentaToJSON($venta));
        }
        fclose($archivo);
        return $bool;
    }
}
?>