<?php
require_once '../conexion.php';
require_once '../sesiones.php';
verificarSesion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">
  <h1 class="mb-4">📊 Panel de Administración</h1>

  <div class="row g-4">

    <div class="col-md-4">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <h5>📁 Proyectos</h5>
          <p>Crear, editar y eliminar proyectos.</p>
          <a href="../proyectos/index.php" class="btn btn-primary w-100">
            Gestionar
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <h5>📩 Contactos</h5>
          <p>Mensajes enviados desde la web.</p>
          <span class="text-muted">Lectura directa en DB</span>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <h5>🚪 Sesión</h5>
          <p>Cerrar sesión de forma segura.</p>
          <a href="logout.php" class="btn btn-outline-danger w-100">
            Cerrar sesión
          </a>
        </div>
      </div>
    </div>

  </div>
</div>

</body>
</html>

