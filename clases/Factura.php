<?php

require_once "AccesoDatos.php";

class factura
{
	public $id;
	public $idEmpresa;
	public $domicilio;
 	public $proxVencimiento;
	public $montoAnterior;
	 
	
	public static function TraerTodo()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		SELECT f.domicilio, f.id as idFactura, f.idEmpresa, f.proxVencimiento, f.montoAnterior, e.rutaImagen 
		FROM factura as f
		INNER JOIN empresa as e
		ON f.idEmpresa = e.id
		ORDER BY f.proxVencimiento ASC
		");

		$consulta->execute();
		$arrFacturas= $consulta->fetchAll(PDO::FETCH_CLASS, "factura");	
		return $arrFacturas;
	}

	public static function Insertar($factura)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		INSERT INTO 
		factura	(idEmpresa, domicilio, proxVencimiento, montoAnterior) 
		values	(:idEmpresa, :domicilio, :proxVencimiento, :montoAnterior)");

		$consulta->bindValue(':idEmpresa',$factura->idEmpresa, PDO::PARAM_STR);
		$consulta->bindValue(':domicilio', $factura->domicilio, PDO::PARAM_STR);
		$consulta->bindValue(':proxVencimiento', $factura->proxVencimiento, PDO::PARAM_STR);
		$consulta->bindValue(':montoAnterior', $factura->montoAnterior, PDO::PARAM_STR);
		$consulta->execute();

		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function Editar($factura)
	{
		var_dump($factura);
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		UPDATE factura SET
			idEmpresa = :idEmpresa, 
			domicilio = :domicilio, 
			proxVencimiento = :proxVencimiento, 
			montoAnterior = :montoAnterior
		WHERE id = :id");
		$consulta->bindValue(':id', $factura->id, PDO::PARAM_INT);
		$consulta->bindValue(':idEmpresa', $factura->idEmpresa, PDO::PARAM_INT);
		$consulta->bindValue(':domicilio', $factura->domicilio, PDO::PARAM_STR);
		$consulta->bindValue(':proxVencimiento', $factura->proxVencimiento, PDO::PARAM_STR);
		$consulta->bindValue(':montoAnterior', $factura->montoAnterior, PDO::PARAM_STR);

		$consulta->execute();
		return $consulta->rowCount();
	}

	public static function EditarVencimiento($idFactura, $proxVencimiento)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
		UPDATE factura SET
			proxVencimiento = :proxVencimiento
		WHERE id = :id");
		$consulta->bindValue(':id', $idFactura, PDO::PARAM_INT);
		$consulta->bindValue(':proxVencimiento', $proxVencimiento, PDO::PARAM_STR);

		$consulta->execute();
		return $consulta->rowCount();
	}


}