<?php
//la sesión
$session = session()

?>
<?= $this->include('Layouts/header.php'); ?>

<body class="">
    <!-- Barra de navegación -->
    <?= $this->include('Layouts/nav.php'); ?>

    <!-- Contenido principal -->
    <main>
        <div class="container">
            <h1>Donaciones Pendientes</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th>IDDonacion</th>
                        <th>IDDonante</th>
                        <th>FechaDonacion</th>
                        <th>Estado</th>
                        <th>TipoDeDonacion</th>
                        <th>IDSolicitud</th>
                        <th>EstadoDonacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donacionesPendientes as $donacion) : ?>
                        <tr>
                            <td><?= $donacion['IDDonacion'] ?></td>
                            <td><?= $donacion['IDDonante'] ?></td>
                            <td><?= $donacion['FechaDonacion'] ?></td>
                            <td><?= $donacion['Estado'] ?></td>
                            <td><?= $donacion['TipoDeDonacion'] ?></td>
                            <td><?= $donacion['IDSolicitud'] ?></td>
                            <td><?= $donacion['EstadoDonacion'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/donaciones/detalles/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-primary">Detalles</a>
                                <a href="<?= base_url('admin/donaciones/aceptar/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-success">Aceptar</a>
                                <a href="<?= base_url('admin/donaciones/rechazar/' . $donacion['IDDonacion']) ?>" class="btn btn-sm btn-danger">Rechazar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>



        <div class="container">
            <h1>Donaciones Entregadas</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th>IDDonacion</th>
                        <th>IDDonante</th>
                        <th>FechaDonacion</th>
                        <th>Estado</th>
                        <th>TipoDeDonacion</th>
                        <th>IDSolicitud</th>
                        <th>EstadoDonacion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donacionesEntregadas as $donacion) : ?>
                        <tr>
                            <td><?= $donacion['IDDonacion'] ?></td>
                            <td><?= $donacion['IDDonante'] ?></td>
                            <td><?= $donacion['FechaDonacion'] ?></td>
                            <td><?= $donacion['Estado'] ?></td>
                            <td><?= $donacion['TipoDeDonacion'] ?></td>
                            <td><?= $donacion['IDSolicitud'] ?></td>
                            <td><?= $donacion['EstadoDonacion'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="container">
            <h1>Donaciones Canceladas</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th>IDDonacion</th>
                        <th>IDDonante</th>
                        <th>FechaDonacion</th>
                        <th>Estado</th>
                        <th>TipoDeDonacion</th>
                        <th>IDSolicitud</th>
                        <th>EstadoDonacion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donacionesCanceladas as $donacion) : ?>
                        <tr>
                            <td><?= $donacion['IDDonacion'] ?></td>
                            <td><?= $donacion['IDDonante'] ?></td>
                            <td><?= $donacion['FechaDonacion'] ?></td>
                            <td><?= $donacion['Estado'] ?></td>
                            <td><?= $donacion['TipoDeDonacion'] ?></td>
                            <td><?= $donacion['IDSolicitud'] ?></td>
                            <td><?= $donacion['EstadoDonacion'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Pie de página -->
    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>