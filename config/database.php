<?php

class Conectar
{
	public static function conexion()
	{
		$conexion = new mysqli("localhost", "root", "", "proyecto");

		if ($conexion->connect_error) {
			die("Conexión fallida: " . $conexion->connect_error);
		}
		return $conexion;
	}
}

?>