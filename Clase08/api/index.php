<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';

$app = new \Slim\App;

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->write("Api v1.0");
    return $response;
});

$app->post('/', function (Request $request, Response $response, array $args) {
    $response->write("Api v1.0");
    return $response;
});

$app->put('/', function (Request $request, Response $response, array $args) {
    $response->write("Api v1.0");
    return $response;
});

$app->delete('/', function (Request $request, Response $response, array $args) {
    $response->write("Api v1.0");
    return $response;
});


$app->run();