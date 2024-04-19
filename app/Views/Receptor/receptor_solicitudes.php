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
    <h1>Listado de Solicitudes de Donación</h1>
        <a href="<?= site_url('Forms/_form_solicitud') ?>" class="btn btn-primary">Solicitar Donación</a>
        <h1>Listado de Solicitudes de Donación</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Receptor</th>
                    <th>Fecha de Solicitud</th>
                    <th>Estado</th>
                    <th>Cantidad</th>
                    <th>Descripción Necesidad</th>
                    <th>Prioridad</th>
                    <th>Fecha Límite Entrega</th>
                    <th>Instrucciones Entrega</th>
                    <th>Confirmación Recepción</th>
                    <!-- Agrega más encabezados aquí según tus necesidades -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($solicitudes_aceptada as $solicitud): ?>
                    <tr>
                        <td><?= $solicitud['IDSolicitud'] ?></td>
                        <td><?= $solicitud['IDReceptor'] ?></td>
                        <td><?= $solicitud['FechaSolicitud'] ?></td>
                        <td><?= $solicitud['EstadoSolicitud'] ?></td>
                        <td><?= $solicitud['Cantidad'] ?></td>
                        <td><?= $solicitud['DescripcionNecesidad'] ?></td>
                        <td><?= $solicitud['Prioridad'] ?></td>
                        <td><?= $solicitud['FechaLimiteEntrega'] ?></td>
                        <td><?= $solicitud['InstruccionesEntrega'] ?></td>
                        <td><?= $solicitud['ConfirmacionRecepcion']?></td>
                        <!-- Agrega más columnas aquí según tus necesidades -->
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