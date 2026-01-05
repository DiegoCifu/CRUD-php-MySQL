<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="h4 mb-4 text-center">🔐 Acceso administrador</h1>

                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger text-center">
                            Credenciales incorrectas
                        </div>
                    <?php endif; ?>

                    <form action="procesar_login.php" method="POST">
                        <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button class="btn btn-primary w-100">Entrar</button>
                    </form>


                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>

