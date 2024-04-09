<?php
$session = session()
?>
<?= $this->include('Layouts/header.php'); ?>

<body class="">
    <?= $this->include('Layouts/nav.php'); ?>
    <main>

        <div class="container">
            <h1 class="mt-5 mb-4">Bienvenido al Panel de Control del Voluntario</h1>

            <!-- Mostrar las solicitudes de donación pendientes -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Solicitudes de Donación </h2>
                </div>
                <div class="card-body">
                    <?php if (empty($solicitudes_aceptada)) : ?>
                        <p>No hay solicitudes de donación pendientes en este momento.</p>
                    <?php else : ?>
                        <div class="list-group">
                            <?php foreach ($solicitudes_aceptada as $solicitud) : ?>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?= $solicitud['DescripcionNecesidad'] ?></h5>
                                        <small><?= $solicitud['FechaSolicitud'] ?></small>
                                    </div>
                                    <p class="mb-1"><?= $solicitud['EstadoSolicitud'] ?></p>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Mostrar las últimas participaciones en donaciones -->
            <div class="card mt-4">
                <div class="card-header">
                    <h2 class="card-title">Últimas Participaciones en Donaciones</h2>
                </div>
                <div class="card-body">
                    <?php if (empty($ultimas_participaciones)) : ?>
                        <p>No hay participaciones en donaciones recientes.</p>
                    <?php else : ?>
                        <div class="list-group">
                            <?php foreach ($ultimas_participaciones as $participacion) : ?>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?= $participacion['TipoOperacion'] ?></h5>
                                        <h5 class="mb-1"><?= $participacion['ConformidadEntrega'] ?></h5>
                                        
                                        <small><?= $participacion['FechaHora'] ?></small>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>



    </main>
    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>