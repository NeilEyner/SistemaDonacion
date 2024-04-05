<div class="container">
    <h1>Donaciones</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Donante</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($donaciones as $donacion): ?>
            <tr>
                <td><?= $donacion['id'] ?></td>
                <td><?= $donacion['nombre_donante'] ?></td>
                <td><?= $donacion['fecha_donacion'] ?></td>
                <td><?= $donacion['tipo_donacion'] ?></td>
                <td><?= $donacion['estado'] ?></td>
                <td>
                    <a href="<?= base_url('admin/donaciones/detalles/' . $donacion['id']) ?>" class="btn btn-sm btn-primary">Detalles</a>
                    <a href="<?= base_url('admin/donaciones/aceptar/' . $donacion['id']) ?>" class="btn btn-sm btn-success">Aceptar</a>
                    <a href="<?= base_url('admin/donaciones/rechazar/' . $donacion['id']) ?>" class="btn btn-sm btn-danger">Rechazar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>