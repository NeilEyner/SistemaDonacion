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
            <h1 class="mt-5 mb-4">Administración de Postulaciones</h1>
            <h2>Solicitudes de Postulaciones</h2>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Voluntario</th>
                            <th>Tipo de Operación</th>
                            <th>ID Solicitud</th>
                            <th>Fecha de Postulación</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($postulaciones as $postulacion) : ?>
                            <tr>
                                <td><?php echo $postulacion['IDPostulacion']; ?></td>
                                <td><?php echo $postulacion['IDVoluntario']; ?></td>
                                <td><?php echo $postulacion['TipoOperacion']; ?></td>
                                <td><?php echo $postulacion['IDSolicitud']; ?></td>
                                <td><?php echo $postulacion['FechaPostulacion']; ?></td>
                                <td><?php echo $postulacion['EstadoPostulacion']; ?></td>
                                <td>
                                    <?php if ($postulacion['EstadoPostulacion'] == 'Pendiente') : ?>
                                        <a href="<?php echo base_url('Admin/admin_postulacion/aceptar_postulacion/' . $postulacion['IDPostulacion']); ?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Aceptar</a>
                                        <a href="<?php echo base_url('Admin/admin_postulacion/rechazar_postulacion/' . $postulacion['IDPostulacion']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Rechazar</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>


        <div class="container">
            <h1 class="mt-5 mb-4">Postulaciones Aceptadas</h1>
                <table class="table ">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Voluntario</th>
                            <th>Tipo de Operación</th>
                            <th>ID Solicitud</th>
                            <th>Fecha de Postulación</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($postulacionesAceptada as $postulacion) : ?>
                            <tr>
                                <td><?php echo $postulacion['IDPostulacion']; ?></td>
                                <td><?php echo $postulacion['IDVoluntario']; ?></td>
                                <td><?php echo $postulacion['TipoOperacion']; ?></td>
                                <td><?php echo $postulacion['IDSolicitud']; ?></td>
                                <td><?php echo $postulacion['FechaPostulacion']; ?></td>
                                <td><?php echo $postulacion['EstadoPostulacion']; ?></td>
                                <td>
                                    <?php if ($postulacion['EstadoPostulacion'] == 'Aceptada') : ?>
                                        <a href="<?php echo base_url('Admin/admin_postulacion/rechazar_postulacion/' . $postulacion['IDPostulacion']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Rechazar</a>
                                        <a href="<?php echo base_url('Admin/admin_postulacion/pendiente_postulacion/' . $postulacion['IDPostulacion']); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-hourglass-half"></i> Pendiente</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
       
        </div>



        <div class="container">
            <h1 class="mt-5 mb-4">Postulaciones Rechazadas</h1>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Voluntario</th>
                            <th>Tipo de Operación</th>
                            <th>ID Solicitud</th>
                            <th>Fecha de Postulación</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($postulacionesRechazada as $postulacion) : ?>
                            <tr>
                                <td><?php echo $postulacion['IDPostulacion']; ?></td>
                                <td><?php echo $postulacion['IDVoluntario']; ?></td>
                                <td><?php echo $postulacion['TipoOperacion']; ?></td>
                                <td><?php echo $postulacion['IDSolicitud']; ?></td>
                                <td><?php echo $postulacion['FechaPostulacion']; ?></td>
                                <td><?php echo $postulacion['EstadoPostulacion']; ?></td>
                                <td>
                                    <?php if ($postulacion['EstadoPostulacion'] == 'Rechazada') : ?>
                                        <a href="<?php echo base_url('Admin/admin_postulacion/aceptar_postulacion/' . $postulacion['IDPostulacion']); ?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Aceptar</a>
                                        <a href="<?php echo base_url('Admin/admin_postulacion/pendiente_postulacion/' . $postulacion['IDPostulacion']); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-hourglass-half"></i> Pendiente</a>
                                    <?php endif; ?>
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