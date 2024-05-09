<?php $session = session() ?>
<?= $this->include('dashboard/d_header.php'); ?>


<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800"><i class="bi bi-envelope-fill"></i> Mensajes Recibidos</h1>

            <?php if (!empty($mensajesrecibidos)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Remitente</th>
                                <th>Asunto</th>
                                <th>Contenido</th>
                                <th>Fecha y Hora de Envío</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mensajesrecibidos as $index => $mensaje) : ?>
                                <tr>
                                    <td><?= $mensaje['Remitente'] ?></td>
                                    <td><?= $mensaje['Asunto'] ?></td>
                                    <td><?= $mensaje['Contenido'] ?></td>
                                    <td><?= $mensaje['FechaHoraEnvio'] ?></td>
                                    <td>
                                        <!-- Botón para abrir el modal de responder mensaje -->
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#responderMensajeModal<?= $index ?>">Responder</button>
                                    </td>
                                </tr>
                                <!-- Modal para responder mensajes -->
                                <div class="modal fade" id="responderMensajeModal<?= $index ?>" tabindex="-1" aria-labelledby="responderMensajeModalLabel<?= $index ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="responderMensajeModalLabel<?= $index ?>">Responder Mensaje</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('Voluntario/responder_mensajes/') . $mensaje['Remitente'] ?>" method="post">
                                                    <input type="hidden" name="destino" id="destino">
                                                    <div class="form-group">
                                                        <label for="asunto">Asunto</label>
                                                        <input type="text" class="form-control" id="asunto" name="asunto" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mensaje">Mensaje</label>
                                                        <textarea class="form-control" id="mensaje" name="mensaje" rows="3" required></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <p class="alert alert-info"><i class="bi bi-info-circle"></i> No hay mensajes recibidos.</p>
            <?php endif; ?>

            <h1 class="h3 mb-4 text-gray-800"><i class="bi bi-envelope-open"></i> Mensajes Enviados</h1>

            <?php if (!empty($mensajesenviados)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Destinatario</th>
                                <th>Asunto</th>
                                <th>Contenido</th>
                                <th>Fecha y Hora de Envío</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mensajesenviados as $mensaje) : ?>
                                <tr>
                                    <td><?= $mensaje['Destinatario'] ?></td>
                                    <td><?= $mensaje['Asunto'] ?></td>
                                    <td><?= $mensaje['Contenido'] ?></td>
                                    <td><?= $mensaje['FechaHoraEnvio'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <p class="alert alert-info"><i class="bi bi-info-circle"></i> No hay mensajes enviados.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Pie de página -->
<?= $this->include('dashboard/d_footer.php'); ?>