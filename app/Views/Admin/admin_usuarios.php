<?php
//la sesión
$session = session()

?>
<?= $this->include('Layouts/header.php'); ?>

<body class="">
    <!-- Barra de navegación -->
    <?= $this->include('Layouts/nav.php'); ?>

    <!-- Contenido principal -->
    <main>
        <div class="container">
            <h1>Usuarios</h1>

            <a href="<?= base_url('Admin/crear_usuario') ?>" class="btn btn-primary mb-3">Agregar Usuario</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Correo Electrónico</th>
                        <th>Rol</th>
                        <th>Habilitado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td><?= $usuario['IDUsuario'] ?></td>
                            <td><?= $usuario['Nombre'] ?></td>
                            <td><?= $usuario['Usuario'] ?></td>
                            <td><?= $usuario['CorreoElectronico'] ?></td>
                            <td><?= $usuario['Rol'] ?></td>
                            <td><?= $usuario['Habilitado'] ? 'Sí' : 'No' ?></td>
                            <td>
                                <a href="<?= base_url('Admin/editar_usuario/' . $usuario['IDUsuario']) ?>" class="btn btn-sm btn-primary">Editar</a>
                                <a href="<?= base_url('Admin/eliminar_usuario/' . $usuario['IDUsuario']) ?>" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </main>

    <!-- Pie de página -->
    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>