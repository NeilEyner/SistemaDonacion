<?php
$session = session()
?>
<?= $this->include('Layouts/header.php'); ?>
<body class="">
    <?= $this->include('Layouts/nav.php'); ?>
    <main>
        
        <h1>Bienvenido al Panel de Control del Voluntario</h1>
        <!-- Mostrar las solicitudes de donación pendientes -->
        <h2>Solicitudes de Donación Pendientes</h2>
        <?php if (empty($solicitudes_pendientes)) : ?>
            <p>No hay solicitudes de donación pendientes en este momento.</p>
        <?php else : ?>
            <ul>
                <?php foreach ($solicitudes_pendientes as $solicitud) : ?>
                    <li><?= $solicitud->DescripcionNecesidad?>---<?= $solicitud->FechaSolicitud?>---<?= $solicitud->EstadoSolicitud?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <!-- Mostrar las últimas participaciones en donaciones -->
        <h2>Últimas Participaciones en Donaciones</h2>
        <?php if (empty($ultimas_participaciones)) : ?>
            <p>No hay participaciones en donaciones recientes.</p>
        <?php else : ?>
            <ul>
                <?php foreach ($ultimas_participaciones as $participacion) : ?>
                    <li><?= $participacion['FechaHora'] ?> - <?= $participacion['TipoOperacion'] ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

    </main>
    <?= $this->include('Layouts/footer.php'); ?>
</body>
</html>