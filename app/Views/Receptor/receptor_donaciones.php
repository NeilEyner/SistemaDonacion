<!-- Voluntario/voluntario_mensajes_recibidos.php -->
<?php $session = session() ?>
<?= $this->include('Layouts/header.php'); ?>

<body class="">
    <!-- Barra de navegación -->
    <?= $this->include('Layouts/nav.php'); ?>

    <!-- Contenido principal -->
    <main>
        <div class="container">
            <h1>Listado de Donaciones</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Donante</th>
                        <th>Fecha de Donación</th>
                        <th>Estado</th>
                        <th>Tipo de Donación</th>
                        <th>ID de Solicitud</th>
                        <th>Estado de Donación</th>
                        <!-- Agrega más encabezados aquí según tus necesidades -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donaciones as $donacion) : ?>
                        <tr>
                            <td><?= $donacion['IDDonacion'] ?></td>
                            <td><?= $donacion['IDDonante'] ?></td>
                            <td><?= $donacion['FechaDonacion'] ?></td>
                            <td><?= $donacion['Estado'] ?></td>
                            <td><?= $donacion['TipoDeDonacion'] ?></td>
                            <td><?= $donacion['IDSolicitud'] ?></td>
                            <td><?= $donacion['EstadoDonacion'] ?></td>
                            <!-- Agrega más columnas aquí según tus necesidades -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>