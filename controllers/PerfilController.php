<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?c=auth&a=loginForm"); // Redirige al login si no está logueado
    exit();
}

class PerfilController {

    // Acción para mostrar el perfil
    public function mostrarPerfil() {
        // Aquí obtienes los datos del usuario desde la sesión
        $usuario = [
            'nombre' => $_SESSION['nombre'],
            'correo' => $_SESSION['correo'],
            'telefono' => $_SESSION['telefono'],
            'aPaterno' => $_SESSION['aPaterno'],
            'aMaterno' => $_SESSION['aMaterno'],
            'rol' => $_SESSION['rol']
        ];

        // Incluye la vista para mostrar el perfil
        include("views/PerfilUsuario.php");
    }

    // Acción para actualizar el perfil
    public function actualizarPerfil($id) {
        // Aquí manejarías la lógica para actualizar los datos del perfil
        // Después de actualizar, rediriges a la vista del perfil
        header("Location: index.php?c=perfil&a=mostrarPerfil&id=" . $id);
        exit();
    }
}
?>
