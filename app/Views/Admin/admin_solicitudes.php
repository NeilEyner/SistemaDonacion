<?php $session = session() ?>
<?= $this->include('dashboard/d_header.php'); ?>



<!-- Solicitudes de Donación -->
<div class="container-fluid">

    <!-- Solicitudes Pendientes -->
    <h1 class="h3 mb-4 text-gray-800">Solicitudes de Donación</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Solicitudes Pendientes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <!-- Table Headings -->
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>ID Receptor</th>
                            <th>Fecha Solicitud</th>
                           
                            <th>Descripción de la Necesidad</th>
                            <th>Prioridad</th>
                            <th>Límite de Entrega</th>
                            <!-- <th>Instrucciones de Entrega</th> -->
                            <!-- <th>Confirmación de Recepción</th> -->
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        <?php foreach ($solicitudes as $solicitud) : ?>
                            <tr>
                                <!-- <td><?= $solicitud['IDSolicitud'] ?></td> -->
                                <td><?= $solicitud['IDReceptor'] ?></td>
                                <td><?= $solicitud['FechaSolicitud'] ?></td>
                               
                                <td><?= $solicitud['DescripcionNecesidad'] ?></td>
                                <td><?= $solicitud['Prioridad'] ?></td>
                                <td><?= $solicitud['FechaLimiteEntrega'] ?></td>
                                <!-- <td><?= $solicitud['InstruccionesEntrega'] ?></td> -->
                                <!-- <td><?= $solicitud['ConfirmacionRecepcion'] ? 'Sí' : 'No' ?></td> -->
                                <td><?= $solicitud['EstadoSolicitud'] ?></td>
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
    </div>

    <!-- Solicitudes Aceptadas -->
    <h1 class="h3 mb-4 text-gray-800">Solicitudes de Donación Aceptadas</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Solicitudes Aceptadas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <!-- Table Headings -->
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>ID Receptor</th>
                            <th>Fecha Solicitud</th>
                           
                            <th>Descripción de la Necesidad</th>
                            <th>Prioridad</th>
                            <th>Límite de Entrega</th>
                            <!-- <th>Instrucciones de Entrega</th> -->
                            <!-- <th>Confirmación de Recepción</th> -->
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        <?php foreach ($solicitudesAceptada as $solicitud) : ?>
                            <tr>
                                <!-- <td><?= $solicitud['IDSolicitud'] ?></td> -->
                                <td><?= $solicitud['IDReceptor'] ?></td>
                                <td><?= $solicitud['FechaSolicitud'] ?></td>
                               
                                <td><?= $solicitud['DescripcionNecesidad'] ?></td>
                                <td><?= $solicitud['Prioridad'] ?></td>
                                <td><?= $solicitud['FechaLimiteEntrega'] ?></td>
                                <!-- <td><?= $solicitud['InstruccionesEntrega'] ?></td> -->
                                <!-- <td><?= $solicitud['ConfirmacionRecepcion'] ? 'Sí' : 'No' ?></td> -->
                                <td><?= $solicitud['EstadoSolicitud'] ?></td>
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
    </div>

    <!-- Solicitudes Rechazadas -->
    <h1 class="h3 mb-4 text-gray-800">Solicitudes de Donación Rechazadas</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Solicitudes Rechazadas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <!-- Table Headings -->
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>ID Receptor</th>
                            <th>Fecha Solicitud</th>
                           
                            <th>Descripción de la Necesidad</th>
                            <th>Prioridad</th>
                            <th>Límite de Entrega</th>
                            <!-- <th>Instrucciones de Entrega</th> -->
                            <!-- <th>Confirmación de Recepción</th> -->
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        <?php foreach ($solicitudesRechazada as $solicitud) : ?>
                            <tr>
                                <!-- <td><?= $solicitud['IDSolicitud'] ?></td> -->
                                <td><?= $solicitud['IDReceptor'] ?></td>
                                <td><?= $solicitud['FechaSolicitud'] ?></td>
                               
                                <td><?= $solicitud['DescripcionNecesidad'] ?></td>
                                <td><?= $solicitud['Prioridad'] ?></td>
                                <td><?= $solicitud['FechaLimiteEntrega'] ?></td>
                                <!-- <td><?= $solicitud['InstruccionesEntrega'] ?></td> -->
                                <!-- <td><?= $solicitud['ConfirmacionRecepcion'] ? 'Sí' : 'No' ?></td> -->
                                <td><?= $solicitud['EstadoSolicitud'] ?></td>
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
    </div>

</div>
<!-- /.container-fluid -->


<!-- Pie de página -->
<?= $this->include('dashboard/d_footer.php'); ?>