<?php

class DashboardController
{
    public function __construct()
    {
        require_once "models/UsuariosModel.php";
    }

    // Método que carga la vista del dashboard
    public function index()
    {
        session_start();
        // Aquí puedes verificar si el usuario está autenticado
        if (isset($_SESSION['user_id'])) {
            // Cargar la vista del dashboard
            require_once "views/dashboard.php";
        } else {
            // Si no está autenticado, redirigir al login
            header("Location: index.php?c=AuthController&a=loginForm");
            exit();
        }
    }
}
