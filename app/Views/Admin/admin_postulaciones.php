<div class="container">
    <h1>Postulaciones de Voluntarios</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Voluntario</th>
                <th>Operación</th>
                <th>Solicitud</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($postulaciones as $postulacion): ?>
            <tr>
                <td><?= $postulacion['id'] ?></td>
                <td><?= $postulacion['nombre_voluntario'] ?></td>
                <td><?= $postulacion['tipo_operacion'] ?></td>
                <td><?= $postulacion['descripcion_solicitud'] ?></td>
                <td><?= $postulacion['fecha_postulacion'] ?></td>
                <td><?= $postulacion['estado_postulacion'] ?></td>
                <td>
                    <a href="<?= base_url('admin/postulaciones/aceptar/' . $postulacion['id']) ?>" class="btn btn-sm btn-success">Aceptar</a>
                    <a href="<?= base_url('admin/postulaciones/rechazar/' . $postulacion['id']) ?>" class="btn btn-sm btn-danger">Rechazar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>