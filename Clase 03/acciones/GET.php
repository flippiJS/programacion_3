<?php
    #Trae archivos
    require_once './clases/alumno.php';
   
    function get()
    {
        $operationType = $_GET["tipo"];
        $arrayToReturn = array();
        if($operationType === "json")
        {
            $jsonData = file_get_contents("data/myJSONfile.json");
            $stringToFile = "";
            $arrayFromFile = json_decode( $jsonData );
            
            echo "<pre>";
            print_r($arrayFromFile);
            echo "</pre>";
            echo "<br>";
            echo $jsonData;
        }
        elseif ( $operationType === "csv") 
        {
            $referenceFile = fopen("data/myCSVfile.txt", 'w');
            $stringToFile = "";
            $last_key = key($arrayAlumnos);
            foreach ($arrayAlumnos as $key => $value) 
            {
                $stringToFile = $stringToFile . $value->ToCSV();
            }
        }
        else
        {
            echo "Operacion Invalida";
        }
    }
 
?>