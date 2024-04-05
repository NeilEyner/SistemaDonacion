<!DOCTYPE html>
<html>
<head>
    <title>Inicio de sesión</title>
    <!-- Agrega tus estilos CSS aquí -->
</head>
<body>
    <div class="container">
        <h1>Inicio de sesión</h1>
        <?php if (session()->has('error')): ?>
            <div class="alert alert-danger"><?= session('error') ?></div>
        <?php endif; ?>

        <?php if ($errors = session('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= esc($error) ?></li> <!-- Utiliza la función esc() para escapar los datos -->
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= route_to('auth.login') ?>" method="post">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" name="username" id="username" class="form-control" value="<?= old('username') ?>">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>
    </div>
    <p>¿No tienes una cuenta? <a href="/register">Regístrate aquí</a></p>
    <!-- Agrega tus scripts JavaScript aquí -->
</body>
</html>
