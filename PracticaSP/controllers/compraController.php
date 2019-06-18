<?php
require_once "models/compra.php";
require_once "interfaces/IApiUsable.php";
require_once "middlewares/AutentificadorJWT.php";

class compraController implements IApiUsable
{
    public function TraerTodos($request, $response, $args)
    {
        $objDelaRespuesta= new stdclass();
        $todos = Compra::TraerTodoLosCompras();
        $objDelaRespuesta->respuesta=$todos;
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function CargarUno($request, $response, $args)
    {
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();

        $articulo= $ArrayDeParametros['articulo'];
        $fecha= $ArrayDeParametros['fecha'];
        $precio= $ArrayDeParametros['precio'];
        
        $miCompra = new compra();
        $miCompra->articulo=$articulo;
        $miCompra->fecha=$fecha;
        $miCompra->precio=$precio;
        $miCompra->InsertarElCompra();
        
        $objDelaRespuesta->respuesta="Se cargo correctamente";   
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function BorrarUno($request, $response, $args)
    {

    }

    public function ModificarUno($request, $response, $args)
    {

    }

    public function TraerUno($request, $response, $args)
    {

    }
}

?>