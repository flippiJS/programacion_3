<?php

    function crearAlumno(){
        
    }    

    // function post()
    // {
    //     $operationType = $_POST["type"];
    //     $alumno = new alumno($_POST['nameInput'],$_POST['lastNameInput'],$_POST['idInput'],$_POST['fileIdInput']);
    //     $origen = $_FILES["imageInput"]["tmp_name"];
    //     $uploadedFileOriginalName = $_FILES["imageInput"]["name"];
    //     $ext = pathinfo($uploadedFileOriginalName, PATHINFO_EXTENSION);
    //     $fileDestination = "data/".$alumno->apellido."_".$alumno->legajo.".".$ext;
    //     if (file_exists($fileDestination)) 
    //         copy($fileDestination,"backup/".$alumno->apellido."_".$alumno->legajo."_".date("dmyhis").".".$ext);    
    //     $watermark = imagecreatefrombmp('D:\xampp\htdocs\TPFinal\resources\watermark.bmp');
        
    //     move_uploaded_file($origen, $fileDestination);
       
    //     $imagetostamp = imagecreatefromjpeg($fileDestination);
    //     $rightMargin = 10;
    //     $inferiorMargin = 10;
    //     $sx = imagesx($watermark);
    //     $sy = imagesy($watermark);
    //     imagecopy($imagetostamp, $watermark, imagesx($imagetostamp) - $sx - $rightMargin, imagesy($imagetostamp) - 
    //         $sy - $inferiorMargin, 0,0, imagesx( $watermark ), imagesy($watermark));
    //     imagepng($imagetostamp, $fileDestination);
    //     copy($fileDestination,$fileDestination);
    //     $alumno->photoId = $fileDestination;
        
    //     if (strtolower($operationType) == "csv") 
    //     {
    //         $referenceFile = fopen("data/myCSVfile.txt", 'a');
    //         $stringToFile = "";
    //         $stringToFile = $stringToFile . $alumno->ToCSV();
    //     }
    //     elseif (strtolower($operationType) == "json") 
    //     {
    //         $outputArray = array();
            
    //         if (!file_exists("data/myJSONfile.json")) 
    //         {
    //             $referenceFile = fopen("data/myJSONfile.json",'w');
    //             echo "Creando nuevo Archivo JSON de Registro.";
    //             $outputArray = array($alumno);
    //             $stringToFile = json_encode( $outputArray );
    //         }
    //         else
    //         {
    //             echo "Actualizando Archivo JSON de registro";
    //             $jsonstring = file_get_contents("data/myJSONfile.json");
    //             $referenceFile = fopen("data/myJSONfile.json",'w');
    //             $outputArray = json_decode( $jsonstring );
                   
    //             if( $outputArray == NULL )
    //             {
    //                 $outputArray = array();
    //             }   
    //             array_push($outputArray, $alumno);
    //             $stringToFile = json_encode( $outputArray );
    //         }
    //     }
    //     else{
    //         echo "No se especifico formato de archivo valido.";
    //         return;
    //     }
        
    //     fwrite( $referenceFile, $stringToFile );
    //     fclose($referenceFile);
       
    // }

    // function marcaDeAgua(){
    //     // Cargar la estampa y la foto para aplicarle la marca de agua
    //     $estampa = imagecreatefrompng('estampa.png');
    //     $im = imagecreatefromjpeg('foto.jpeg');

    //     // Establecer los márgenes para la estampa y obtener el alto/ancho de la imagen de la estampa
    //     $margen_dcho = 10;
    //     $margen_inf = 10;
    //     $sx = imagesx($estampa);
    //     $sy = imagesy($estampa);

    //     // Copiar la imagen de la estampa sobre nuestra foto usando los índices de márgen y el
    //     // ancho de la foto para calcular la posición de la estampa. 
    //     imagecopy($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa));

    //     // Imprimir y liberar memoria
    //     header('Content-type: image/png');
    //     imagepng($im);
    //     imagedestroy($im);
    // }

?>