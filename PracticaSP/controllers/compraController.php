<?php
require_once "models/compra.php";
require_once "interfaces/IApiUsable.php";
require_once "middlewares/AutentificadorJWT.php";
require_once "../src/agregarFoto.php";

class compraController implements IApiUsable
{
    public function TraerTodos($request, $response, $args)
    {
        $objDelaRespuesta= new stdclass();
        $arrayConToken = $request->getHeader('token');
        $token = $arrayConToken[0];
        $payload=AutentificadorJWT::ObtenerData($token);
        $nombre=$payload->nombre;
        $todos = Compra::TraerTodoLosCompras();
        if($payload->perfil=='admin')
        {
            $objDelaRespuesta->respuesta=$todos;
        }
        else
        {
            $respuesta="";
            for($i=0;$i<$todos->count();$i++)
            {
                if($todos[$i]->nombre==$nombre)
                {
                    $respuesta.=$todos[$i];
                }
            }
            $objDelaRespuesta->respuesta=$respuesta; 
        }
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function CargarUno($request, $response, $args)
    {
        $objDelaRespuesta= new stdclass();
        $arrayConToken = $request->getHeader('token');
		$token = $arrayConToken[0];
        $ArrayDeParametros = $request->getParsedBody();

        $articulo= $ArrayDeParametros['articulo'];
        $fecha= $ArrayDeParametros['fecha'];
        $precio= $ArrayDeParametros['precio'];
        $payload=AutentificadorJWT::ObtenerData($token);
        $nombre=$payload->nombre;
        $todos = compra::all();
        for($i=0;$i<count($todos);$i++)
        {
            $id=$todos[$i]->id+1;
        }
        
        if(isset($_FILES['foto']))
        {
            $foto=cargar($_FILES,$id,$articulo);
        }
        
        
        
        $miCompra = new compra();
        $miCompra->articulo=$articulo;
        $miCompra->fecha=$fecha;
        $miCompra->precio=$precio;
        $miCompra->nombre=$nombre;
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