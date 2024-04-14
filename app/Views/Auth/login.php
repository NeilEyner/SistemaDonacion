<?= $this->include('Layouts/header.php'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Inicio de sesión</h4>
                </div>
                <div class="card-body">
                    <?php if (session()->has('error')) : ?>
                        <div class="alert alert-danger">
                            <?= session('error') ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($errors = session('errors')) : ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($errors as $error) : ?>
                                    <li><?= esc($error) ?></li>
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
                        <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                    </form>
                    <div class="mt-3 text-center">
                        <p>¿No tienes una cuenta? <a href="<?= base_url('Auth/register') ?>">Regístrate aquí</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('Layouts/footer.php'); ?>