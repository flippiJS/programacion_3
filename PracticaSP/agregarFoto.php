<?php

function cargar($file, $id,$articulo)
{
	$dic = "../src/IMGCompras/";
	$nameImagen = $file["foto"]["name"];
	if($id!=null && $articulo!=null)
	{
		$datoImagen=$id."-".$articulo;
	}
    else{
        $datoImagen = "sinDatos";
    }
    
	$explode = explode(".", $nameImagen);
	$tamaño = count($explode);

	$dic .= $datoImagen;
	$dic .= ".";
	$dic .= $explode[$tamaño - 1];
	move_uploaded_file($_FILES["foto"]["tmp_name"], $dic);
    
    return $dic;
}


?>