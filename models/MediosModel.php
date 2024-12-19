<?php

class MediosModel
{
    private $db;

    public function __construct()
    {
        // Establecer la conexión con la base de datos
        $this->db = Conectar::conexion();
    }

    // Método para obtener todos los medios
    public function get_medios()
    {
        $sql = "SELECT * FROM medios";
        $resultado = $this->db->query($sql);

        // Verificar si la consulta ha devuelto resultados
        if ($resultado) {
            $medios = array();
            while ($row = $resultado->fetch_assoc()) {
                $medios[] = $row;
            }
            return $medios;
        } else {
            return [];  // En caso de error, retornar un array vacío
        }
    }
}



?>