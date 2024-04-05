<?= $this->include('Layouts/header.php'); ?>

<body class="">
    <!-- Barra de navegación -->


    <!-- Contenido principal -->
    <main>
        <form action="<?= route_to('Auth.register') ?>" method="post">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Registro</h5>
                                <div class="form-group">
                                    <label for="nombre"><i class="fas fa-user"></i> Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" value="<?= old('nombre') ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="usuario"><i class="fas fa-user"></i> Nombre de Usuario</label>
                                    <input type="text" name="usuario" id="usuario" class="form-control" value="<?= old('usuario') ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="correo"><i class="fas fa-envelope"></i> Correo Electrónico</label>
                                    <input type="email" name="correo" id="correo" class="form-control" value="<?= old('correo') ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="contrasena"><i class="fas fa-lock"></i> Contraseña</label>
                                    <input type="password" name="contrasena" id="contrasena" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="tipo"><i class="fas fa-user-tag"></i> Tipo de Usuario</label>
                                    <select name="tipo" id="tipo" class="form-control" required>
                                        <option value="" disabled selected>Seleccionar tipo de usuario</option>
                                        <option value="Donante">Donante</option>
                                        <option value="Receptor">Receptor</option>
                                        <option value="Voluntario">Voluntario</option>
                                    </select>
                                </div>


                                <!-- Campos adicionales para Donante -->
                                <div id="donante-campos" style="display: none;">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <input type="text" name="direccion" id="direccion" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad</label>
                                        <input type="text" name="ciudad" id="ciudad" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="numero_telefono">Número de Teléfono</label>
                                        <input type="text" name="numero_telefono" id="numero_telefono" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="sitio_web">Sitio Web</label>
                                        <input type="text" name="sitio_web" id="sitio_web" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="otros_detalles">Otros Detalles</label>
                                        <textarea name="otros_detalles" id="otros_detalles" class="form-control"></textarea>
                                    </div>
                                </div>

                                <!-- Campos adicionales para Receptor -->
                                <div id="receptor-campos" style="display: none;">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <input type="text" name="direccion" id="direccion" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad</label>
                                        <input type="text" name="ciudad" id="ciudad" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="numero_telefono">Número de Teléfono</label>
                                        <input type="text" name="numero_telefono" id="numero_telefono" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="sitio_web">Sitio Web</label>
                                        <input type="text" name="sitio_web" id="sitio_web" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="otros_detalles">Otros Detalles</label>
                                        <textarea name="otros_detalles" id="otros_detalles" class="form-control"></textarea>
                                    </div>
                                </div>

                                <!-- Campos adicionales para Voluntario -->
                                <div id="voluntario-campos" style="display: none;">
                                    <div class="form-group">
                                        <label for="experiencia_laboral">Experiencia Laboral</label>
                                        <textarea name="experiencia_laboral" id="experiencia_laboral" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="habilidades">Habilidades</label>
                                        <textarea name="habilidades" id="habilidades" class="form-control"></textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Registrarse</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script>
            // Función para mostrar campos adicionales según el tipo de usuario seleccionado
            document.getElementById('tipo').addEventListener('change', function() {
                var donanteCampos = document.getElementById('donante-campos');
                var receptorCampos = document.getElementById('receptor-campos');
                var voluntarioCampos = document.getElementById('voluntario-campos');

                donanteCampos.style.display = 'none';
                receptorCampos.style.display = 'none';
                voluntarioCampos.style.display = 'none';

                var tipoSeleccionado = this.value;
                if (tipoSeleccionado === 'Donante') {
                    donanteCampos.style.display = 'block';
                } else if (tipoSeleccionado === 'Receptor') {
                    receptorCampos.style.display = 'block';
                } else if (tipoSeleccionado === 'Voluntario') {
                    voluntarioCampos.style.display = 'block';
                }
            });
        </script>

    </main>

    <!-- Pie de página -->
    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>