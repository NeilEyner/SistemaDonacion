<?php $session = session() ?>
<?= $this->include('dashboard/d_header.php'); ?>


<!-- Contenido principal -->
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Registro Donaciones</h1>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th>Donante</th>
                                    <th>FechaDonación</th>
                                    <th>Estado</th>
                                    <th>Tipo de Donación</th>
                                    <th>Solicitud</th>
                                    <th>Estado Entrega</th>
                                    <!-- <th>Acciones</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($donaciones as $donacion) : ?>
                                    <tr>
                                        <!-- <td><?= $donacion['IDDonacion'] ?></td> -->
                                        <td>
                                            <?php foreach ($donantes as $donante) :
                                                if ($donante['IDDonante'] == $donacion['IDDonante']) {
                                                    echo $donante['Nombre'];
                                                }
                                            endforeach; ?>
                                        </td>
                                        <td><?= $donacion['FechaDonacion'] ?></td>
                                        <td><?= $donacion['Estado'] ?>
                                            <?php if ($donacion['Estado'] === 'Pendiente') : ?>
                                                <a href="<?= base_url('Admin/admin_donaciones/aceptar/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i> </a>
                                                <a href="<?= base_url('Admin/admin_donaciones/rechazar/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> </a>
                                            <?php endif; ?>
                                            <?php if ($donacion['Estado'] === 'Aceptada') : ?>
                                                <a href="<?= base_url('Admin/admin_donaciones/pendientes/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-secondary"><i class="fas fa-hourglass-half"></i> </a>
                                                <a href="<?= base_url('Admin/admin_donaciones/rechazar/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> </a>
                                            <?php endif; ?>
                                            <?php if ($donacion['Estado'] === 'Rechazada') : ?>
                                                <a href="<?= base_url('Admin/admin_donaciones/aceptar/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i> </a>
                                                <a href="<?= base_url('Admin/admin_donaciones/pendientes/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-secondary"><i class="fas fa-hourglass-half"></i> </a>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $donacion['TipoDeDonacion'] ?></td>
                                        <td><?php
                                            foreach ($solicitudes as $solicitud) :
                                                if ($solicitud['IDSolicitud'] == $donacion['IDSolicitud']) :
                                                    echo $solicitud['DescripcionNecesidad'];
                                                endif;
                                            endforeach;
                                            ?>
                                        </td>
                                        <td><?= $donacion['EstadoDonacion'] ?>
                                            <?php if ($donacion['EstadoDonacion'] === 'Pendiente') : ?>
                                                <a href="<?= base_url('Admin/admin_donaciones/entregada/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i> </a>
                                                <a href="<?= base_url('Admin/admin_donaciones/cancelada/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> </a>
                                            <?php endif; ?>
                                            <?php if ($donacion['EstadoDonacion'] === 'Cancelada') : ?>
                                                <a href="<?= base_url('Admin/admin_donaciones/entregada/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i> </a>
                                                <a href="<?= base_url('Admin/admin_donaciones/pendiente/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-secondary"><i class="fas fa-hourglass-half"></i> </a>
                                            <?php endif; ?>
                                            <?php if ($donacion['EstadoDonacion'] === 'Entregada') : ?>
                                                <a href="<?= base_url('Admin/admin_donaciones/pendiente/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-secondary"><i class="fas fa-hourglass-half"></i> </a>
                                                <a href="<?= base_url('Admin/admin_donaciones/cancelada/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> </a>
                                            <?php endif; ?>
                                        </td>
                                        <!-- <td>
                                            <a href="<?= base_url('Admin/admin_donaciones/detalles/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-primary" title="Detalles"><i class="fas fa-info-circle"></i> Detalles</a>
                                        </td> -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Pie de página -->
<?= $this->include('dashboard/d_footer.php'); ?>