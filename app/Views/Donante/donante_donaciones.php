<?php $session = session() ?>
<?= $this->include('Layouts/header.php'); ?>

<body class="">
    <!-- Barra de navegación -->
    <?= $this->include('Layouts/nav.php'); ?>

    <!-- Contenido principal -->
    <main>
        <div class="container">
            <h2>Historial de Donaciones</h2>

            <div class="row">
                <div class="col-md-12">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Buscar donaciones..." aria-label="Buscar donaciones">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php foreach ($donaciones as $donacion) : ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <?php if (isset($donacion['ImagenDonacion']) && !empty($donacion['ImagenDonacion'])) : ?>
                                <img src="<?= base_url('uploads/' . $donacion['ImagenDonacion']) ?>" class="card-img-top" alt="Imagen de donación">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $donacion['IDDonacion'] ?></h5>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-alt"></i> <?= $donacion['FechaDonacion'] ?>
                                    </small><br>
                                    <strong>Estado:</strong>
                                    <span class="badge bg-<?php
                                                            switch ($donacion['Estado']) {
                                                                case 'Pendiente':
                                                                    echo 'warning text-dark';
                                                                    break;
                                                                case 'Aceptada':
                                                                    echo 'success';
                                                                    break;
                                                                case 'Rechazada':
                                                                    echo 'danger';
                                                                    break;
                                                            }
                                                            ?>">
                                        <i class="fas fa-<?= strtolower($donacion['Estado']) ?>"></i>
                                        <?= $donacion['Estado'] ?>
                                    </span><br>
                                    <strong>Tipo:</strong> <?= $donacion['TipoDeDonacion'] ?>
                                </p>
                                <a href="#" class="btn btn-primary">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </main>

    <!-- Pie de página -->
    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>