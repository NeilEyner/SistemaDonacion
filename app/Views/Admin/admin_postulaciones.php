<?php $session = session() ?>
<?= $this->include('dashboard/d_header.php'); ?>

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Administración de Participaciones de Voluntarios</h1>
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Participaciones de Responsables Voluntarios</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="">
                                        <tr>
                                            <!-- <th>ID</th> -->
                                            <th>Voluntario</th>
                                            <th>Tipo de Operación</th>
                                            <th>Donación</th>
                                            <th>Fecha y Hora</th>
                                            <th>Cantidad de Colaboradores</th>
                                            <th>Conformidad de Recojo</th>
                                            <th>Conformidad de Entrega</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($participaciones as $participacion) : ?>
                                            <tr>
                                                <!-- <td><?php echo $participacion['IDParticipacion']; ?></td> -->
                                                <td><?php
                                                    foreach ($voluntarios as $voluntario) :
                                                        if ($voluntario['IDVoluntario'] == $participacion['IDVoluntario']) :
                                                            foreach ($usuarios as $usuario) :
                                                                if ($usuario['IDUsuario'] == $voluntario['IDUsuario']) :
                                                                    echo $usuario['Nombre'];
                                                                    break;
                                                                endif;
                                                            endforeach;
                                                        endif;
                                                    endforeach; ?>


                                                </td>
                                                <td><?php echo $participacion['TipoOperacion']; ?></td>
                                                <td><?php echo $participacion['IDDonacion']; ?></td>
                                                <td><?php echo $participacion['FechaHora']; ?></td>
                                                <td><?php echo $participacion['CantidadColaboradores']; ?></td>
                                                <td><?php echo $participacion['ConformidadRecojo']; ?></td>
                                                <td><?php echo $participacion['ConformidadEntrega']; ?></td>

                                                <td><?php echo $participacion['EstadoParticipacion']; ?></td>
                                                <td>
                                                    <?php if ($participacion['EstadoParticipacion'] == 'Pendiente') : ?>
                                                        <a href="<?php echo base_url('Admin/admin_participacion/aceptar_participacion/' . $participacion['IDParticipacion']); ?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Aceptar</a>
                                                        <a href="<?php echo base_url('Admin/admin_participacion/rechazar_participacion/' . $participacion['IDParticipacion']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Rechazar</a>
                                                    <?php endif; ?>
                                                    <?php if ($participacion['EstadoParticipacion'] == 'Aceptada') : ?>
                                                        <a href="<?php echo base_url('Admin/admin_participacion/rechazar_participacion/' . $participacion['IDParticipacion']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Rechazar</a>
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
            </div>
            <!-- /.row -->


            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Participacion de Colaboradores Voluntarios</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="">
                                        <tr>
                                            <!-- <th>ID</th> -->
                                            <th>Voluntario</th>
                                            <th>Tipo de Operación</th>
                                            <th>Solicitud</th>
                                            <th>Fecha de Postulación</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($postulaciones as $postulacion) : ?>
                                            <tr>
                                                <!-- <td><?php echo $postulacion['IDPostulacion']; ?></td> -->
                                                <td><?php

                                                    foreach ($voluntarios as $voluntario) :
                                                        if ($voluntario['IDVoluntario'] == $postulacion['IDVoluntario']) :
                                                            foreach ($usuarios as $usuario) :
                                                                if ($usuario['IDUsuario'] == $voluntario['IDUsuario']) :
                                                                    echo $usuario['Nombre'];
                                                                    break;
                                                                endif;
                                                            endforeach;
                                                        endif;
                                                    endforeach; ?></td>
                                                <td><?php echo $postulacion['TipoOperacion']; ?></td>
                                                <td><?php
                                                    foreach ($solicitudes as $solicitud) :
                                                        if ($solicitud['IDSolicitud'] == $postulacion['IDSolicitud']) :
                                                            echo $solicitud['DescripcionNecesidad'];
                                                        endif;
                                                    endforeach;
                                                    ?> </td>
                                                <td><?php echo $postulacion['FechaPostulacion']; ?></td>
                                                <td><?php echo $postulacion['EstadoPostulacion']; ?></td>
                                                <td>
                                                    <?php if ($postulacion['EstadoPostulacion'] == 'Pendiente') : ?>
                                                        <a href="<?php echo base_url('Admin/admin_postulacion/aceptar_postulacion/' . $postulacion['IDPostulacion']); ?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Aceptar</a>
                                                        <a href="<?php echo base_url('Admin/admin_postulacion/rechazar_postulacion/' . $postulacion['IDPostulacion']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Rechazar</a>
                                                    <?php endif; ?>
                                                    <?php if ($postulacion['EstadoPostulacion'] == 'Rechazada') : ?>
                                                        <a href="<?php echo base_url('Admin/admin_postulacion/aceptar_postulacion/' . $postulacion['IDPostulacion']); ?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Aceptar</a>
                                                        <a href="<?php echo base_url('Admin/admin_postulacion/pendiente_postulacion/' . $postulacion['IDPostulacion']); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-hourglass-half"></i> Pendiente</a>
                                                    <?php endif; ?>

                                                    <?php if ($postulacion['EstadoPostulacion'] == 'Aceptada') : ?>
                                                        <a href="<?php echo base_url('Admin/admin_postulacion/rechazar_postulacion/' . $postulacion['IDPostulacion']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Rechazar</a>
                                                        <a href="<?php echo base_url('Admin/admin_postulacion/pendiente_postulacion/' . $postulacion['IDPostulacion']); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-hourglass-half"></i> Pendiente</a>
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
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->

<!-- Pie de página -->
<?= $this->include('dashboard/d_footer.php'); ?>