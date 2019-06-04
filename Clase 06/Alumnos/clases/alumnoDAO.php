<?php

class AlumnoDAO{

    //Inserta un alumno en la base de datos
    public static function insert($alumno){
        try{
            $consulta = "INSERT INTO `alumnos`(`nombre`, `legajo`, `localidad`) VALUES (:nombre, :legajo, :localidad)";
            $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objetoAccesoDato->retornarConsulta($consulta);
            $consulta->bindValue(':legajo', $alumno->legajo, PDO::PARAM_INT);
            $consulta->bindValue(':nombre', $alumno->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':localidad', $alumno->localidad, PDO::PARAM_INT);
            return $consulta->execute();
        }catch(PDOException $e){
            echo $e.getMessage();
        }
    }
    
    //Devuelve un array asociativo con los datos obtenidos
    public static function getAll()
    {    
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM alumnos");        
        $consulta->execute();                                            
        return $consulta->fetchAll(PDO::FETCH_ASSOC); 
    }
   
    //Devuelve una instancia de alumno con el id especificado
    public static function getById($id){                                          
        try{
            $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso();               
            $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM `alumnos`  WHERE `id`= :id"); 
            $consulta->bindValue(':id',  $id, PDO::PARAM_INT); 
            $consulta->execute(); 
            //atributos públicos, mismo orden, mismo nombre !
            
            $datos  = $consulta->fetch(PDO::FETCH_ASSOC);                                    
            return new Alumno($datos['id'], $datos['nombre'], $datos['legajo'], $datos['localidad']);                              
        } catch (PDOException $e) {
            echo $e.getMessege();
        }
    }

    public static function update($alumno)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE alumnos SET nombre = :nombre, legajo = :legajo, localidad = :localidad WHERE id = :id");
        
        $consulta->bindValue(':id', $alumno->id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $alumno->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':legajo', $alumno->legajo, PDO::PARAM_INT);
        $consulta->bindValue(':localidad', $alumno->localidad, PDO::PARAM_INT);

        return $consulta->execute();
    }

}

?>