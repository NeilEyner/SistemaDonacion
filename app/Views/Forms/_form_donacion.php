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
        <div class="container mt-5">
            <h1 class="mb-4">Formulario de Donación</h1>

            <!-- Mostrar detalles de la solicitud -->
            <h2>Detalles de la Solicitud:</h2>
            <?= $donacionId?>
            <p>ID de la solicitud: <?= isset($solicitud['IDSolicitud']) ? $solicitud['IDSolicitud'] : 'No disponible' ?></p>
            <p>Fecha de la solicitud: <?= isset($solicitud['FechaSolicitud']) ? $solicitud['FechaSolicitud'] : 'No disponible' ?></p>
            <p>Estado de la solicitud: <?= isset($solicitud['EstadoSolicitud']) ? $solicitud['EstadoSolicitud'] : 'No disponible' ?></p>
            <p>Cantidad solicitada: <?= isset($solicitud['Cantidad']) ? $solicitud['Cantidad'] : 'No disponible' ?></p>

            <h2>Formulario de Donación</h2>
            <form action="<?= base_url('Forms/_form_agregar/continuar/' . $donacionId) ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="tipo_donacion" class="form-label">Tipo de Donación:</label>
                    <select id="tipo_donacion" name="tipo_donacion" class="form-select" required>
                        <option value="Producto">Producto</option>
                        <option value="Alimento">Alimento</option>
                        <option value="Producto y Alimento">Producto y Alimento</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="imagen_donacion" class="form-label">Imagen de la Donación:</label>
                    <input type="file" id="imagen_donacion" name="imagen_donacion" class="form-control" required>
                    <div class="form-text">Formatos admitidos: JPG, PNG. Tamaño máximo: 5MB.</div>
                </div>

                <button type="submit" class="btn btn-primary">Enviar Donación</button>
            </form>
        </div>


        <!-- <div class="container">
            <div class="container mt-5">
                <h1 class="mb-4">Formulario de Donación</h1>
   
                <h2>Detalles de la Solicitud:</h2>
                <p>ID de la solicitud: <?= isset($solicitud['IDSolicitud']) ? $solicitud['IDSolicitud'] : 'No disponible' ?></p>
                <p>Fecha de la solicitud: <?= isset($solicitud['FechaSolicitud']) ? $solicitud['FechaSolicitud'] : 'No disponible' ?></p>
                <p>Estado de la solicitud: <?= isset($solicitud['EstadoSolicitud']) ? $solicitud['EstadoSolicitud'] : 'No disponible' ?></p>
                <p>Cantidad solicitada: <?= isset($solicitud['Cantidad']) ? $solicitud['Cantidad'] : 'No disponible' ?></p>
      
                <h1 class="mb-4">Formulario de Donación</h1>
                <form action="<?= base_url('Forms/_form_agregar/addDon/' . $solicitud['IDSolicitud']) ?>" method="post">
                
                    <div class="mb-3">
                        <label for="fecha_donacion" class="form-label">Fecha de Donación:</label>
                        <input type="date" id="fecha_donacion" name="fecha_donacion" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado:</label>
                        <select id="estado" name="estado" class="form-select">
                            <option value="Pendiente">Pendiente</option>
                            <option value="Aceptada">Aceptada</option>
                            <option value="Rechazada">Rechazada</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tipo_donacion" class="form-label">Tipo de Donación:</label>
                        <select id="tipo_donacion" name="tipo_donacion" class="form-select">
                            <option value="Producto">Producto</option>
                            <option value="Alimento">Alimento</option>
                            <option value="Producto y Alimento">Producto y Alimento</option>
                            <option value="Servicio">Servicio</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="idsolicitud" class="form-label">ID de Solicitud:</label>
                        <input type="number" id="idsolicitud" name="idsolicitud" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="imagen_donacion" class="form-label">Imagen de la Donación:</label>
                        <input type="file" id="imagen_donacion" name="imagen_donacion" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="estado_donacion" class="form-label">Estado de la Donación:</label>
                        <select id="estado_donacion" name="estado_donacion" class="form-select">
                            <option value="Producto">Pendiente</option>
                            <option value="Alimento">Entregada</option>

                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Continuar</button>
                </form>
            </div>

        </div> -->

    </main>

    <!-- Pie de página -->
    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>