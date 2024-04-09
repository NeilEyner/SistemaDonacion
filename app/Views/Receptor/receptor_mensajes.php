<!-- Voluntario/voluntario_mensajes_recibidos.php -->
<?php $session = session() ?>
<?= $this->include('Layouts/header.php'); ?>

<body class="">
    <!-- Barra de navegación -->
    <?= $this->include('Layouts/nav.php'); ?>

    <!-- Contenido principal -->
    <main>
        <div class="container">
            <h1><i class="bi bi-envelope-fill"></i> Mensajes Recibidos</h1>

            <?php if (!empty($mensajesrecibidos)) : ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Remitente</th>
                            <th>Asunto</th>
                            <th>Contenido</th>
                            <th>Fecha y Hora de Envío</th>
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
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#responderMensajeModal<?= $index ?>">Responder Mensaje</a>
                                </td>
                            </tr>
                            <!-- Modal para responder mensajes -->
                            <div class="modal fade" id="responderMensajeModal<?= $index ?>" tabindex="-1" aria-labelledby="responderMensajeModalLabel<?= $index ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="responderMensajeModalLabel<?= $index ?>">Responder Mensaje</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('Receptor/responder_mensajes/') . $mensaje['Remitente'] ?>" method="post">
                                                <input type="hidden" name="destino" id="destino">
                                                <div class="mb-3">
                                                    <label for="asunto" class="form-label">Asunto</label>
                                                    <input type="text" class="form-control" id="asunto" name="asunto" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="mensaje" class="form-label">Mensaje</label>
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
            <?php else : ?>
                <p class="alert alert-info"><i class="bi bi-info-circle"></i> No hay mensajes recibidos.</p>
            <?php endif; ?>


            <h1><i class="bi bi-envelope-open"></i> Mensajes Enviados</h1>

            <?php if (!empty($mensajesenviados)) : ?>
                <table class="table table-striped table-hover">
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
            <?php else : ?>
                <p class="alert alert-info"><i class="bi bi-info-circle"></i> No hay mensajes enviados.</p>
            <?php endif; ?>
        </div>
    </main>

    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>