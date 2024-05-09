<?php $session = session() ?>
<?= $this->include('dashboard/d_header.php'); ?>

    <main>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="actualizar_usuario" method="post" class="mt-3">
                <input type="hidden" name="id" value="<?= $usuario['IDUsuario'] ?>">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="<?= $usuario['Nombre'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" name="usuario" value="<?= $usuario['Usuario'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico:</label>
                    <input type="email" class="form-control" name="correo" value="<?= $usuario['CorreoElectronico'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="contrasena" value="<?= $usuario['Contrasena'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="rol" class="form-label">Rol:</label>
                    <select class="form-select" name="rol" required>
                        <option value="Administrador" <?= ($usuario['Rol'] == 'Administrador') ? 'selected' : '' ?>>Administrador</option>
                        <option value="Donante" <?= ($usuario['Rol'] == 'Donante') ? 'selected' : '' ?>>Donante</option>
                        <option value="Receptor" <?= ($usuario['Rol'] == 'Receptor') ? 'selected' : '' ?>>Receptor</option>
                        <option value="Voluntario" <?= ($usuario['Rol'] == 'Voluntario') ? 'selected' : '' ?>>Voluntario</option>
                    </select>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="habilitado" <?= ($usuario['Habilitado']) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="habilitado">Habilitado</label>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Actualizar usuario</button>
            </form>
        </div>
    </div>
</div>


    </main>

<!-- Pie de página -->
<?= $this->include('dashboard/d_footer.php'); ?>