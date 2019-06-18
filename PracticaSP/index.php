<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once 'vendor/autoload.php';
require_once "controllers/usuarioController.php";
require_once "controllers/compraController.php";
require_once "middlewares/MWparaAutentificar.php";
require_once 'models/AccesoDatos.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

// Routes
$app->post('/login', \usuarioController::class . ':Login');

$app->group('/usuario', function(){
    $this->post('/', \usuarioController::class . ':CargarUno');
    $this->get('/', \usuarioController::class . ':TraerTodos')->add(\MWparaAutentificar::class . ':VerificarUsuarioTraer');
});

$app->group('/compra', function(){
    $this->post('', \compraController::class . ':CargarUno')->add(\MWparaAutentificar::class . ':VerificarLogeadoCompra');
    $this->get('', \compraController::class . ':TraerTodos');
});

$app->run();