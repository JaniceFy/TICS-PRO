<?php
// routes.php
function cargarControlador($controlador)
{
    $nombreControlador = ucwords($controlador);

    if (substr($nombreControlador, -10) !== 'Controller') {
        $nombreControlador .= 'Controller';
    }

    $archivoControlador = 'controllers/' . $nombreControlador . '.php';

    if (!is_file($archivoControlador)) {
        // Si no existe, cargar el controlador predeterminado
        $archivoControlador = 'controllers/' . CONTROLADOR_PRINCIPAL . 'Controller.php';
    }

    require_once $archivoControlador;
    $control = new $nombreControlador();
    return $control;
}

function cargarAccion($controller, $accion, $id = null)
{
    // Verificar si la acción está definida en el controlador
    if (isset($accion) && method_exists($controller, $accion)) {
        if ($id == null) {
            $controller->$accion();
        } else {
            $controller->$accion($id);
        }
    } else {
        // Si la acción no existe, redirigir a la acción predeterminada, por ejemplo 'index'
        $controller->index();  // Llamar al método index() por defecto
    }
}

// Definir las rutas
$routes = [
    // Rutas públicas
    'login' => ['controller' => 'AuthController', 'action' => 'loginForm'],
    'loginPost' => ['controller' => 'AuthController', 'action' => 'login'],
    'logout' => ['controller' => 'AuthController', 'action' => 'logout'],

    // Rutas protegidas (por ejemplo, dashboard)
    'dashboard' => ['controller' => 'DashboardController', 'action' => 'index'],
];

?>