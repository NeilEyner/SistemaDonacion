<?php $session = session() ?>
<?= $this->include('dashboard/d_header.php'); ?>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800 text-center">Postulaciones Voluntario Responsable </h1>
            <div class="row">
                <?php foreach ($participaciones as $participacion) : ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header bg-primary text-white">
                                <h6 class="m-0 font-weight-bold"><i class="bi bi-person-circle"></i>
                                    <?php
                                    $donacion = null;
                                    foreach ($donaciones as $don) {
                                        if ($don['IDDonacion'] == $participacion['IDDonacion']) {
                                            $donacion = $don;
                                            break;
                                        }
                                    }
                                    echo $donacion['IDDonacion'] . ' ' . $donacion['TipoDeDonacion'] . ': ' . $donacion['Estado'];
                                    ?>
                                </h6>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"> <i class="bi bi-<?php echo ($participacion['TipoOperacion'] == 'Recojo') ? 'truck text-success' : 'arrow-down-right text-danger'; ?>"></i> <?php echo $participacion['TipoOperacion']; ?> </h5>
                                <p class="card-text">
                                    <i class="bi bi-calendar-event"></i> <?php echo $participacion['FechaHora']; ?><br>
                                    <i class="bi bi-people"></i> <?php echo $participacion['CantidadColaboradores']; ?> colaboradores
                                </p>
                                <hr>
                                <h6>Productos y/o Alimentos:</h6>
                                <?php foreach ($productos as $producto) : ?>
                                    <?php if ($producto['IDDonacion'] == $participacion['IDDonacion']) : ?>
                                        <?php echo $producto['Nombre']; ?> : <?php echo $producto['Cantidad']; ?><br>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php foreach ($alimentos as $alimento) : ?>
                                    <?php if ($alimento['IDDonacion'] == $participacion['IDDonacion']) : ?>
                                        <?php echo $alimento['Nombre']; ?> : <?php echo $alimento['Cantidad']; ?>- <?php echo $alimento['EstadoCalidad']; ?><br>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <hr>
                                <h6>Voluntarios colaboradores:</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Estado</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($postulacioness as $postulacion) : ?>
                                                <?php if ($postulacion['IDSolicitud'] == $donacion['IDSolicitud'] && $postulacion['TipoOperacion'] == $participacion['TipoOperacion']) : ?>
                                                    <tr>
                                                        <td><?php echo $postulacion['FechaPostulacion']; ?></td>
                                                        <td><?php echo $postulacion['EstadoPostulacion']; ?></td>
                                                        <td>
                                                            <?php if ($postulacion['EstadoPostulacion'] === 'Pendiente') : ?>
                                                                <a href="<?= base_url('Voluntario/donacion/Aceptar/' . $postulacion['IDPostulacion']) ?>" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i> </a>
                                                                <a href="<?= base_url('Voluntario/donacion/Rechazar/' . $postulacion['IDPostulacion']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> </a>
                                                            <?php elseif ($postulacion['EstadoPostulacion'] === 'Aceptada') : ?>
                                                                <a href="<?= base_url('Voluntario/donacion/Rechazar/' . $postulacion['IDPostulacion']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> </a>
                                                            <?php elseif ($postulacion['EstadoPostulacion'] === 'Rechazada') : ?>
                                                                <a href="<?= base_url('Voluntario/donacion/aceptar/' . $postulacion['IDPostulacion']) ?>" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i> </a>
                                                            <?php endif; ?>
                                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#mensajeModal<?= $postulacion['IDPostulacion'] ?>">Enviar Mensaje</a>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    <?php if ($participacion['TipoOperacion'] === 'Recojo') : ?>
                                        <?php $recojo_url = site_url('Voluntario/confirmar_recojo/' . $participacion['IDParticipacion']); ?>
                                        <?php if ($participacion['ConformidadRecojo'] !== 'Satisfactoria') : ?>
                                            <a href="<?= esc($recojo_url) ?>" class="btn btn-primary">
                                                <i class="fas fa-check-circle"></i> Confirmar Recojo
                                            </a>
                                        <?php else : ?>
                                            <span class="btn btn-success">
                                                <i class="fas fa-check-circle"></i> Recojido
                                            </span>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if ($participacion['TipoOperacion'] === 'Entrega') : ?>
                                        <?php if ($participacion['ConformidadEntrega'] !== 'Satisfactoria') : ?>
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalEntrega<?= esc($participacion['IDParticipacion']) ?>">
                                                <i class="fas fa-check-circle"></i> Confirmar Entrega
                                            </a>
                                        <?php else : ?>
                                            <span class="btn btn-success">
                                                <i class="fas fa-check-circle"></i> Entregado
                                            </span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>


                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800 text-center">Postulaciones Voluntario Colaborador</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <!-- <th>Voluntario ID</th> -->
                                    <th>Informacion </th>
                                    <th>Tipo Operación</th>
                                    <th>Fecha Postulación</th>
                                    <th>Estado</th>
                                    <th>Coordinador</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($postulaciones as $postulacion) : ?>
                                    <tr>
                                        <!-- <td><?php echo $postulacion['IDVoluntario']; ?></td> -->
                                        <td>
                                            <?php foreach ($solicitudes_aceptada as $solicitudes) :
                                                if ($solicitudes['IDSolicitud'] == $postulacion['IDSolicitud']) :
                                                    foreach ($donaciones as $donacion) :
                                                        if ($donacion['IDSolicitud'] == $solicitudes['IDSolicitud']) :
                                                            echo 'Productos y/o Alimentos: <br>';
                                                            foreach ($productos as $producto) :
                                                                if ($producto['IDDonacion'] == $donacion['IDDonacion']) :
                                                                    echo $producto['Nombre'], ':';
                                                                    echo $producto['Cantidad'];

                                                                endif;
                                                            endforeach;
                                                            foreach ($alimentos as $alimento) :
                                                                if ($alimento['IDDonacion'] == $donacion['IDDonacion']) :
                                                                    echo $alimento['Nombre'], ':';
                                                                    echo $alimento['Cantidad'];
                                                                    echo $alimento['EstadoCalidad'];
                                                                endif;
                                                            endforeach;
                                                        endif;
                                                    endforeach;
                                                endif;
                                            endforeach; ?>
                                        </td>
                                        <td>
                                            <?php if ($postulacion['TipoOperacion'] == 'Recojo') : ?>
                                                <span class="badge badge-success"><i class="bi bi-truck"></i> Recojo</span>
                                            <?php else : ?>
                                                <span class="badge badge-primary"><i class="bi bi-arrow-down-right"></i> Entrega</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $postulacion['FechaPostulacion']; ?></td>
                                        <td>
                                            <?php if ($postulacion['EstadoPostulacion'] == 'Pendiente') : ?>
                                                <span class="badge badge-warning"><?php echo $postulacion['EstadoPostulacion']; ?></span>
                                            <?php elseif ($postulacion['EstadoPostulacion'] == 'Aceptada') : ?>
                                                <span class="badge badge-success"><?php echo $postulacion['EstadoPostulacion']; ?></span>
                                            <?php else : ?>
                                                <span class="badge badge-danger"><?php echo $postulacion['EstadoPostulacion']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#mensajeModal<?= $postulacion['IDPostulacion'] ?>">Enviar Mensaje</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==============modales================ -->

<?php foreach ($postulaciones as $postulacion) : ?>
    <!-- Modal para enviar mensaje -->
    <div class="modal fade" id="mensajeModal<?= $postulacion['IDPostulacion'] ?>" tabindex="-1" role="dialog" aria-labelledby="mensajeModalLabel<?= $postulacion['IDPostulacion'] ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mensajeModalLabel<?= $postulacion['IDPostulacion'] ?>">Enviar Mensaje</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Voluntario/coordinacion/mandar_mensaje/responsable' . $postulacion['IDPostulacion']) ?>" method="post">
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

<?php endforeach; ?>

<?php foreach ($postulacioness as $postulacion) : ?>
    <!-- Modal para enviar mensaje -->
    <div class="modal fade" id="mensajeModal<?= $postulacion['IDPostulacion'] ?>" tabindex="-1" role="dialog" aria-labelledby="mensajeModalLabel<?= $postulacion['IDPostulacion'] ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
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

<?php endforeach; ?>

<?php foreach ($participaciones as $participacion) : ?>
    <?php if ($participacion['EstadoParticipacion'] == 'Aceptada') : ?>
        <div class="modal fade" id="modalEntrega<?= $participacion['IDParticipacion'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEntregaLabel<?= $participacion['IDParticipacion'] ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEntregaLabel">Confirmar Entrega</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
<?php endforeach; ?>


<!-- Pie de página -->
<?= $this->include('dashboard/d_footer.php'); ?>