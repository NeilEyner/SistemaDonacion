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
            <h1>Donaciones Pendientes</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Donante</th>
                        <th>FechaDonación</th>
                        <th>Estado</th>
                        <th>Tipo de Donación</th>
                        <th>ID Solicitud</th>
                        <th>Estado de Donación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donacionesPendientes as $donacion) : ?>
                        <tr>
                            <td><?= $donacion['IDDonacion'] ?></td>
                            <td><?= $donacion['IDDonante'] ?></td>
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
                            <td><?= $donacion['IDSolicitud'] ?></td>
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
                            <td>
                                <a href="<?= base_url('Admin/admin_donaciones/detalles/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-primary" title="Detalles"><i class="fas fa-info-circle"></i> Detalles</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>



        <div class="container">
            <h1>Donaciones Entregadas</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>IDDonante</th>
                        <th>FechaDonacion</th>
                        <th>Estado</th>
                        <th>TipoDeDonacion</th>
                        <th>IDSolicitud</th>
                        <th>EstadoDonacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donacionesEntregadas as $donacion) : ?>
                        <tr>
                            <td><?= $donacion['IDDonacion'] ?></td>
                            <td><?= $donacion['IDDonante'] ?></td>
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
                            <td><?= $donacion['IDSolicitud'] ?></td>
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
                            <td>
                                <a href="<?= base_url('Admin/admin_donaciones/detalles/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-primary" title="Detalles"><i class="fas fa-info-circle"></i> Detalles</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="container">
            <h1>Donaciones Canceladas</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>IDDonante</th>
                        <th>FechaDonacion</th>
                        <th>Estado</th>
                        <th>TipoDeDonacion</th>
                        <th>IDSolicitud</th>
                        <th>EstadoDonacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donacionesCanceladas as $donacion) : ?>
                        <tr>
                            <td><?= $donacion['IDDonacion'] ?></td>
                            <td><?= $donacion['IDDonante'] ?></td>
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
                            <td><?= $donacion['IDSolicitud'] ?></td>
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
                            <td>
                                <a href="<?= base_url('Admin/admin_donaciones/detalles/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-primary" title="Detalles"><i class="fas fa-info-circle"></i> Detalles</a>
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