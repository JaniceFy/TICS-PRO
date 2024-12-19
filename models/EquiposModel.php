<?php

class EquiposModel
{
    private $db;
    private $equipos;

    public function __construct()
    {
        // Establecer la conexión con la base de datos
        $this->db = Conectar::conexion();
        $this->equipos = array();
    }

    // Insertar un nuevo equipo en la base de datos
    public function insertar($numSerie, $tipo, $marca, $modelo, $password, $accesorios, $condicionEstetica, $evidenciaFotografica, $clienteId)
    {
        // Usar sentencia preparada para evitar inyecciones SQL
        $sql = "INSERT INTO equipos (numSerie, tipo, marca, modelo, password, accesorios, condicionEstetica, evidenciaFotografica, clienteId) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        if ($stmt === false) {
            die('Error al preparar la consulta: ' . $this->db->error);
        }

        // Enlazar los parámetros
        // 's' -> string (todos los valores de texto)
        // 'b' -> blob (evidenciaFotografica)
        // 'i' -> integer (clienteId)
        $stmt->bind_param("ssssssssi", $numSerie, $tipo, $marca, $modelo, $password, $accesorios, $condicionEstetica, $evidenciaFotografica, $clienteId);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Si la ejecución es exitosa
            $stmt->close(); // Cerrar la sentencia
            return true;  // Inserción exitosa
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
            die();
        }
    }



    // Obtener todos los equipos de la base de datos
    public function get_equipos()
    {
        $sql = "SELECT * FROM equipos";
        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $this->equipos[] = $row;
        }
        return $this->equipos;
    }


    public function get_equipo_by_id($id)
    {
        $sql = "SELECT 
                    equipos.*, 
                    clientes.codigo AS clienteCodigo, 
                    clientes.nombre AS clienteNombre, 
                    clientes.aPaterno AS clienteAPaterno, 
                    clientes.aMaterno AS clienteAMaterno
                FROM equipos
                LEFT JOIN clientes ON equipos.clienteId = clientes.id
                WHERE equipos.id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $equipo = $resultado->fetch_assoc();
        $stmt->close();

        return $equipo;
    }



    public function actualizar($id, $numSerie, $tipo, $marca, $modelo, $password, $accesorios, $condicionEstetica, $evidenciaFotografica = null)
    {
        // Crear la base de la consulta SQL
        $sql = "UPDATE equipos 
            SET numSerie = ?, tipo = ?, marca = ?, modelo = ?, password = ?, accesorios = ?, condicionEstetica = ?";

        // Añadir el campo de evidenciaFotografica solo si se proporciona
        if ($evidenciaFotografica !== null) {
            $sql .= ", evidenciaFotografica = ?";
        }

        $sql .= " WHERE id = ?";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Verificar si se debe actualizar la evidenciaFotografica
        if ($evidenciaFotografica !== null) {
            // Si hay una nueva evidencia fotográfica, se pasa como parámetro
            $stmt->bind_param("ssssssssi", $numSerie, $tipo, $marca, $modelo, $password, $accesorios, $condicionEstetica, $evidenciaFotografica, $id);
        } else {
            // Si no hay evidencia fotográfica nueva, se actualizan solo los otros campos
            $stmt->bind_param("sssssssi", $numSerie, $tipo, $marca, $modelo, $password, $accesorios, $condicionEstetica, $id);
        }

        // Ejecutar la consulta
        if (!$stmt->execute()) {
            die("Error al actualizar el equipo: " . $stmt->error);
        }

        // Cerrar la consulta
        $stmt->close();
    }



}
?>