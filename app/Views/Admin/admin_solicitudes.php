<div class="container">
    <h1>Solicitudes de Donación</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Receptor</th>
                <th>Fecha</th>
                <th>Prioridad</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($solicitudes as $solicitud) : ?>
                <tr>
                    <td><?= $solicitud['id'] ?></td>
                    <td><?= $solicitud['nombre_receptor'] ?></td>
                    <td><?= $solicitud['fecha_solicitud'] ?></td>
                    <td><?= $solicitud['prioridad'] ?></td>
                    <td><?= $solicitud['estado'] ?></td>
                    <td>
                        <a href="<?= base_url('admin/solicitudes/detalles/' . $solicitud['id']) ?>" class="btn btn-sm btn-primary">Detalles</a>
                        <a href="<?= base_url('admin/solicitudes/aceptar/' . $solicitud['id']) ?>" class="btn btn-sm btn-success">Aceptar</a>
                        <a href="<?= base_url('admin/solicitudes/rechazar/' . $solicitud['id']) ?>" class="btn btn-sm btn-danger">Rechazar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>