<?php
require_once '../conexion.php';
require_once '../sesiones.php';
verificarSesion();


/* 1. Validar ID */
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = (int) $_GET['id'];

/* 2. Obtener imagen asociada (para borrarla del servidor) */
$stmt = $conn->prepare("SELECT imagen FROM proyectos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header('Location: index.php');
    exit;
}

$proyecto = $result->fetch_assoc();
$imagen = $proyecto['imagen'];
$stmt->close();

/* 3. Eliminar registro */
$stmt = $conn->prepare("DELETE FROM proyectos WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {

    /* 4. Eliminar imagen física si existe */
    if ($imagen) {
        $rutaImagen = __DIR__ . '/../imagenes/' . $imagen;
        if (file_exists($rutaImagen)) {
            unlink($rutaImagen);
        }
    }

    header('Location: index.php?deleted=1');
    exit;
}

$stmt->close();
$conn->close();

echo "Error al eliminar el proyecto";
