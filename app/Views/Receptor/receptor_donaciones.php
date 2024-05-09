<?php $session = session() ?>
<?= $this->include('dashboard/d_header.php'); ?>


<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Listado de Donaciones</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Donante</th>
                            <th>Fecha de Donación</th>
                            <th>Estado</th>
                            <th>Productos y/o Alimentos</th>
                            <!-- <th>ID de Solicitud</th> -->
                            <th>Estado de Donación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donaciones as $donacion) : ?>
                            <tr>
                                <!-- <td><?= $donacion['IDDonacion'] ?></td> -->
                                <td><?= $donacion['IDDonante'] ?></td>
                                <td><?= $donacion['FechaDonacion'] ?></td>
                                <td><?= $donacion['Estado'] ?></td>
                                <td>
                                <?php foreach ($productos as $producto) : ?>
                                    <?php if ($producto['IDDonacion'] == $donacion['IDDonacion']) : ?>
                                        <?php echo $producto['Nombre']; ?> : <?php echo $producto['Cantidad']; ?><br>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php foreach ($alimentos as $alimento) : ?>
                                    <?php if ($alimento['IDDonacion'] == $donacion['IDDonacion']) : ?>
                                        <?php echo $alimento['Nombre']; ?> : <?php echo $alimento['Cantidad']; ?>- <?php echo $alimento['EstadoCalidad']; ?><br>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                                <!-- <td><?= $donacion['IDSolicitud'] ?></td> -->
                                <td><?= $donacion['EstadoDonacion'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Pie de página -->
<?= $this->include('dashboard/d_footer.php'); ?>