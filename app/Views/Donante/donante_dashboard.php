<?php $session = session() ?>
<?= $this->include('dashboard/d_header.php'); ?>

    <!-- Contenido principal -->
    <main>
        <br>
        <div class="container">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Resumen de donaciones <i class="bi bi-bar-chart"></i></h5>
                            <ul class="list-group">
                                <?php foreach ($donationsSummary as $summary) : ?>
                                    <li class="list-group-item"><?= $summary['TipoDeDonacion'] ?>: <?= $summary['total'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Donaciones pendientes <i class="bi bi-clock"></i></h5>
                            <ul class="list-group">
                                <?php foreach ($donationsPending as $donation) : ?>
                                    <li class="list-group-item"><?= $donation['FechaDonacion'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Historial de donaciones <i class="bi bi-archive"></i></h5>
                            <ul class="list-group">
                                <?php foreach ($donationHistory as $donation) : ?>
                                    <li class="list-group-item"><?= $donation['FechaDonacion'] ?> - <?= $donation['EstadoDonacion'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Mensajes <i class="bi bi-chat-dots"></i></h5>
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
    <?= $this->include('dashboard/d_footer.php'); ?>
