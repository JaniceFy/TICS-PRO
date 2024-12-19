<?php

class FormatosModel
{
    private $db;
    private $formatos;

    public function __construct()
    {
        $this->db = Conectar::conexion(); // Conectar a la base de datos
    }

    // Método para insertar un nuevo formato
    public function insertar($codigo,   $problemaReportado, $servicioARealizar, $piezasACambiar, $costoPiezas, $costoServicio, $anticipo, $resto, $clienteId, $equipoId, $estadoId)
    {
        // Usar sentencia preparada para evitar inyecciones SQL
        $sql = "INSERT INTO formatos (codigo, problemaReportado, servicioARealizar, piezasACambiar, costoPiezas, costoServicio, anticipo, resto, fechaHoraCreacion, estadoId, clienteId, equipoId)
                VALUES (?,  ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?)";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        if ($stmt === false) {
            die('Error al preparar la consulta: ' . $this->db->error);
        }

        // Enlazar los parámetros
        $stmt->bind_param("sssssddiiii", $codigo,$problemaReportado, $servicioARealizar, $piezasACambiar, $costoPiezas, $costoServicio, $anticipo, $resto, $estadoId, $clienteId, $equipoId);

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




    public function get_formatos()
    {
        // Realizamos el JOIN entre las tablas 'formatos', 'clientes', 'equipos' y 'estados'
        $sql = "SELECT f.*, c.nombre AS cliente_nombre, e.estado AS estado_nombre, eq.tipo AS equipo_tipo, eq.numSerie AS equipo_numSerie
            FROM formatos f
            JOIN clientes c ON f.clienteId = c.id
            JOIN equipos eq ON f.equipoId = eq.id
            JOIN estados e ON f.estadoId = e.id";

        $resultado = $this->db->query($sql);

        // Si obtenemos resultados, los almacenamos en el array
        while ($row = $resultado->fetch_assoc()) {
            $this->formatos[] = $row;
        }

        return $this->formatos;
    }



    public function get_formato_by_id($id)
    {
        $sql = "SELECT f.*, c.id AS cliente_id, c.codigo AS cliente_codigo, c.nombre AS cliente_nombre, 
        e.id AS estado_id, e.estado AS estado_nombre, eq.id AS equipo_id, eq.numSerie AS equipo_numSerie, eq.tipo AS equipo_tipo,
        eq.marca AS equipo_marca, eq.modelo AS equipo_modelo, eq.password AS equipo_password, eq.evidenciaFotografica AS equipo_evidencia,
        eq.accesorios AS equipo_accesorios, eq.condicionEstetica AS equipo_condicion
            FROM formatos f
            JOIN clientes c ON f.clienteId = c.id
            JOIN equipos eq ON f.equipoId = eq.id
            JOIN estados e ON f.estadoId = e.id
            WHERE f.id = ?"; // Filtramos por el ID del formato

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Enlazar el parámetro ID
        $stmt->bind_param("i", $id);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $resultado = $stmt->get_result();

        // Verificar si se obtuvo un resultado
        if ($row = $resultado->fetch_assoc()) {
            return $row; // Retornar el formato encontrado
        } else {
            return null; // Si no se encuentra el formato
        }
    }



    public function actualizar_formato($id, $servicioARealizar, $piezasACambiar, $costoPiezas, $costoServicio, $anticipo, $resto, $estadoId)
    {
        $sql = "UPDATE formatos 
                SET servicioARealizar = ?, 
                    piezasACambiar = ?, 
                    costoPiezas = ?, 
                    costoServicio = ?, 
                    anticipo = ?, 
                    resto = ?, 
                    estadoId = ?,
                    fechaHoraActualizacion = NOW()
                WHERE id = ?";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        if ($stmt === false) {
            die('Error al preparar la consulta: ' . $this->db->error);
        }

        // Enlazar los parámetros
        $stmt->bind_param(
            "ssdddiii",
            $servicioARealizar,
            $piezasACambiar,
            $costoPiezas,
            $costoServicio,
            $anticipo,
            $resto,
            $estadoId,
            $id
        );

        // Ejecutar la consulta
        if ($stmt->execute()) {
            $stmt->close();
            return true; // Actualización exitosa
        } else {
            die('Error al ejecutar la consulta: ' . $stmt->error);
        }
    }





}

?>