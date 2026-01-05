<?php
require_once '../conexion.php';
$resultado = $conn->query("SELECT * FROM proyectos ORDER BY fecha_creacion DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mi Portafolio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <span class="navbar-brand">👨‍💻 Mi Portafolio</span>
  </div>
</nav>

<div class="container py-5">
  <h1 class="mb-4">Proyectos</h1>

  <div class="row g-4">
    <?php while ($p = $resultado->fetch_assoc()): ?>
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <?php if ($p['imagen']): ?>
            <img src="../imagenes/<?= htmlspecialchars($p['imagen']) ?>" class="card-img-top">
          <?php endif; ?>
          <div class="card-body">
            <h5><?= htmlspecialchars($p['titulo']) ?></h5>
            <p><?= htmlspecialchars($p['descripcion']) ?></p>
            <?php if ($p['url']): ?>
              <a href="<?= htmlspecialchars($p['url']) ?>" target="_blank" class="btn btn-outline-primary">
                Ver proyecto
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

</body>
</html>



