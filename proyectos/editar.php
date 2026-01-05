<?php
require_once '../conexion.php';
require_once '../sesiones.php';
verificarSesion();


/* 1. Verificar conexión */
if (!isset($conn)) {
    die('Error de conexión a la base de datos');
}

/* 2. Validar ID */
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = (int) $_GET['id'];

/* 3. Obtener proyecto (SQL seguro) */
$sql = "SELECT * FROM proyectos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header('Location: index.php');
    exit;
}

$proyecto = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar proyecto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="card shadow-sm">
                <div class="card-body">

                    <h1 class="h4 mb-4">✏️ Editar proyecto</h1>

                    <form action="guardar.php" method="POST" enctype="multipart/form-data">

                        <!-- ID oculto -->
                        <input type="hidden" name="id" value="<?= $proyecto['id'] ?>">

                        <div class="mb-3">
                            <label class="form-label">Título *</label>
                            <input type="text"
                                   name="titulo"
                                   class="form-control"
                                   required
                                   value="<?= htmlspecialchars($proyecto['titulo']) ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descripción *</label>
                            <textarea name="descripcion"
                                      class="form-control"
                                      rows="4"
                                      required><?= htmlspecialchars($proyecto['descripcion']) ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">URL del proyecto</label>
                            <input type="url"
                                   name="url"
                                   class="form-control"
                                   value="<?= htmlspecialchars($proyecto['url']) ?>">
                        </div>

                        <!-- Imagen actual -->
                        <?php if (!empty($proyecto['imagen'])): ?>
                            <div class="mb-3">
                                <label class="form-label">Imagen actual</label><br>
                                <img src="uploads/<?= htmlspecialchars($proyecto['imagen']) ?>"
                                     class="img-fluid rounded mb-2"
                                     style="max-height: 200px;">
                            </div>
                        <?php endif; ?>

                        <!-- Nueva imagen -->
                        <div class="mb-3">
                            <label class="form-label">Cambiar imagen (opcional)</label>
                            <input type="file"
                                   name="imagen"
                                   class="form-control"
                                   accept="image/jpeg,image/png,image/webp">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-outline-secondary">
                                ⬅ Volver
                            </a>
                            <button type="submit" class="btn btn-primary">
                                💾 Guardar cambios
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

