<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';

$app = new \Slim\App;

// API group
$app->group('/v1', function ($app) {

    $app->get('/', function (Request $request, Response $response, array $args) {
        $response->write("GET");
        return $response;
    });

    $app->post('/', function (Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();
        $response->write("POST ".$data['nombre']);
        return $response;
    });

    $app->put('/', function (Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();
        $response->write("PUT ".$data['nombre']);
        return $response;
    });

    $app->delete('/', function (Request $request, Response $response, array $args) {
        $response->write("DELETE ");
        return $response;
    });

});


$app->run();