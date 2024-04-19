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
            <h1>Solicitar Donación</h1>
            <form action="<?= site_url('Forms/_form_solicitud/guardar_solicitud') ?>" method="post">
                <!-- <div class="form-group">
                    <label for="IDReceptor">ID del Receptor:</label>
                    <input type="text" class="form-control" id="IDReceptor" name="IDReceptor">
                </div> -->
                <!-- <div class="form-group">
                    <label for="FechaSolicitud">Fecha de Solicitud:</label>
                    <input type="date" class="form-control" id="FechaSolicitud" name="FechaSolicitud">
                </div> -->
                <!-- <div class="form-group">
                    <label for="EstadoSolicitud">Estado de Solicitud:</label>
                    <input type="text" class="form-control" id="EstadoSolicitud" name="EstadoSolicitud">
                </div> -->
                <div class="form-group">
                    <label for="Cantidad">Cantidad:</label>
                    <input type="text" class="form-control" id="Cantidad" name="Cantidad">
                </div>
                <div class="form-group">
                    <label for="DescripcionNecesidad">Descripción de la Necesidad:</label>
                    <textarea class="form-control" id="DescripcionNecesidad" name="DescripcionNecesidad" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="Prioridad">Prioridad:</label>
                    <select class="form-control" id="Prioridad" name="Prioridad">
                        <option value="Baja">Baja</option>

                        <option value="Media">Media</option>
                        <option value="Alta">Alta</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="FechaLimiteEntrega">Fecha Límite de Entrega:</label>
                    <input type="date" class="form-control" id="FechaLimiteEntrega" name="FechaLimiteEntrega">
                </div>
                <div class="form-group">
                    <label for="InstruccionesEntrega">Instrucciones de Entrega:</label>
                    <textarea class="form-control" id="InstruccionesEntrega" name="InstruccionesEntrega" rows="3"></textarea>
                </div>
                <!-- <div class="form-group">
                    <label for="ConfirmacionRecepcion">Confirmación de Recepción:</label>
                    <input type="text" class="form-control" id="ConfirmacionRecepcion" name="ConfirmacionRecepcion">
                </div> -->

                <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
            </form>
        </div>

    </main>

    <!-- Pie de página -->
    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>