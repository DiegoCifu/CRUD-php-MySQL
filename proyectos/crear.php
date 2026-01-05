<?php
require_once '../conexion.php';
require_once '../sesiones.php';
verificarSesion();

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear proyecto | Portafolio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">

      <div class="card shadow-sm">
        <div class="card-body">

          <h1 class="h4 mb-4 text-center">➕ Nuevo proyecto</h1>

          <!-- FORMULARIO -->
          <form action="guardar.php" method="POST">

            <!-- Título -->
            <div class="mb-3">
              <label for="titulo" class="form-label">Título del proyecto *</label>
              <input 
                type="text" 
                name="titulo" 
                id="titulo" 
                class="form-control" 
                required
                maxlength="150"
              >
            </div>

            <!-- Descripción -->
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción *</label>
              <textarea 
                name="descripcion" 
                id="descripcion" 
                class="form-control" 
                rows="4" 
                required
              ></textarea>
            </div>

            <!-- Imagen -->
            <div class="mb-3">
              <label for="imagen" class="form-label">URL de imagen</label>
              <input 
                type="url" 
                name="imagen" 
                id="imagen" 
                class="form-control"
                placeholder="https://..."
              >
            </div>

            <!-- URL del proyecto -->
            <div class="mb-4">
              <label for="url" class="form-label">URL del proyecto</label>
              <input 
                type="url" 
                name="url" 
                id="url" 
                class="form-control"
                placeholder="https://..."
              >
            </div>

            <!-- BOTONES -->
            <div class="d-flex justify-content-between">
              <a href="index.php" class="btn btn-outline-secondary">
                ← Volver
              </a>

              <button type="submit" class="btn btn-primary">
                Guardar proyecto
              </button>
            </div>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>

</body>
</html>
