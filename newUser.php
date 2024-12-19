<?php
// Conexión a la base de datos
require_once "config/database.php";

// Obtener los datos del nuevo usuario
$nombre = 'Janice';
$aPaterno = 'Flores';
$aMaterno = 'Garcia';
$telefono = '7571478312';
$correo = 'janicen.fy@gmail.com';
$rol = 'Administrador';  // Este puede ser 'admin', 'usuario', etc.

// Hashear la contraseña
$password = password_hash('12345678', PASSWORD_DEFAULT);

// Verifica la conexión antes de continuar
$conexion = Conectar::conexion();
if ($conexion->ping()) {
    echo "Conexión exitosa a la base de datos.<br>";
} else {
    echo "Error de conexión: " . $conexion->error . "<br>";
}

// Insertar en la base de datos
$sql = "INSERT INTO usuarios (nombre, aPaterno, aMaterno, telefono, correo, password, rol, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";

$stmt = $conexion->prepare($sql);

// Bind parameters
$stmt->bind_param("sssssss", $nombre, $aPaterno, $aMaterno, $telefono, $correo, $password, $rol);

// Ejecutar el query
if ($stmt->execute()) {
    echo "Usuario registrado correctamente.";
} else {
    echo "Error al registrar el usuario: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>
