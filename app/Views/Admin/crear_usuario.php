<?php $session = session() ?>
<?= $this->include('dashboard/d_header.php'); ?>

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                <form action="guardar_usuario" method="post" class="mt-3">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>

                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" name="usuario" required>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico:</label>
                    <input type="email" class="form-control" name="correo" required>
                </div>

                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="contrasena" required>
                </div>

                <div class="mb-3">
                    <label for="rol" class="form-label">Rol:</label>
                    <select class="form-select" name="rol" required>
                        <option value="Administrador">Administrador</option>
                        <option value="Donante">Donante</option>
                        <option value="Receptor">Receptor</option>
                        <option value="Voluntario">Voluntario</option>
                    </select>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="habilitado" checked>
                    <label class="form-check-label" for="habilitado">Habilitado</label>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Guardar usuario</button>
            </form>
                </div>
            </div>
        </div>


    </main>

<!-- Pie de página -->
<?= $this->include('dashboard/d_footer.php'); ?>