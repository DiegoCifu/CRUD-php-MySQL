<?php
require_once '../conexion.php';
session_start();

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();

    if (password_verify($password, $usuario['password'])) {
        $_SESSION['admin'] = true;
        $_SESSION['nombre'] = $usuario['nombre'];
        header('Location: dashboard.php');
        exit;
    }
}

header('Location: login.php?error=1');
exit;
