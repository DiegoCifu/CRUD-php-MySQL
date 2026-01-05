<?php
require_once '../conexion.php';
require_once '../sesiones.php';
verificarSesion();

/* Obtener proyectos */
$sql = "SELECT * FROM proyectos ORDER BY fecha_creacion DESC";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gestión de Proyectos | Portafolio</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Accesibilidad -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body class="bg-light">

<div class="container py-5">

  <!-- HEADER -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold">📁 Proyectos</h1>
    <a href="crear.php" class="btn btn-primary">
      ➕ Nuevo proyecto
    </a>
  </div>

  <!-- TABLA -->
  <div class="card shadow-sm">
    <div class="card-body">

      <?php if ($resultado->num_rows > 0): ?>
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>URL</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>

              <?php while ($row = $resultado->fetch_assoc()): ?>
                <tr>
                  <td><?= $row['id'] ?></td>
                  <td><?= htmlspecialchars($row['titulo']) ?></td>
                  <td><?= htmlspecialchars($row['descripcion']) ?></td>

                  <td>
                    <?php if ($row['imagen']): ?>
                      <img src="../imagenes/<?= htmlspecialchars($row['imagen']) ?>"
                           alt="Imagen proyecto"
                           width="80"
                           class="rounded">
                    <?php else: ?>
                      <span class="text-muted">Sin imagen</span>
                    <?php endif; ?>
                  </td>

                  <td>
                    <?php if ($row['url']): ?>
                      <a href="<?= htmlspecialchars($row['url']) ?>" target="_blank">
                        Ver proyecto
                      </a>
                    <?php else: ?>
                      —
                    <?php endif; ?>
                  </td>

                  <td>
                    <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                      ✏️ Editar
                    </a>

                    <a href="eliminar.php?id=<?= $row['id'] ?>"
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('¿Seguro que deseas eliminar este proyecto?');">
                      🗑️ Eliminar
                    </a>
                  </td>
                </tr>
              <?php endwhile; ?>

            </tbody>
          </table>
        </div>
      <?php else: ?>
        <p class="text-center text-muted m-0">
          No hay proyectos registrados todavía.
        </p>
      <?php endif; ?>

    </div>
  </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
