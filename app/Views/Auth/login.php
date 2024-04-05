<?= $this->include('Layouts/header.php'); ?>

<div class="container mt-5">
    <h1>Inicio de sesión</h1>
    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger"><?= session('error') ?></div>
    <?php endif; ?>

    <?php if ($errors = session('errors')) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= esc($error) ?></li> <!-- Utiliza la función esc() para escapar los datos -->
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= route_to('auth.login') ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Usuario</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= old('username') ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
    <p class="mt-3">¿No tienes una cuenta? <a href="<?php echo base_url('Auth/register') ?>">Regístrate aquí</a></p>
</div>


</main>

<!-- Pie de página -->
<?= $this->include('Layouts/footer.php'); ?>
</body>

</html>