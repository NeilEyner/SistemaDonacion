<?php $session = session() ?>
<?= $this->include('dashboard/d_header.php'); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Donaciones</h6>
        </div>
        <div class="card-body">
            <?php if (empty($donaciones)) : ?>
                <p class="text-muted">No hay donaciones registradas en este momento.</p>
            <?php else : ?>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php foreach ($donaciones as $donacion) : ?>
                        <?php if (!in_array($donacion['IDSolicitud'], array_column($postulaciones, 'IDSolicitud'))) : ?>
                            <?php if (!in_array($donacion['IDDonacion'], array_column($participaciones, 'IDDonacion'))) : ?>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <?php foreach ($solicitudes_aceptada as $solicitud) : ?>
                                                <?php if ($solicitud['IDSolicitud'] == $donacion['IDSolicitud']) : ?>
                                                    <h5 class="card-title">Donación : <?= $donacion['TipoDeDonacion'] ?> </h5>
                                                    <p class="card-text">Instrucciones: <?= $solicitud['InstruccionesEntrega'] ?></p>
                                                    <p class="card-text">Prioridad: <?= $solicitud['Prioridad'] ?></p>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php foreach ($alimentos as $alimento) : ?>
                                                <?php if ($alimento['IDDonacion'] == $donacion['IDDonacion']) : ?>
                                                    <p class="card-text"><?= $alimento['Nombre'] ?> : <?= $alimento['Cantidad'] ?></p>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php foreach ($productos as $producto) : ?>
                                                <?php if ($producto['IDDonacion'] == $donacion['IDDonacion']) : ?>
                                                    <p class="card-text"><?= $producto['Nombre'] ?> : <?= $producto['Cantidad'] ?></p>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <div class="flex-row justify-content-center align-items-center mt-3">
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <div class="btn-group d-grid">
                                                            <a class="btn btn-success" href="" data-toggle="modal" data-target="#responsableRecojoModal<?= $donacion['IDSolicitud'] ?>">
                                                                <i class="bi bi-person-arms-up"></i><br> Postular Responsable
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <div class="btn-group">
                                                            <a href="<?= base_url('Voluntario/voluntario_postulacion/postular_recojo/' . $donacion['IDSolicitud']) ?>" class="btn btn-primary">
                                                                <i class="fas fa-truck me-1"></i> Postular Colaborador Recojo
                                                            </a>
                                                            <a href="<?= base_url('Voluntario/voluntario_postulacion/postular_entrega/' . $donacion['IDSolicitud']) ?>" class="btn btn-primary">
                                                                <i class="fas fa-box me-1"></i> Postular Colaborador Entrega
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php foreach ($donaciones as $donacion) : ?>
    <!-- Modal -->
    <div class="modal fade" id="responsableRecojoModal<?= $donacion['IDSolicitud'] ?>" tabindex="-1" role="dialog" aria-labelledby="responsableRecojoModalLabel<?= $donacion['IDSolicitud'] ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="responsableRecojoModalLabel<?= $donacion['IDSolicitud'] ?>">Postular como Responsable de Recojo</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para postularse como responsable  -->
                    <form action="<?= base_url('Voluntario/voluntario_postulacion/postular_responsable/' . $donacion['IDSolicitud']) ?>" method="POST">
                        <div class="mb-3">
                            <label for="tipo_operacion" class="form-label">Tipo de Operación:</label>
                            <select class="form-control" id="tipo_operacion" name="tipo_operacion" required>
                                <option value="Recojo">Recojo</option>
                                <option value="Entrega">Entrega</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad_colaboradores" class="form-label">Cantidad de Colaboradores</label>
                            <input type="number" class="form-control" id="cantidad_colaboradores" name="cantidad_colaboradores" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_hora_recojo" class="form-label">Fecha y Hora</label>
                            <input type="datetime-local" class="form-control" id="fecha_hora_recojo" name="fecha_hora_recojo" required>
                        </div>
                        <div class="mb-3">
                            <label for="ubicacion_recojo" class="form-label">Ubicación</label>
                            <input type="text" class="form-control" id="ubicacion_recojo" name="ubicacion_recojo" required>
                        </div>
                        <div class="mb-3">
                            <label for="persona_contacto" class="form-label">Persona de Contacto</label>
                            <input type="text" class="form-control" id="persona_contacto" name="persona_contacto" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono_contacto" class="form-label">Teléfono de Contacto</label>
                            <input type="tel" class="form-control" id="telefono_contacto" name="telefono_contacto" required>
                        </div>
                        <!-- Puedes agregar más campos al formulario según tus necesidades -->
                        <button type="submit" class="btn btn-primary">Postular</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<div class="container-fluid">
    <div class="card mb-4 shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Postulación de Responsable</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>ID Voluntario</th>
                            <th>ID Donación</th>
                            <th>Tipo de Operación</th>
                            <th>Fecha y Hora</th>
                            <th>Cantidad de Colaboradores</th>
                            <th>Estado de Postulación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($participaciones as $participacion) : ?>
                            <tr>
                                <td><?= $participacion['IDParticipacion'] ?></td>
                                <td><?= $participacion['IDVoluntario'] ?></td>
                                <td><?= $participacion['IDDonacion'] ?></td>
                                <td><?= $participacion['TipoOperacion'] ?></td>
                                <td><?= $participacion['FechaHora'] ?></td>
                                <td><?= $participacion['CantidadColaboradores'] ?></td>
                                <td>
                                    <?php
                                    $estado = $participacion['EstadoParticipacion'];
                                    $btn_class = '';
                                    switch ($estado) {
                                        case 'Aceptada':
                                            $btn_class = 'btn-success';
                                            break;
                                        case 'Rechazada':
                                            $btn_class = 'btn-danger';
                                            break;
                                        case 'Pendiente':
                                            $btn_class = 'btn-warning';
                                            break;
                                        default:
                                            $btn_class = 'btn-secondary';
                                            break;
                                    }
                                    ?>
                                    <button type="button" class="btn <?= $btn_class ?> btn-sm" disabled><?= $estado ?></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid">
    <div class="card mb-4 shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Postulaciones Colaborador</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
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

<!-- Pie de página -->
<?= $this->include('dashboard/d_footer.php'); ?>