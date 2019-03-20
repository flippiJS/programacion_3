<?php
include_once('clases/Alumno.php');

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['dni']) && isset($_POST['legajo'])) {
    $vNombre = $_POST['nombre'];
    $vApellido = $_POST['apellido'];
    $vDni = $_POST['dni'];
    $vLegajo = $_POST['legajo'];

    $alumno = new Alumno($vNombre, $vApellido, $vDni, $vLegajo);
    echo $alumno->toJSON();
} else {
    echo json_encode('error');
}

?>