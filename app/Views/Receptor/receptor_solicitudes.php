<?php $session = session() ?>
<?= $this->include('dashboard/d_header.php'); ?>


   
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Listado de Solicitudes de Donación</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Solicitudes</h6>
            <a href="<?= site_url('Forms/_form_solicitud') ?>" class="btn btn-primary">Solicitar Donación</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <!-- <th>Receptor</th> -->
                            <th>Fecha de Solicitud</th>
                            <th>Estado</th>
                            <!-- <th>Cantidad</th> -->
                            <th>Descripción Necesidad</th>
                            <th>Prioridad</th>
                            <!-- <th>Fecha Límite Entrega</th> -->
                            <th>Instrucciones Entrega</th>
                            <!-- <th>Confirmación Recepción</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($solicitudes_aceptada as $solicitud): ?>
                            <tr>
                                <!-- <td><?= $solicitud['IDSolicitud'] ?></td> -->
                                <!-- <td><?= $solicitud['IDReceptor'] ?></td> -->
                                <td><?= $solicitud['FechaSolicitud'] ?></td>
                                <td><?= $solicitud['EstadoSolicitud'] ?></td>
                                <!-- <td><?= $solicitud['Cantidad'] ?></td> -->
                                <td><?= $solicitud['DescripcionNecesidad'] ?></td>
                                <td><?= $solicitud['Prioridad'] ?></td>
                                <!-- <td><?= $solicitud['FechaLimiteEntrega'] ?></td> -->
                                <td><?= $solicitud['InstruccionesEntrega'] ?></td>
                                <!-- <td><?= $solicitud['ConfirmacionRecepcion']?></td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Pie de página -->
<?= $this->include('dashboard/d_footer.php'); ?>