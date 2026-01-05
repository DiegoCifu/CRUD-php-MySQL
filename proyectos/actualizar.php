<?php
require_once '../conexion.php';
require_once '../admin/sesiones.php';
verificarSesion();


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"];
    $titulo = trim($_POST["titulo"]);
    $descripcion = trim($_POST["descripcion"]);
    $imagen = trim($_POST["imagen"]);
    $url = trim($_POST["url"]);

    $stmt = $conn->prepare(
        "UPDATE proyectos
         SET titulo = ?, descripcion = ?, imagen = ?, url = ?
         WHERE id = ?"
    );

    $stmt->bind_param("ssssi", $titulo, $descripcion, $imagen, $url, $id);

    if ($stmt->execute()) {
        header("Location: index.php?edit=1");
    } else {
        echo "Error al actualizar";
    }

    $stmt->close();
}
