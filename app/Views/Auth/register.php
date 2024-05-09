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

    <!-- Custom styles for this template-->
    <link href="<?= base_url('data/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .cont {
            background: linear-gradient(to bottom right, #f0f3f5, #dcdcdc);
        }
    </style>
</head>

<body class="bg-gradient-primary cont">

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">

                <div class="row justify-content-center">

                    <div class="col-lg-5">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Registro</h1>
                                            </div>
                                            <?php if (session()->has('errors')) : ?>
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        <?php foreach (session('errors') as $error) : ?>
                                                            <li><?= esc($error) ?></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                            <form class="user" action="<?= route_to('Auth.register') ?>" method="post">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <label for="nombre"><i class="fas fa-user"></i> Nombre</label>
                                                        <input type="text" name="nombre" id="nombre" class="form-control form-control-user" value="<?= old('nombre') ?>" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="usuario"><i class="fas fa-user"></i> Nombre de Usuario</label>
                                                        <input type="text" name="usuario" id="usuario" class="form-control form-control-user" value="<?= old('usuario') ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="correo"><i class="fas fa-envelope"></i> Correo Electrónico</label>
                                                    <input type="email" name="correo" id="correo" class="form-control form-control-user" value="<?= old('correo') ?>" required>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <label for="contrasena"><i class="fas fa-lock"></i> Contraseña</label>
                                                        <input type="password" name="contrasena" id="contrasena" class="form-control form-control-user" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="tipo"><i class="fas fa-user-tag"></i> Tipo de Usuario</label>
                                                        <select name="tipo" id="tipo" class="form-control form-control-user" required>
                                                            <option value="" disabled selected>Seleccionar tipo de usuario</option>
                                                            <option value="Donante">Donante</option>
                                                            <option value="Receptor">Receptor</option>
                                                            <option value="Voluntario">Voluntario</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Campos adicionales para Donante -->
                                                <div id="donante-campos" class="campos-adicionales" style="display: none;">
                                                    <div class="form-group">
                                                        <label for="direccion">Dirección</label>
                                                        <input type="text" name="direccion" id="direccion" class="form-control form-control-user">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ciudad">Ciudad</label>
                                                        <input type="text" name="ciudad" id="ciudad" class="form-control form-control-user">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="numero_telefono">Número de Teléfono</label>
                                                        <input type="text" name="numero_telefono" id="numero_telefono" class="form-control form-control-user">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sitio_web">Sitio Web</label>
                                                        <input type="text" name="sitio_web" id="sitio_web" class="form-control form-control-user">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="otros_detalles">Otros Detalles</label>
                                                        <textarea name="otros_detalles" id="otros_detalles" class="form-control form-control-user"></textarea>
                                                    </div>
                                                </div>

                                                <!-- Campos adicionales para Receptor -->
                                                <div id="receptor-campos" class="campos-adicionales" style="display: none;">
                                                    <div class="form-group">
                                                        <label for="direccion">Dirección</label>
                                                        <input type="text" name="direccion" id="direccion" class="form-control form-control-user">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ciudad">Ciudad</label>
                                                        <input type="text" name="ciudad" id="ciudad" class="form-control form-control-user">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="numero_telefono">Número de Teléfono</label>
                                                        <input type="text" name="numero_telefono" id="numero_telefono" class="form-control form-control-user">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sitio_web">Sitio Web</label>
                                                        <input type="text" name="sitio_web" id="sitio_web" class="form-control form-control-user">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="otros_detalles">Otros Detalles</label>
                                                        <textarea name="otros_detalles" id="otros_detalles" class="form-control form-control-user"></textarea>
                                                    </div>
                                                </div>

                                                <!-- Campos adicionales para Voluntario -->
                                                <div id="voluntario-campos" class="campos-adicionales" style="display: none;">
                                                    <div class="form-group">
                                                        <label for="experiencia_laboral">Experiencia Laboral</label>
                                                        <textarea name="experiencia_laboral" id="experiencia_laboral" class="form-control form-control-user"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="habilidades">Habilidades</label>
                                                        <textarea name="habilidades" id="habilidades" class="form-control form-control-user"></textarea>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary btn-user btn-block">Registrarse</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('data/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('data/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('data/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('data/') ?>js/sb-admin-2.min.js"></script>
    <script>
        // Función para mostrar campos adicionales según el tipo de usuario seleccionado
        document.getElementById('tipo').addEventListener('change', function() {
            var camposAdicionales = document.querySelectorAll('.campos-adicionales');
            camposAdicionales.forEach(function(campos) {
                campos.style.display = 'none';
            });

            var tipoSeleccionado = this.value;
            if (tipoSeleccionado === 'Donante') {
                document.getElementById('donante-campos').style.display = 'block';
            } else if (tipoSeleccionado === 'Receptor') {
                document.getElementById('receptor-campos').style.display = 'block';
            } else if (tipoSeleccionado === 'Voluntario') {
                document.getElementById('voluntario-campos').style.display = 'block';
            }
        });
    </script>
</body>

</html>