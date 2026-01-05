<?php

// 1. Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "portafolio");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// 2. Obtener los datos enviados desde el formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

// 3. Consulta SQL preparada (segura)
$stmt = $conexion->prepare("INSERT INTO contactos (nombre, email, telefono, mensaje) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $email, $telefono, $mensaje);

// 4. Ejecutar y verificar si se guardó
if ($stmt->execute()) {
    echo "<h2>¡Gracias! Tu mensaje ha sido enviado.</h2>";
} else {
    echo "Error al guardar el contacto: " . $stmt->error;
}

$stmt->close();
$conexion->close();

?>
