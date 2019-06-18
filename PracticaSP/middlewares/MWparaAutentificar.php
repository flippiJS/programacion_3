<?php

require_once "AutentificadorJWT.php";
class MWparaAutentificar
{
 /**
   * @api {any} /MWparaAutenticar/  Verificar Usuario
   * @apiVersion 0.1.0
   * @apiName VerificarUsuario
   * @apiGroup MIDDLEWARE
   * @apiDescription  Por medio de este MiddleWare verifico las credeciales antes de ingresar al correspondiente metodo 
   *
   * @apiParam {ServerRequestInterface} request  El objeto REQUEST.
 * @apiParam {ResponseInterface} response El objeto RESPONSE.
 * @apiParam {Callable} next  The next middleware callable.
   *
   * @apiExample Como usarlo:
   *    ->add(\MWparaAutenticar::class . ':VerificarUsuario')
   */
	public function VerificarUsuarioTraer($request, $response, $next) {
         
		$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->respuesta="";
	   
		if($request->isGet())
		{
			$arrayConToken = $request->getHeader('token');
			$token = $arrayConToken[0];
			$objDelaRespuesta->esValido=true;

			$response = $next($request, $response);

			try 
			{
				//$token="";
				AutentificadorJWT::verificarToken($token);
				$objDelaRespuesta->esValido=true;      
			}
			catch (Exception $e) {      
				//guardar en un log
				$objDelaRespuesta->excepcion=$e->getMessage();
				$objDelaRespuesta->esValido=false;     
			}

			if($objDelaRespuesta->esValido)
			{						
				$payload=AutentificadorJWT::ObtenerData($token);
				//var_dump($payload);
				// DELETE,PUT y DELETE sirve para todos los logeados y admin
				if($payload->perfil=="admin")
				{
					$response = $next($request, $response);
				}		           	
				else
				{	
					$objDelaRespuesta->respuesta="Hola";
				}          
			}    
		}

		if($objDelaRespuesta->respuesta!="")
		{
			$nueva=$response->withJson($objDelaRespuesta, 401);  
			return $nueva;
		}
		return $response;   
	}

	public function VerificarLogeadoCompra($request, $response, $next)
	{
		$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->respuesta="";
	   
		if($request->isPost())
		{
			$arrayConToken = $request->getHeader('token');
			$token = $arrayConToken[0];
			$objDelaRespuesta->esValido=true;

			try 
			{
				AutentificadorJWT::verificarToken($token);
				$objDelaRespuesta->esValido=true;      
			}
			catch (Exception $e) {      
				$objDelaRespuesta->excepcion=$e->getMessage();
				$objDelaRespuesta->esValido=false;     
			}

			if($objDelaRespuesta->esValido)
			{						
				$response = $next($request, $response);   
			}
			else
			{
				$objDelaRespuesta->respuesta="Solo usuarios registrados";
			}
		}
		if($objDelaRespuesta->respuesta!="")
		{
			$nueva=$response->withJson($objDelaRespuesta, 401);  
			return $nueva;
		}
		return $response;
	}

	public function VerificarTraerCompra($request, $response, $next)
	{
		$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->respuesta="";
	   
		if($request->isPost())
		{
			$arrayConToken = $request->getHeader('token');
			$token = $arrayConToken[0];
			$objDelaRespuesta->esValido=true;

			try 
			{
				AutentificadorJWT::verificarToken($token);
				$objDelaRespuesta->esValido=true;      
			}
			catch (Exception $e) {      
				$objDelaRespuesta->excepcion=$e->getMessage();
				$objDelaRespuesta->esValido=false;     
			}

			if($objDelaRespuesta->esValido)
			{
				$response = $next($request, $response);
				
			}
		}
	}
}