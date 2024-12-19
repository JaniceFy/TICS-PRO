<?php

class ClientesModel
{

	private $db;
	private $clientes;

	public function __construct()
	{
		// Establecer la conexión con la base de datos
		$this->db = Conectar::conexion();
		$this->clientes = array();
	}

	// Obtener todos los clientes de la base de datos
	public function get_clientes()
	{
		$sql = "SELECT * FROM clientes";
		$resultado = $this->db->query($sql);
		while ($row = $resultado->fetch_assoc()) {
			$this->clientes[] = $row;
		}
		return $this->clientes;
	}

	// Insertar un nuevo cliente en la base de datos
	public function insertar($codigo, $nombre, $aPaterno, $aMaterno, $correo, $telefono, $fechaHoraCreacion)
	{
		// Usar sentencia preparada para evitar inyecciones SQL
		$sql = "INSERT INTO clientes (codigo, nombre, aPaterno, aMaterno, correo, telefono, fechaHoraCreacion) 
				VALUES (?, ?, ?, ?, ?, ?, ?)";

		// Preparar la consulta
		$stmt = $this->db->prepare($sql);

		if ($stmt === false) {
			die('Error al preparar la consulta: ' . $this->db->error);
		}

		// Enlazar los parámetros
		$stmt->bind_param("sssssss", $codigo, $nombre, $aPaterno, $aMaterno, $correo, $telefono, $fechaHoraCreacion);

		// Ejecutar la consulta
		if ($stmt->execute()) {
			// Si la ejecución es exitosa
			$stmt->close(); // Cerrar la sentencia
			return true;  // Inserción exitosa
		} else {
			// Si ocurre un error al ejecutar la consulta
			die('Error al ejecutar la consulta: ' . $stmt->error);
		}
	}



	// Método para obtener los datos de un cliente por su ID
	public function get_cliente_by_id($id)
	{
		$sql = "SELECT * FROM clientes WHERE id = ?";
		$stmt = $this->db->prepare($sql);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$resultado = $stmt->get_result();
		$cliente = $resultado->fetch_assoc();
		$stmt->close();

		return $cliente;
	}

	// Método para actualizar los datos de un cliente
	public function actualizar($id, $nombre, $aPaterno, $aMaterno, $correo, $telefono)
	{
		$sql = "UPDATE clientes SET nombre = ?, aPaterno = ?, aMaterno = ?, correo = ?, telefono = ? WHERE id = ?";
		$stmt = $this->db->prepare($sql);
		$stmt->bind_param("sssssi", $nombre, $aPaterno, $aMaterno, $correo, $telefono, $id);
		$stmt->execute();
		$stmt->close();
	}




}

?>