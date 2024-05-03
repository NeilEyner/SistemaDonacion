<!-- Voluntario/voluntario_mensajes_recibidos.php -->
<?php $session = session() ?>
<?= $this->include('Layouts/header.php'); ?>

<body class="">
    <!-- Barra de navegación -->
    
    <?= $this->include('Layouts/nav.php'); ?>

    <!-- Contenido principal -->
    <main>
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <h2 class="mb-4">Detalles de Participaciones Voluntarias</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID Participación</th>
                                    <th>ID Voluntario</th>
                                    <th>ID Donación</th>
                                    <th>Tipo de Operación</th>
                                    <th>Fecha y Hora</th>
                                    <th>Cantidad de Colaboradores</th>
                                    <th>Conformidad Recojo</th>
                                    <th>Conformidad Entrega</th>
                                    <th>Estado Participación</th>
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
                                            <?php if ($participacion['ConformidadRecojo'] === 'Satisfactoria') : ?>
                                                <i class="fas fa-check-circle text-success"></i>
                                            <?php elseif ($participacion['ConformidadRecojo'] === 'Pendiente') : ?>
                                                <i class="fas fa-clock text-warning"></i>
                                            <?php else : ?>
                                                <i class="fas fa-times-circle text-danger"></i>
                                            <?php endif; ?>
                                            <?= $participacion['ConformidadRecojo'] ?>
                                        </td>
                                        <td>
                                            <?php if ($participacion['ConformidadEntrega'] === 'Satisfactoria') : ?>
                                                <i class="fas fa-check-circle text-success"></i>
                                            <?php elseif ($participacion['ConformidadEntrega'] === 'Pendiente') : ?>
                                                <i class="fas fa-clock text-warning"></i>
                                            <?php else : ?>
                                                <i class="fas fa-times-circle text-danger"></i>
                                            <?php endif; ?>
                                            <?= $participacion['ConformidadEntrega'] ?>
                                        </td>
                                        <td><?= $participacion['EstadoParticipacion'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <button id="exportPDFButton" class="btn btn-primary">Exportar a PDF</button>
                </div>
            </div>
        </div>



    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <script>
        document.getElementById('exportPDFButton').addEventListener('click', function() {
            // Crear un nuevo objeto jsPDF
            var doc = new jsPDF();

            // Capturar el contenido HTML de la tabla
            var tableContent = document.querySelector('.table-responsive').innerHTML;

            // Generar el PDF
            doc.text('Detalles de Participaciones Voluntarias', 10, 10);
            doc.autoTable({
                html: tableContent
            });

            // Descargar el PDF
            doc.save('participaciones_voluntarias.pdf');
        });
    </script>
    <!-- Pie de página -->
    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>