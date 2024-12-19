<?php
class UsuariosModel
{
    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    // Obtener usuario por correo electrónico
    public function getUsuarioByCorreo($correo): ?array
    {
        $sql = "SELECT * FROM usuarios WHERE correo = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        // Si existe el usuario, devolverlo
        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Devuelve los datos del usuario (incluida la contraseña)
        }

        return null; // Si no existe el usuario
    }

    // Verificar contraseña
    public function verificarPassword($correo, $password): ?array
    {
        $usuario = $this->getUsuarioByCorreo($correo);

        if ($usuario) {
            // Comparar la contraseña proporcionada con el hash de la contraseña almacenada
            if (password_verify($password, $usuario['password'])) {
                return $usuario; // Devolver los datos del usuario si la contraseña es correcta
            }
        }

        return null; // Si no hay coincidencia o el usuario no existe
    }
}
?>