<?php

class AuthController
{
    public function __construct()
    {
        require_once "models/UsuariosModel.php";
    }

    // Mostrar el formulario de login
    public function loginForm()
    {
        // Si ya hay un error de autenticación, lo mostramos en la vista
        $error = isset($_SESSION['error']) ? $_SESSION['error'] : null;
        require_once "views/auth/login.php";
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST['correo'];
            $password = $_POST['password'];
    
            $usuariosModel = new UsuariosModel();
            $usuario = $usuariosModel->verificarPassword($correo, $password);
    
            if ($usuario) {
                // Iniciar sesión
                session_start();
                $_SESSION['user_id'] = $usuario['id'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['aPaterno'] = $usuario['aPaterno'];
                $_SESSION['aMaterno'] = $usuario['aMaterno'];
                $_SESSION['telefono'] = $usuario['telefono'];
                $_SESSION['correo'] = $usuario['correo'];
                $_SESSION['rol'] = $usuario['rol'];
                $_SESSION['created_at'] = $usuario['created_at'];
    
                // Redirigir al dashboard
                header("Location: index.php?c=DashboardController&a=index");
                exit();
            } else {
                // Si las credenciales son incorrectas, redirigir al login con error
                $_SESSION['error'] = 'Correo o contraseña incorrectos';
                header("Location: index.php?c=AuthController&a=loginForm");
                exit();
            }
        }
    }
    

    // Cerrar sesión
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php?c=AuthController&a=loginForm");
        exit();
    }
}
?>