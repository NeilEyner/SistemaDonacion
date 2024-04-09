<?php $session = session()?>
<?= $this->include('Layouts/header.php'); ?>

<body class="">
    <!-- Barra de navegación -->
    <?= $this->include('Layouts/nav.php'); ?>

    <!-- Contenido principal -->
    <main>
        <div class="container">
            <h1 class="mt-5 mb-4">Solicitudes de Donación</h1>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="table-dark">
                            <th>ID</th>
                            <th>ID Receptor</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Descripción de la Necesidad</th>
                            <th>Prioridad</th>
                            <th>Fecha Límite de Entrega</th>
                            <th>Instrucciones de Entrega</th>
                            <th>Confirmación de Recepción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($solicitudes as $solicitud) : ?>
                            <tr>
                                <td><?= $solicitud['IDSolicitud'] ?></td>
                                <td><?= $solicitud['IDReceptor'] ?></td>
                                <td><?= $solicitud['FechaSolicitud'] ?></td>
                                <td><?= $solicitud['EstadoSolicitud'] ?></td>
                                <td><?= $solicitud['DescripcionNecesidad'] ?></td>
                                <td><?= $solicitud['Prioridad'] ?></td>
                                <td><?= $solicitud['FechaLimiteEntrega'] ?></td>
                                <td><?= $solicitud['InstruccionesEntrega'] ?></td>
                                <td><?= $solicitud['ConfirmacionRecepcion'] ? 'Sí' : 'No' ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?= base_url('Admin/admin_solicitudes/solicitudes_detalles/' . $solicitud['IDSolicitud']) ?>" class="btn btn-sm btn-primary"><i class="fas fa-info-circle"></i> Detalles</a>
                                        <?php if ($solicitud['EstadoSolicitud'] === 'Pendiente') : ?>
                                            <a href="<?= base_url('Admin/admin_solicitudes/solicitudes_aceptar/' . $solicitud['IDSolicitud']) ?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Aceptar</a>
                                            <a href="<?= base_url('Admin/admin_solicitudes/solicitudes_rechazar/' . $solicitud['IDSolicitud']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Rechazar</a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="container">
            <h1 class="mt-5 mb-4">Solicitudes de Donación ACEPTADA</h1>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="table-dark">
                            <th>ID</th>
                            <th>ID Receptor</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Descripción de la Necesidad</th>
                            <th>Prioridad</th>
                            <th>Fecha Límite de Entrega</th>
                            <th>Instrucciones de Entrega</th>
                            <th>Confirmación de Recepción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($solicitudesAceptada as $solicitud) : ?>
                            <tr>
                                <td><?= $solicitud['IDSolicitud'] ?></td>
                                <td><?= $solicitud['IDReceptor'] ?></td>
                                <td><?= $solicitud['FechaSolicitud'] ?></td>
                                <td><?= $solicitud['EstadoSolicitud'] ?></td>
                                <td><?= $solicitud['DescripcionNecesidad'] ?></td>
                                <td><?= $solicitud['Prioridad'] ?></td>
                                <td><?= $solicitud['FechaLimiteEntrega'] ?></td>
                                <td><?= $solicitud['InstruccionesEntrega'] ?></td>
                                <td><?= $solicitud['ConfirmacionRecepcion'] ? 'Sí' : 'No' ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?= base_url('Admin/admin_solicitudes/solicitudes_detalles/' . $solicitud['IDSolicitud']) ?>" class="btn btn-sm btn-primary"><i class="fas fa-info-circle"></i> Detalles</a>
                                        <?php if ($solicitud['EstadoSolicitud'] === 'Aceptada') : ?>
                                            <a href="<?= base_url('Admin/admin_solicitudes/solicitudes_pendiente/' . $solicitud['IDSolicitud']) ?>" class="btn btn-sm btn-secondary"><i class="fas fa-hourglass-half"></i> Pendiente</a>
                                            <a href="<?= base_url('Admin/admin_solicitudes/solicitudes_rechazar/' . $solicitud['IDSolicitud']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Rechazar</a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container">
            <h1 class="mt-5 mb-4">Solicitudes de Donación RECHAZADA</h1>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="table-dark">
                            <th>ID</th>
                            <th>ID Receptor</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Descripción de la Necesidad</th>
                            <th>Prioridad</th>
                            <th>Fecha Límite de Entrega</th>
                            <th>Instrucciones de Entrega</th>
                            <th>Confirmación de Recepción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($solicitudesRechazada as $solicitud) : ?>
                            <tr>
                                <td><?= $solicitud['IDSolicitud'] ?></td>
                                <td><?= $solicitud['IDReceptor'] ?></td>
                                <td><?= $solicitud['FechaSolicitud'] ?></td>
                                <td><?= $solicitud['EstadoSolicitud'] ?></td>
                                <td><?= $solicitud['DescripcionNecesidad'] ?></td>
                                <td><?= $solicitud['Prioridad'] ?></td>
                                <td><?= $solicitud['FechaLimiteEntrega'] ?></td>
                                <td><?= $solicitud['InstruccionesEntrega'] ?></td>
                                <td><?= $solicitud['ConfirmacionRecepcion'] ? 'Sí' : 'No' ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?= base_url('Admin/admin_solicitudes/solicitudes_detalles/' . $solicitud['IDSolicitud']) ?>" class="btn btn-sm btn-primary"><i class="fas fa-info-circle"></i> Detalles</a>
                                        <?php if ($solicitud['EstadoSolicitud'] === 'Rechazada') : ?>
                                            <a href="<?= base_url('Admin/admin_solicitudes/solicitudes_aceptar/' . $solicitud['IDSolicitud']) ?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Aceptar</a>
                                            <a href="<?= base_url('Admin/admin_solicitudes/solicitudes_pendiente/' . $solicitud['IDSolicitud']) ?>" class="btn btn-sm btn-secondary"><i class="fas fa-hourglass-half"></i> Pendiente</a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>





    </main>

    <!-- Pie de página -->
    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>