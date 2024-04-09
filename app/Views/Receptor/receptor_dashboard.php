<?php $session = session() ?>
<?= $this->include('Layouts/header.php'); ?>

<body class="">
    <!-- Barra de navegación -->
    <?= $this->include('Layouts/nav.php'); ?>

    <!-- Contenido principal -->
    <main>
        <div class="container mt-5">
            <!-- Información del receptor -->
            <section class="receptor-info py-5">
                <h1 class="text-center mb-4"><i class="bi bi-person-circle text-danger"></i> DASHBOARD RECEPTOR</h1>
                <div class="card border-0 shadow">
                    <div class="card-header bg-danger text-white">
                        <h2 class="card-title">Bienvenido, <?= $receptor['Nombre'] ?></h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><i class="bi bi-envelope"></i> Correo Electrónico: <?= $receptor['CorreoElectronico'] ?></li>
                            <li><i class="bi bi-house"></i> Dirección: <?= $receptor['Direccion'] ?></li>
                            <li><i class="bi bi-geo-alt"></i> Ciudad: <?= $receptor['Ciudad'] ?></li>
                            <li><i class="bi bi-phone"></i> Número de Teléfono: <?= $receptor['NumeroTelefono'] ?></li>
                            <li><i class="bi bi-globe"></i> Sitio Web: <?= $receptor['SitioWeb'] ?></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Solicitudes de donación -->
                    <section class="donation-requests py-5">
                        <h2 class="text-center mb-4"><i class="bi bi-hand-heart text-primary"></i> Solicitudes de Donación</h2>
                        <div class="row justify-content-center">
                            <?php foreach ($solicitudes as $solicitud) : ?>
                                <div class="col-lg-4">
                                    <div class="card border-0 shadow mb-4" style="background-color: rgba(255, 255, 255, 0.7);">
                                        <div class="card-body">
                                            <h4 class="card-title text-center"><?= $solicitud['DescripcionNecesidad'] ?></h4>
                                            <p class="card-text text-center">Fecha de Solicitud: <?= $solicitud['FechaSolicitud'] ?></p>
                                            <p class="card-text text-center">Estado:
                                                <span class="badge bg-warning"><?= $solicitud['EstadoSolicitud'] ?></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <!-- Mensajes -->
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="card-title"><i class="bi bi-chat-dots text-light"></i> Mensajes</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <?php foreach ($messages as $message) : ?>
                                    <li class="list-group-item"><?= $message['Asunto'] ?> - <?= $message['FechaHoraEnvio'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>

    <!-- Pie de página -->
    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>