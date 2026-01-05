<?php
session_start();

function verificarSesion() {
    if (!isset($_SESSION['admin'])) {
        header('Location: /admin/login.php');
        exit;
    }
}
