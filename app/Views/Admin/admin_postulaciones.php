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
    <h1>Administración de Postulaciones</h1>
    <h1>Solicitudes de Postulaciones</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Voluntario</th>
                <th>Solicitud</th>
                <th>Fecha de Postulación</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($postulaciones as $postulacion): ?>
                <tr>
                <td><?php echo $postulacion['IDPostulacion']; ?></td>
                    <td><?php echo $postulacion['IDVoluntario']; ?></td>
                    <td><?php echo $postulacion['TipoOperacion']; ?></td>
                    <td><?php echo $postulacion['IDSolicitud']; ?></td>
                    <td><?php echo $postulacion['FechaPostulacion']; ?></td>
                    <td><?php echo $postulacion['EstadoPostulacion']; ?></td>
                    <td>
                        <?php if ($postulacion['EstadoPostulacion'] == 'Pendiente'): ?>
                            <a href="<?php echo base_url('admin/aceptar_postulacion/' . $postulacion['IDPostulacion']); ?>">Aceptar</a> |
                            <a href="<?php echo base_url('admin/rechazar_postulacion/' . $postulacion['IDPostulacion']); ?>">Rechazar</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>



    <h1>Postulaciones Aceptadas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Voluntario</th>
                <th>Solicitud</th>
                <th>Fecha de Postulación</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($postulacionesAceptada as $postulacion): ?>
                <tr>
                <td><?php echo $postulacion['IDPostulacion']; ?></td>
                    <td><?php echo $postulacion['IDVoluntario']; ?></td>
                    <td><?php echo $postulacion['TipoOperacion']; ?></td>
                    <td><?php echo $postulacion['IDSolicitud']; ?></td>
                    <td><?php echo $postulacion['FechaPostulacion']; ?></td>
                    <td><?php echo $postulacion['EstadoPostulacion']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>


    <h1>Postulaciones Rechazadas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Voluntario</th>
                <th>Solicitud</th>
                <th>Fecha de Postulación</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($postulacionesRechazada as $postulacion): ?>
                <tr>
                <td><?php echo $postulacion['IDPostulacion']; ?></td>
                    <td><?php echo $postulacion['IDVoluntario']; ?></td>
                    <td><?php echo $postulacion['TipoOperacion']; ?></td>
                    <td><?php echo $postulacion['IDSolicitud']; ?></td>
                    <td><?php echo $postulacion['FechaPostulacion']; ?></td>
                    <td><?php echo $postulacion['EstadoPostulacion']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>


    </main>

    <!-- Pie de página -->
    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>