<?php $session = session() ?>
<?= $this->include('dashboard/d_header.php'); ?>

<div id="content">
    <div class="container-fluid mt-5">
        <!-- Información del receptor -->
        <section class="receptor-info">
            <h1 class="text-center mb-4"><i class="bi bi-person-circle-fillr"></i> DASHBOARD RECEPTOR</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Bienvenido, <?= $receptor['Nombre'] ?></h6>
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

        <div class="row">
            <div class="col-lg-8">
                <!-- Solicitudes de donación -->
                <section class="donation-requests">
                    <h2 class="text-center mb-4"><i class="bi bi-hand-heart-fill text-primary"></i> Solicitudes de Donación</h2>
                    <div class="row">
                        <?php foreach ($solicitudes as $solicitud) : ?>
                            <div class="col-lg-4">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <h4 class="card-title text-center"><?= $solicitud['DescripcionNecesidad'] ?></h4>
                                        <p class="card-text text-center">Fecha de Solicitud: <?= $solicitud['FechaSolicitud'] ?></p>
                                        <p class="card-text text-center">Estado: <span class="badge bg-warning text-dark"><?= $solicitud['EstadoSolicitud'] ?></span></p>
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
                    <div class="card-header py-3 bg-success">
                        <h5 class="m-0 font-weight-bold text-white"><i class="bi bi-chat-dots-fill"></i> Mensajes</h5>
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
</div>

<!-- Pie de página -->
<?= $this->include('dashboard/d_footer.php'); ?>