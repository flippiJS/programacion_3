<?php

require_once "models/usuario.php";
require_once "interfaces/IApiUsable.php";
require_once "middlewares/AutentificadorJWT.php";

class usuarioController implements IApiUsable
{
    public function TraerTodos($request, $response, $args)
    {
        $objDelaRespuesta = new stdclass();
        $todos = Usuario::TraerTodoLosUsuarios();
        $objDelaRespuesta->respuesta = $todos;
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function CargarUno($request, $response, $args)
    {
        $objDelaRespuesta = new stdclass();

        $ArrayDeParametros = $request->getParsedBody();

        $nombre = $ArrayDeParametros['nombre'];
        $password = $ArrayDeParametros['password'];
        $sexo = $ArrayDeParametros['sexo'];

        $miUser = new usuario();
        $miUser->nombre = $nombre;
        $miUser->password = $password;
        $miUser->sexo = $sexo;
        $miUser->perfil = "usuario";
        $miUser->InsertarElUsuario();

        $objDelaRespuesta->respuesta = "Se cargo correctamente";
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function Login($request, $response, $args)
    {
        $ArrayDeParametros = $request->getParsedBody();

        $nombre = $ArrayDeParametros['nombre'];
        $password = $ArrayDeParametros['password'];
        $sexo = $ArrayDeParametros['sexo'];

        $usuarioLogin = new usuario();
        $usuarioLogin = $usuarioLogin->TraerUnUsuario($nombre);

        if ($usuarioLogin) {
            if ($usuarioLogin->password == $password && $usuarioLogin->sexo == $sexo) {
                $datos = array(
                    'nombre' => $nombre,
                    'sexo' => $sexo,
                    'perfil' => $usuarioLogin->perfil
                );
                return AutentificadorJWT::CrearToken($datos);
            } else {
                return $response->withJson("Sexo o password incorrectas", 200);
            }
        } else {
            return $response->withJson("Nombre invalido", 200);
        }
    }

    public function BorrarUno($request, $response, $args)
    { }
    public function ModificarUno($request, $response, $args)
    { }

    public function TraerUno($request, $response, $args)
    { }
}
