<?php

require_once "AccesoDatos.php";

class empresa
{
	public $id;
	public $nombre;
	public $rutaImagen;
	 
	
	public static function TraerTodo()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM empresa");

		$consulta->execute();
		$arrEmpresas= $consulta->fetchAll(PDO::FETCH_CLASS, "empresa");	
		return $arrEmpresas;
	}



}