<?php

require_once "AccesoDatos.php";

class facturaPaga
{
	public $id;
	public $idFactura;
	public $montoPagado;
 	public $fechaPago;	 
	
	public static function TraerTodo($idFactura)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		SELECT * 
		FROM facturapaga 
		WHERE idFactura = :idFactura
		ORDER BY fechaPago DESC
		");
		$consulta->bindValue(':idFactura', $idFactura, PDO::PARAM_INT);

		$consulta->execute();
		$arrFacturas= $consulta->fetchAll(PDO::FETCH_CLASS, "facturaPaga");	
		return $arrFacturas;
	}

	public static function Insertar($factura)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta(
			"INSERT into facturapaga (idFactura, montoPagado, fechaPago) 
			values(:idFactura, :montoPagado, :fechaPago)");

		$consulta->bindValue(':idFactura',$factura->idFactura, PDO::PARAM_INT);
		$consulta->bindValue(':montoPagado', $factura->montoPagado, PDO::PARAM_STR);
		$consulta->bindValue(':fechaPago', $factura->fechaPago, PDO::PARAM_STR);
		$consulta->execute();

		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	// public static function Editar($factura)
	// {
	// 	var_dump($factura);
	// 	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 	$consulta =$objetoAccesoDato->RetornarConsulta("
	// 	UPDATE factura SET
	// 		idFactura = :idFactura, 
	// 		montoPagado = :montoPagado, 
	// 		fechaPago = :fechaPago, 
	// 		proxVencimiento = :proxVencimiento
	// 	WHERE id = :id");
	// 	$consulta->bindValue(':id', $factura->id, PDO::PARAM_INT);
	// 	$consulta->bindValue(':idFactura', $factura->idFactura, PDO::PARAM_INT);
	// 	$consulta->bindValue(':montoPagado', $factura->montoPagado, PDO::PARAM_STR);
	// 	$consulta->bindValue(':fechaPago', $factura->fechaPago, PDO::PARAM_STR);
	// 	$consulta->bindValue(':proxVencimiento', $factura->proxVencimiento, PDO::PARAM_STR);

	// 	$consulta->execute();
	// 	return $consulta->rowCount();
	// }


}