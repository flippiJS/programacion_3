<?php
class Compra
{
	public $id;
	public $articulo;
	public $fecha;
	public $precio;

	public function InsertarElCompra()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("INSERT into Compras (articulo,fecha,precio) values ('$this->articulo','$this->fecha','$this->precio')");
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
	public function InsertarElCompraParametros()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("INSERT into Compras (articulo,fecha,precio)values(:articulo,:fecha,:precio)");
		$consulta->bindValue(':articulo', $this->articulo, PDO::PARAM_STR);
		$consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);
		$consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function TraerTodoLosCompras()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("select id,articulo, fecha,precio from Compras");
		$consulta->execute();
		return $consulta->fetchAll(PDO::FETCH_CLASS, "Compra");
	}

	public static function TraerUnCompra($id)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("select id, articulo, fecha,precio from Compras where id = $id");
		$consulta->execute();
		$CompraBuscado = $consulta->fetchObject('Compra');
		return $CompraBuscado;
	}

	public function mostrarDatos()
	{
		return "Metodo mostar:" . $this->titulo . "  " . $this->cantante . "  " . $this->año;
	}
}
