<?php $session = session() ?>
<?= $this->include('Layouts/header.php'); ?>

<body class="">
    <!-- Barra de navegación -->
    <?= $this->include('Layouts/nav.php'); ?>

    <!-- Contenido principal -->
    <main>

        <BR></BR>
        <div class="container">
            <div class="card border-primary mb-4">
                <div class="card-header bg-primary text-white">
                    <h2 class="card-title mb-0">Solicitudes de Donación</h2>
                </div>
                <div class="card-body">
                    <?php if (empty($solicitudes_aceptada)) : ?>
                        <p class="text-muted">No hay solicitudes de donación pendientes en este momento.</p>
                    <?php else : ?>
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <?php foreach ($solicitudes_aceptada as $solicitud) : ?>
                                <?php if (!in_array($solicitud['IDSolicitud'], array_column($donaciones, 'IDSolicitud'))) : ?>
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $solicitud['DescripcionNecesidad'] ?></h5>
                                                <p class="card-text"> <?= $solicitud['IDSolicitud'] ?> : Fecha de Solicitud: <?= $solicitud['FechaSolicitud'] ?></p>
                                            </div>
                                            <div class="card-footer">
                                                <a href="<?= base_url('Donante/donante_solicitudes/donarSol/' . $solicitud['IDSolicitud']) ?>" class="btn btn-primary"><i class="fas fa-truck me-1"></i> Donar</a>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        




    </main>

    <!-- Pie de página -->
    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>