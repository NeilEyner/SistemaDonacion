<?php $session = session() ?>
<?= $this->include('Layouts/header.php'); ?>

<body class="">
    <!-- Barra de navegación -->
    <?= $this->include('Layouts/nav.php'); ?>

    <!-- Contenido principal -->
    <main>

        <div class="container my-5">
            <h1 class="text-center mb-4">Postulaciones</h1>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php foreach ($postulaciones as $postulacion) : ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <i class="bi bi-person-circle"></i> Voluntario ID: <?php echo $postulacion['IDVoluntario']; ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Solicitud ID: <?php echo $postulacion['IDSolicitud']; ?></h5>
                                <p class="card-text">
                                    <i class="bi bi-<?php echo ($postulacion['TipoOperacion'] == 'Recojo') ? 'truck text-success' : 'arrow-down-right text-danger'; ?>"></i> <?php echo $postulacion['TipoOperacion']; ?><br>
                                    <i class="bi bi-calendar-event"></i> <?php echo $postulacion['FechaPostulacion']; ?><br>
                                    Estado: <span class="text-<?php echo ($postulacion['EstadoPostulacion'] == 'Pendiente') ? 'warning' : (($postulacion['EstadoPostulacion'] == 'Aceptada') ? 'success' : 'danger'); ?>"><?php echo $postulacion['EstadoPostulacion']; ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>



        <div class="container my-5">
            <h1 class="text-center mb-4">Participación Recojidas Voluntario</h1>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php foreach ($participaciones as $participacion) : ?>
                    <?php if (($participacion['TipoOperacion'] == 'Recojo'  and $participacion['EstadoParticipacion'] == 'Aceptada'  and $participacion['ConformidadEntrega'] != 'Satisfactoria') and ($participacion['ConformidadRecojo'] != 'Satisfactoria')) : ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <i class="bi bi-person-circle"></i>
                                    <?php echo $Vol['ExperienciaLaboral'] . ', ' . $Vol['Habilidades']; ?>

                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php
                                        $donacion = null;
                                        foreach ($donaciones as $don) {
                                            if ($don['IDDonacion'] == $participacion['IDDonacion']) {
                                                $donacion = $don;
                                                break;
                                            }
                                        }
                                        echo $donacion['TipoDeDonacion'] . ': ' . $donacion['Estado'];
                                        ?>
                                    </h5>
                                    <p class="card-text">
                                        <i class="bi bi-<?php echo ($participacion['TipoOperacion'] == 'Recojo') ? 'truck text-success' : 'arrow-down-right text-danger'; ?>"></i> <?php echo $participacion['TipoOperacion']; ?><br>
                                        <i class="bi bi-calendar-event"></i> <?php echo $participacion['FechaHora']; ?><br>
                                        <i class="bi bi-people"></i> <?php echo $participacion['CantidadColaboradores']; ?> colaboradores<br>
                                        <!-- <i class="bi bi-check-circle <?php echo ($participacion['ConformidadEntrega'] == 'Satisfactoria') ? 'text-success' : (($participacion['ConformidadEntrega'] == 'Insatisfactoria') ? 'text-danger' : 'text-warning'); ?>"></i> <?php echo $participacion['ConformidadEntrega']; ?><br> -->
                                        <i class="bi bi-clipboard <?php echo ($participacion['EstadoParticipacion'] == 'Aceptado') ? 'check text-primary' : (($participacion['EstadoParticipacion'] == 'Rechazado') ? 'x text-danger' : 'question text-warning'); ?>"></i> <?php echo $participacion['EstadoParticipacion']; ?>
                                    </p>
                                    <hr>
                                    <h6>Productos y/o Alimentos:</h6>
                                    <ul>
                                        <?php
                                        foreach ($productos as $producto) :
                                            if ($producto['IDDonacion'] == $participacion['IDDonacion']) :
                                        ?>
                                                <li>
                                                    <?php echo $producto['Nombre']; ?> (<?php echo $producto['Marca']; ?>) - Cantidad: <?php echo $producto['Cantidad']; ?><br>
                                                    <?php echo $producto['Descripcion']; ?>
                                                </li>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                        <?php
                                        foreach ($alimentos as $alimento) :
                                            if ($alimento['IDDonacion'] == $participacion['IDDonacion']) : ?>
                                                <li>
                                                    <?php echo $alimento['Nombre']; ?> (<?php echo $alimento['Tipo']; ?>) - Cantidad: <?php echo $alimento['Cantidad']; ?><br>
                                                    Fecha de vencimiento: <?php echo $alimento['FechaVencimiento']; ?><br>
                                                    <?php echo $alimento['Detalles']; ?><br>
                                                    Temperatura de almacenamiento: <?php echo $alimento['TemperaturaAlmacenamiento']; ?><br>
                                                    Estado de calidad: <?php echo $alimento['EstadoCalidad']; ?>
                                                </li>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </ul>
                                    <hr>
                                    <h6>Voluntarios colaboradores:</h6>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <!-- <th>Tipo</th> -->
                                                    <th>Fecha</th>
                                                    <th>Estado</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($postulacioness as $postulacion) :
                                                    if ((($postulacion['IDSolicitud'] == $donacion['IDSolicitud']) and ($postulacion['TipoOperacion'] == $participacion['TipoOperacion']))) : ?>
                                                        <tr>
                                                            <td><?php echo $postulacion['IDPostulacion']; ?></td>
                                                            <!-- <td><?php echo $postulacion['TipoOperacion']; ?></td> -->
                                                            <td><?php echo $postulacion['FechaPostulacion']; ?></td>
                                                            <td><?php echo $postulacion['EstadoPostulacion']; ?>
                                                                <br>

                                                            </td>
                                                            <td>
                                                                <?php if ($postulacion['EstadoPostulacion'] === 'Pendiente') : ?>
                                                                    <a href="<?= base_url('Voluntario/donacion/aceptar/' . $postulacion['IDPostulacion']) ?>" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i> Aceptar</a>
                                                                    <a href="<?= base_url('Voluntario/donacion/Rechazar/' . $postulacion['IDPostulacion']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> Rechazar</a>
                                                                <?php endif; ?>
                                                                <?php if ($postulacion['EstadoPostulacion'] === 'Aceptada') : ?>
                                                                    <a href="<?= base_url('Voluntario/donacion/Rechazar/' . $postulacion['IDPostulacion']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> Rechazar</a>
                                                                <?php endif; ?>
                                                                <?php if ($postulacion['EstadoPostulacion'] === 'Rechazada') : ?>
                                                                    <a href="<?= base_url('Voluntario/donacion/aceptar/' . $postulacion['IDPostulacion']) ?>" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i> Aceptar</a>
                                                                <?php endif; ?>
                                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#mensajeModal<?= $postulacion['IDPostulacion'] ?>">
                                                                    Enviar Mensaje
                                                                </button>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    endif;
                                                endforeach; ?>

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
                                                                        <form action="<?= base_url('Voluntario/coordinacion/mandar_mensaje/' . $postulacion['IDPostulacion']) ?>" method="post">
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
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if (('Recojo' == $participacion['TipoOperacion'])) : ?>
                                        <div class="text-center">
                                            <a href="<?= base_url('Voluntario/confirmar_recojo/' . $participacion['IDParticipacion']) ?>" class="btn btn-primary"><i class="fas fa-check-circle"> </i> Confirmar Recojo</a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ('Entrega' == $participacion['TipoOperacion']) : ?>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEntrega"><i class="fas fa-check-circle"></i> Confirmar Entrega</button>
                                        </div>

                                        <!-- Modal para Confirmar Entrega -->
                                        <div class="modal fade" id="modalEntrega" tabindex="-1" aria-labelledby="modalEntregaLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalEntregaLabel">Confirmar Entrega</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Formulario para confirmar la entrega -->
                                                        <form action="<?= base_url('Voluntario/confirmar_entrega/' . $participacion['IDParticipacion']) ?>" method="post">
                                                            <!-- Campos del formulario -->
                                                            <input type="hidden" name="idDonacion" value="ID_DE_LA_DONACION_A_CONFIRMAR">
                                                            <input type="hidden" name="idSolicitud" value="ID_DE_LA_SOLICITUD_A_CONFIRMAR">

                                                            <div class="mb-3">
                                                                <label for="fechaHoraEntrega" class="form-label">Fecha y Hora de Entrega:</label>
                                                                <input type="datetime-local" id="fechaHoraEntrega" name="fechaHoraEntrega" class="form-control" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="conformidadEntrega" class="form-label">Conformidad de la Entrega:</label>
                                                                <select id="conformidadEntrega" name="conformidadEntrega" class="form-select" required>
                                                                    <option value="Satisfactoria">Satisfactoria</option>
                                                                    <option value="Pendiente">Pendiente</option>
                                                                    <option value="Insatisfactoria">Insatisfactoria</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="observaciones" class="form-label">Observaciones:</label>
                                                                <textarea id="observaciones" name="observaciones" class="form-control"></textarea>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Confirmar Entrega</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>


                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endforeach; ?>
            </div>
            <br>
            <br>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php foreach ($participaciones as $participacion) : ?>
                    <?php if (($participacion['TipoOperacion'] == 'Entrega'  and $participacion['EstadoParticipacion'] == 'Aceptada'  and $participacion['ConformidadEntrega'] != 'Satisfactoria') and ($participacion['ConformidadRecojo'] == 'Satisfactoria')) : ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <i class="bi bi-person-circle"></i>
                                    <?php echo $Vol['ExperienciaLaboral'] . ', ' . $Vol['Habilidades']; ?>

                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php
                                        $donacion = null;
                                        foreach ($donaciones as $don) {
                                            if ($don['IDDonacion'] == $participacion['IDDonacion']) {
                                                $donacion = $don;
                                                break;
                                            }
                                        }
                                        echo $donacion['TipoDeDonacion'] . ': ' . $donacion['Estado'];
                                        ?>
                                    </h5>
                                    <p class="card-text">
                                        <i class="bi bi-<?php echo ($participacion['TipoOperacion'] == 'Recojo') ? 'truck text-success' : 'arrow-down-right text-danger'; ?>"></i> <?php echo $participacion['TipoOperacion']; ?><br>
                                        <i class="bi bi-calendar-event"></i> <?php echo $participacion['FechaHora']; ?><br>
                                        <i class="bi bi-people"></i> <?php echo $participacion['CantidadColaboradores']; ?> colaboradores<br>
                                        <!-- <i class="bi bi-check-circle <?php echo ($participacion['ConformidadEntrega'] == 'Satisfactoria') ? 'text-success' : (($participacion['ConformidadEntrega'] == 'Insatisfactoria') ? 'text-danger' : 'text-warning'); ?>"></i> <?php echo $participacion['ConformidadEntrega']; ?><br> -->
                                        <i class="bi bi-clipboard <?php echo ($participacion['EstadoParticipacion'] == 'Aceptado') ? 'check text-primary' : (($participacion['EstadoParticipacion'] == 'Rechazado') ? 'x text-danger' : 'question text-warning'); ?>"></i> <?php echo $participacion['EstadoParticipacion']; ?>
                                    </p>
                                    <hr>
                                    <h6>Productos y/o Alimentos:</h6>
                                    <ul>
                                        <?php
                                        foreach ($productos as $producto) :
                                            if ($producto['IDDonacion'] == $participacion['IDDonacion']) :
                                        ?>
                                                <li>
                                                    <?php echo $producto['Nombre']; ?> (<?php echo $producto['Marca']; ?>) - Cantidad: <?php echo $producto['Cantidad']; ?><br>
                                                    <?php echo $producto['Descripcion']; ?>
                                                </li>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                        <?php
                                        foreach ($alimentos as $alimento) :
                                            if ($alimento['IDDonacion'] == $participacion['IDDonacion']) : ?>
                                                <li>
                                                    <?php echo $alimento['Nombre']; ?> (<?php echo $alimento['Tipo']; ?>) - Cantidad: <?php echo $alimento['Cantidad']; ?><br>
                                                    Fecha de vencimiento: <?php echo $alimento['FechaVencimiento']; ?><br>
                                                    <?php echo $alimento['Detalles']; ?><br>
                                                    Temperatura de almacenamiento: <?php echo $alimento['TemperaturaAlmacenamiento']; ?><br>
                                                    Estado de calidad: <?php echo $alimento['EstadoCalidad']; ?>
                                                </li>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </ul>
                                    <hr>
                                    <h6>Voluntarios colaboradores:</h6>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <!-- <th>Tipo</th> -->
                                                    <th>Fecha</th>
                                                    <th>Estado</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($postulacioness as $postulacion) :
                                                    if ((($postulacion['IDSolicitud'] == $donacion['IDSolicitud']) and ($postulacion['TipoOperacion'] == $participacion['TipoOperacion']))) : ?>
                                                        <tr>
                                                            <td><?php echo $postulacion['IDPostulacion']; ?></td>
                                                            <!-- <td><?php echo $postulacion['TipoOperacion']; ?></td> -->
                                                            <td><?php echo $postulacion['FechaPostulacion']; ?></td>
                                                            <td><?php echo $postulacion['EstadoPostulacion']; ?>
                                                                <br>

                                                            </td>
                                                            <td>
                                                                <?php if ($postulacion['EstadoPostulacion'] === 'Pendiente') : ?>
                                                                    <a href="<?= base_url('Voluntario/donacion/aceptar/' . $postulacion['IDPostulacion']) ?>" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i> Aceptar</a>
                                                                    <a href="<?= base_url('Voluntario/donacion/Rechazar/' . $postulacion['IDPostulacion']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> Rechazar</a>
                                                                <?php endif; ?>
                                                                <?php if ($postulacion['EstadoPostulacion'] === 'Aceptada') : ?>
                                                                    <a href="<?= base_url('Voluntario/donacion/Rechazar/' . $postulacion['IDPostulacion']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> Rechazar</a>
                                                                <?php endif; ?>
                                                                <?php if ($postulacion['EstadoPostulacion'] === 'Rechazada') : ?>
                                                                    <a href="<?= base_url('Voluntario/donacion/aceptar/' . $postulacion['IDPostulacion']) ?>" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i> Aceptar</a>
                                                                <?php endif; ?>
                                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#mensajeModal<?= $postulacion['IDPostulacion'] ?>">
                                                                    Enviar Mensaje
                                                                </button>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    endif;
                                                endforeach; ?>

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
                                                                        <form action="<?= base_url('Voluntario/coordinacion/mandar_mensaje/' . $postulacion['IDPostulacion']) ?>" method="post">
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
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if (('Recojo' == $participacion['TipoOperacion'])) : ?>
                                        <div class="text-center">
                                            <a href="<?= base_url('Voluntario/confirmar_recojo/' . $participacion['IDParticipacion']) ?>" class="btn btn-primary"><i class="fas fa-check-circle"> </i> Confirmar Recojo</a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ('Entrega' == $participacion['TipoOperacion']) : ?>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEntrega"><i class="fas fa-check-circle"></i> Confirmar Entrega</button>
                                        </div>

                                        <!-- Modal para Confirmar Entrega -->
                                        <div class="modal fade" id="modalEntrega" tabindex="-1" aria-labelledby="modalEntregaLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalEntregaLabel">Confirmar Entrega</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Formulario para confirmar la entrega -->
                                                        <form action="<?= base_url('Voluntario/confirmar_entrega/' . $participacion['IDParticipacion']) ?>" method="post">
                                                            <!-- Campos del formulario -->
                                                            <input type="hidden" name="idDonacion" value="ID_DE_LA_DONACION_A_CONFIRMAR">
                                                            <input type="hidden" name="idSolicitud" value="ID_DE_LA_SOLICITUD_A_CONFIRMAR">

                                                            <div class="mb-3">
                                                                <label for="fechaHoraEntrega" class="form-label">Fecha y Hora de Entrega:</label>
                                                                <input type="datetime-local" id="fechaHoraEntrega" name="fechaHoraEntrega" class="form-control" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="conformidadEntrega" class="form-label">Conformidad de la Entrega:</label>
                                                                <select id="conformidadEntrega" name="conformidadEntrega" class="form-select" required>
                                                                    <option value="Satisfactoria">Satisfactoria</option>
                                                                    <option value="Pendiente">Pendiente</option>
                                                                    <option value="Insatisfactoria">Insatisfactoria</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="observaciones" class="form-label">Observaciones:</label>
                                                                <textarea id="observaciones" name="observaciones" class="form-control"></textarea>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Confirmar Entrega</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>


                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endforeach; ?>
            </div>
        </div>



    </main>

    <!-- Pie de página -->


    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>