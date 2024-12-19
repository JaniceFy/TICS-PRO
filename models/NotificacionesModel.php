<?php

class NotificacionesModel
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    // Método para insertar una nueva notificación
    public function insertar($codigo, $formatoId, $medioId, $mensaje, $fecha, $hora)
    {
        $sql = "INSERT INTO notificaciones (codigo, formatoId, medioId, mensaje, fecha, hora, fechaHoraCreacion)
                VALUES (?, ?, ?, ?, ?, ?, NOW())";

        $stmt = $this->db->prepare($sql);

        if ($stmt === false) {
            die('Error al preparar la consulta: ' . $this->db->error);
        }

        $stmt->bind_param("siisss", $codigo, $formatoId, $medioId, $mensaje, $fecha, $hora);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            error_log('Error al ejecutar la consulta: ' . $stmt->error); // Registro en log de errores
            return false;
        }
    }



    public function get_notificaciones_by_formato($formatoId)
    {
        // Consulta SQL para obtener las notificaciones junto con el nombre del medio
        $sql = "SELECT n.*, m.medio 
            FROM notificaciones n
            LEFT JOIN medios m ON n.medioId = m.id
            WHERE n.formatoId = ?";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        if ($stmt === false) {
            die('Error al preparar la consulta: ' . $this->db->error);
        }

        // Enlazar el parámetro
        $stmt->bind_param("i", $formatoId);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener los resultados
        $result = $stmt->get_result();

        // Verificar si hay resultados y devolverlos
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        // Si no hay resultados, devolver un arreglo vacío
        return [];
    }



    public function obtenerPorId($id)
    {
        // Consulta para obtener la notificación junto con el nombre del medio
        $sql = "SELECT n.*, m.medio 
            FROM notificaciones n
            LEFT JOIN medios m ON n.medioId = m.id
            WHERE n.id = ?";

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        if ($stmt === false) {
            die('Error al preparar la consulta: ' . $this->db->error);
        }

        // Enlazar el parámetro
        $stmt->bind_param("i", $id);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $result = $stmt->get_result();

        // Retornar el resultado como un array asociativo si se encuentra
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        // Si no se encuentra, devolver null
        return null;
    }





}
?>