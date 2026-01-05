<?php
// ==========================================
// GUARDAR PROYECTO - PORTAFOLIO CRUD
// ==========================================

require_once '../conexion.php';
require_once '../sesiones.php';
verificarSesion();


// Verificar conexión
if (!isset($conn) || $conn->connect_error) {
    die('Error de conexión a la base de datos');
}

// Solo permitir POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Recoger y sanear datos
$titulo = trim($_POST['titulo'] ?? '');
$descripcion = trim($_POST['descripcion'] ?? '');
$url = trim($_POST['url'] ?? '');
$imagen = null;

// Validaciones básicas
if ($titulo === '' || $descripcion === '') {
    die('El título y la descripción son obligatorios');
}

// ==========================================
// SUBIDA DE IMAGEN (opcional)
// ==========================================
if (!empty($_FILES['imagen']['name'])) {

    $directorio = __DIR__ . '/uploads/';

    if (!is_dir($directorio)) {
        mkdir($directorio, 0755, true);
    }

    // Validar tipo MIME
    $tiposPermitidos = ['image/jpeg', 'image/png', 'image/webp'];
    $tipoArchivo = mime_content_type($_FILES['imagen']['tmp_name']);

    // Validar tamaño (máx 2MB)
    $maxSize = 2 * 1024 * 1024;

    if (!in_array($tipoArchivo, $tiposPermitidos)) {
        die('Formato de imagen no permitido');
    }

    if ($_FILES['imagen']['size'] > $maxSize) {
        die('La imagen supera el tamaño máximo permitido (2MB)');
    }

    // Nombre seguro
    $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
    $nombreArchivo = uniqid('proyecto_', true) . '.' . $extension;
    $rutaDestino = $directorio . $nombreArchivo;

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
        $imagen = $nombreArchivo;
    } else {
        die('Error al subir la imagen');
    }
}

// ==========================================
// INSERTAR EN BASE DE DATOS
// ==========================================
$sql = "INSERT INTO proyectos (titulo, descripcion, imagen, url)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die('Error en la preparación de la consulta');
}

$stmt->bind_param("ssss", $titulo, $descripcion, $imagen, $url);

if ($stmt->execute()) {
    header('Location: index.php?success=1');
    exit;
} else {
    die('Error al guardar el proyecto');
}

// Cerrar conexiones
$stmt->close();
$conn->close();
