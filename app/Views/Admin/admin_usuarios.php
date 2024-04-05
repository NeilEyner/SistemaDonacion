
<div class="container">
    <h1>Usuarios</h1>

    <a href="<?= base_url('admin/usuarios/nuevo') ?>" class="btn btn-primary mb-3">Agregar Usuario</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Rol</th>
                <th>Habilitado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['id'] ?></td>
                <td><?= $usuario['nombre'] . ' ' . $usuario['apellido'] ?></td>
                <td><?= $usuario['email'] ?></td>
                <td><?= $usuario['rol'] ?></td>
                <td><?= $usuario['habilitado'] ? 'Sí' : 'No' ?></td>
                <td>
                    <a href="<?= base_url('admin/usuarios/editar/' . $usuario['id']) ?>" class="btn btn-sm btn-primary">Editar</a>
                    <a href="<?= base_url('admin/usuarios/eliminar/' . $usuario['id']) ?>" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
