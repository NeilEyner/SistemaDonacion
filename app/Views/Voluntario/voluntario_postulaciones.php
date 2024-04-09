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
                                <?php if (!in_array($solicitud['IDSolicitud'], array_column($postulaciones, 'IDSolicitud'))) : ?>
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $solicitud['DescripcionNecesidad'] ?></h5>
                                                <p class="card-text"> <?= $solicitud['IDSolicitud'] ?> : Fecha de Solicitud: <?= $solicitud['FechaSolicitud'] ?></p>
                                            </div>
                                            <div class="card-footer">
                                                <a href="<?= base_url('Voluntario/voluntario_postulacion/postular_recojo/' . $solicitud['IDSolicitud']) ?>" class="btn btn-primary"><i class="fas fa-truck me-1"></i> Postular Recojo</a>
                                                <a href="<?= base_url('Voluntario/voluntario_postulacion/postular_entrega/' . $solicitud['IDSolicitud']) ?>" class="btn btn-danger"><i class="fas fa-box me-1"></i> Postular Entrega</a>
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


        <div class="container">
            <div class="card border-primary mb-4">
                <div class="card-header bg-primary text-white">
                    <h2 class="card-title mb-0">Postulaciones</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>

                                    <th>Tipo de Operación</th>
                                    <th>ID Solicitud</th>
                                    <th>Fecha de Postulación</th>
                                    <th>Estado de Postulación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($postulaciones as $postulacion) : ?>
                                    <tr>
                                        <td><?= $postulacion['IDPostulacion'] ?></td>

                                        <td><?= $postulacion['TipoOperacion'] ?></td>
                                        <td><?= $postulacion['IDSolicitud'] ?></td>
                                        <td><?= $postulacion['FechaPostulacion'] ?></td>
                                        <td>
                                            <?php
                                            $estado = $postulacion['EstadoPostulacion'];
                                            $btn_color = '';
                                            switch ($estado) {
                                                case 'Aceptada':
                                                    $btn_color = 'btn-success';
                                                    break;
                                                case 'Rechazada':
                                                    $btn_color = 'btn-danger';
                                                    break;
                                                case 'Pendiente':
                                                    $btn_color = 'btn-warning';
                                                    break;
                                                default:
                                                    $btn_color = 'btn-secondary';
                                                    break;
                                            }
                                            ?>
                                            <button type="button" class="btn <?= $btn_color ?> btn-sm" disabled><?= $estado ?></button>
                                        </td>
                                        <td>
                                            <?php if ($estado === 'Aceptada') : ?>
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#mensajeModal<?= $postulacion['IDPostulacion'] ?>">
                                                    Enviar Mensaje
                                                </button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php foreach ($postulaciones as $postulacion) : ?>
            <?php if ($postulacion['EstadoPostulacion'] === 'Aceptada') : ?>
                <!-- Modal para enviar mensaje -->
                <div class="modal fade" id="mensajeModal<?= $postulacion['IDPostulacion'] ?>" tabindex="-1" aria-labelledby="mensajeModalLabel<?= $postulacion['IDPostulacion'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mensajeModalLabel<?= $postulacion['IDPostulacion'] ?>">Enviar Mensaje</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('Voluntario/voluntario_postulacion/mandar_mensaje/' . $postulacion['IDPostulacion']) ?>" method="post">
                                    <div class="mb-3">
                                        <label for="asunto<?= $postulacion['IDPostulacion'] ?>" class="form-label">Asunto</label>
                                        <input type="text" class="form-control" id="asunto<?= $postulacion['IDPostulacion'] ?>" name="asunto" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mensaje<?= $postulacion['IDPostulacion'] ?>" class="form-label">Mensaje</label>
                                        <textarea class="form-control" id="mensaje<?= $postulacion['IDPostulacion'] ?>" name="mensaje" rows="3" required></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i> Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
        <?php endforeach; ?>



    </main>

    <!-- Pie de página -->
    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>