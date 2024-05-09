<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title ?? 'Sistema de Donaciones'; ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo/logoB.png') ?>" />

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('data/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <style>
        .cont {
            background: linear-gradient(to bottom right, #f0f3f5, #dcdcdc);
        }
    </style>
    <!-- Custom styles for this template-->
    <link href="<?= base_url('data/') ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="cont">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block  ">
                                <img class="img-fluid" src="<?= base_url('assets/') ?>images/3d/dona06.jpg" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <br>

                                        <br>
                                        <h1 class="h4 text-gray-900 mb-4">Inicio de sesión</h1>
                                        <br>
                                        <br>
                                    </div>
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
                                            <input type="text" name="username" id="username" class="form-control form-control-user" placeholder="Usuario" value="<?= old('username') ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="Contraseña">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Iniciar sesión</button>
                                    </form>
                                    <div class="mt-3 text-center">
                                        <p>¿No tienes una cuenta? <a href="<?= base_url('Auth/register') ?>">Regístrate aquí</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>



<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('data/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('data/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('data/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('data/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>