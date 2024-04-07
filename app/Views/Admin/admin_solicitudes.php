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
            <h1>Solicitudes de Donación</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>IDReceptor</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>DescripcionNecesidad</th>
                        <th>Prioridad</th>
                        <th>FechaLimiteEntrega</th>
                        <th>InstruccionesEntrega</th>
                        <th>ConfirmacionRecepcion</th>
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
                            <td><?= $solicitud['ConfirmacionRecepcion'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/solicitudes/detalles/' . $solicitud['IDSolicitud']) ?>" class="btn btn-sm btn-primary">Detalles</a>
                                <a href="<?= base_url('admin/solicitudes/aceptar/' . $solicitud['IDSolicitud']) ?>" class="btn btn-sm btn-success">Aceptar</a>
                                <a href="<?= base_url('admin/solicitudes/rechazar/' . $solicitud['IDSolicitud']) ?>" class="btn btn-sm btn-danger">Rechazar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


            <!-- Pie de página -->
            <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>