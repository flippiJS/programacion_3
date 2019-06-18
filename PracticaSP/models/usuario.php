<?php
class Usuario
{
	public $id;
	public $nombre;
	public $clave;
	public $sexo;
	public $perfil;

	public function InsertarElUsuario()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("INSERT into usuarios (nombre,clave,sexo,perfil)values('$this->nombre','$this->clave','$this->sexo','$this->perfil')");
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public function InsertarElUsuarioParametros()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("INSERT into usuarios (nombre,clave,sexo,perfil)values(:nombre,:clave,:sexo,:perfil)");
		$consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
		$consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
		$consulta->bindValue(':sexo', $this->sexo, PDO::PARAM_STR);
		$consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function TraerTodoLosUsuarios()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("select id,nombre, clave, sexo, perfil from usuarios");
		$consulta->execute();
		return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
	}

	public static function TraerUnUsuario($nombre)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("select id,nombre, clave, sexo, perfil from usuarios where id = $nombre");
		$consulta->execute();
		$UsuarioBuscado = $consulta->fetchObject('Usuario');
		return $UsuarioBuscado;
	}


	public function mostrarDatos()
	{
		return "Metodo mostar:" . $this->titulo . "  " . $this->cantante . "  " . $this->año;
	}
}
