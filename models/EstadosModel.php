<?php

class EstadosModel
{
    private $db;

    public function __construct()
    {
        // Establecer la conexión con la base de datos
        $this->db = Conectar::conexion();
    }

    // Método para obtener todos los estados
    public function get_estados()
    {
        $sql = "SELECT * FROM estados";
        $resultado = $this->db->query($sql);

        // Verificar si la consulta ha devuelto resultados
        if ($resultado) {
            $estados = array();
            while ($row = $resultado->fetch_assoc()) {
                $estados[] = $row;
            }
            return $estados;
        } else {
            return [];  // En caso de error, retornar un array vacío
        }
    }
}



?>