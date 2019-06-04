<?php
    require_once './acciones/GET.php';
    require_once './acciones/POST.php';
    require_once './acciones/DELETE.php';
    require_once './acciones/PUT.php';

    $method = $_SERVER["REQUEST_METHOD"];
    
    switch ($method) {
        case 'POST':
            post();
            break;
        case 'GET':
            geet();
            break;
        default:
            echo "Metodo Invalido.";
            break;
    }
    

?>