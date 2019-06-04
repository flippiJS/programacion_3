<?php
include_once "./clases/alumno.php";
include_once "./funciones/post.php";
include_once "./funciones/get.php";
include_once "./clases/alumnoDAO.php";
include_once "./clases/accesoDatos.php";


$alumno = new Alumno(2, 'Pedro', 128, 5);


print_r(AlumnoDAO::getAll());

?>