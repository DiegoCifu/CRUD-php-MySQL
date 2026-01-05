<?php
/* ============================================
   Archivo: conexion.php
   Autor: Diego (Portafolio Profesional)
   Función: Establecer conexión segura a MySQL
   ============================================ */

$host = "localhost";
$user = "root";
$pass = "";
$db   = "portafolio_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
