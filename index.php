<?php

require_once "config/config.php";
require_once "core/routes.php";
require_once "config/database.php";

// Determinar el controlador y la acción, usando los valores predeterminados si no se pasan parámetros
$controlador = isset($_GET['c']) ? $_GET['c'] : CONTROLADOR_PRINCIPAL;
$accion = isset($_GET['a']) ? $_GET['a'] : ACCION_PRINCIPAL;

// Cargar el controlador dinámicamente
$controlador = cargarControlador($controlador);

// Cargar la acción correspondiente
if (isset($_GET['id'])) {
    cargarAccion($controlador, $accion, $_GET['id']);
} else {
    cargarAccion($controlador, $accion);
}
?>
