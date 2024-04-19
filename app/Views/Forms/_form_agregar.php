<?php
//la sesión
$session = session()

?>
<?= $this->include('Layouts/header.php'); ?>
<style>
    /* Estilo adicional */
    .modal {
        display: none;
        /* Ocultar el modal por defecto */
        position: fixed;
        /* Permite que el modal cubra toda la pantalla */
        z-index: 1;
        /* Ubicar el modal por encima de otros elementos */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        /* Habilitar el scroll si el contenido es más grande */
        background-color: rgb(0, 0, 0);
        /* Fondo negro semi-transparente */
        background-color: rgba(0, 0, 0, 0.4);
        /* Fondo negro semi-transparente */
        padding-top: 60px;
        /* Espacio para los elementos fijados en la parte superior */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        /* Centrar el modal verticalmente */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Ancho del modal */
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<body class="">
    <!-- Barra de navegación -->
    <?= $this->include('Layouts/nav.php'); ?>

    <!-- Contenido principal -->
    <main>


        <div class="container">
            <div class="container mt-5">
                <h1 class="mb-4">Formulario de Donación</h1>
                <!-- Mostrar ID de la donación -->
                <p>ID de la donación: <?= $donacion['IDDonacion'] ?></p>

                <!-- Mostrar detalles de la solicitud -->
                <h2>Detalles de la Solicitud:</h2>
                <p>ID de la solicitud: <?= isset($solicitud['IDSolicitud']) ? $solicitud['IDSolicitud'] : 'No disponible' ?></p>
                <p>Fecha de la solicitud: <?= isset($solicitud['FechaSolicitud']) ? $solicitud['FechaSolicitud'] : 'No disponible' ?></p>
                <p>Estado de la solicitud: <?= isset($solicitud['EstadoSolicitud']) ? $solicitud['EstadoSolicitud'] : 'No disponible' ?></p>
                <p>Cantidad solicitada: <?= isset($solicitud['Cantidad']) ? $solicitud['Cantidad'] : 'No disponible' ?></p>
                <!-- Ajusta esto según la estructura real de tu solicitud -->


            </div>
            <!-- Botones para agregar alimentos y productos -->
            <button type="button" onclick="abrirModal('modal_producto')">Agregar Producto</button>
            <button type="button" onclick="abrirModal('modal_alimento')">Agregar Alimento</button><br><br>
            <button onclick="window.location.href='<?= base_url('Donante/donante_donaciones') ?>'" class="btn btn-primary">Donar</button>

            <h1>Detalles de Donación</h1>

            <?php if (!empty($productos)) : ?>
                <h2>Productos</h2>
                <ul>
                    <?php foreach ($productos as $producto) : ?>
                        <li>
                            <p>ID de Producto Donado: <?= $producto['IDProductoDonado'] ?></p>
                            <p>Nombre: <?= $producto['Nombre'] ?></p>
                            <p>Marca: <?= $producto['Marca'] ?></p>
                            <p>Cantidad: <?= $producto['Cantidad'] ?></p>
                            <p>Descripción: <?= $producto['Descripcion'] ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if (!empty($alimentos)) : ?>
                <h2>Alimentos</h2>
                <ul>
                    <?php foreach ($alimentos as $alimento) : ?>
                        <li>
                            <p>ID de Alimento: <?= $alimento['IDAlimento'] ?></p>
                            <p>Nombre: <?= $alimento['Nombre'] ?></p>
                            <p>Tipo: <?= $alimento['Tipo'] ?></p>
                            <p>Cantidad: <?= $alimento['Cantidad'] ?></p>
                            <p>Fecha de Vencimiento: <?= $alimento['FechaVencimiento'] ?></p>
                            <p>Detalles: <?= $alimento['Detalles'] ?></p>
                            <p>Temperatura de Almacenamiento: <?= $alimento['TemperaturaAlmacenamiento'] ?></p>
                            <p>Estado de Calidad: <?= $alimento['EstadoCalidad'] ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <!-- Modal para agregar productos -->
            <div id="modal_producto" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="cerrarModal('modal_producto')">&times;</span>
                    <h2>Agregar Producto</h2>
                    <form action="<?= base_url('Forms/_form_agregar/addProducto/' . $donacion['IDDonacion']) ?>" method="post">
                        <div class="mb-3">
                            <label for="nombre_producto_modal" class="form-label">Nombre del Producto:</label>
                            <input type="text" id="nombre_producto_modal" name="nombre_producto_modal" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="marca_producto_modal" class="form-label">Marca del Producto:</label>
                            <input type="text" id="marca_producto_modal" name="marca_producto_modal" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="cantidad_producto_modal" class="form-label">Cantidad del Producto:</label>
                            <input type="number" id="cantidad_producto_modal" name="cantidad_producto_modal" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion_producto_modal" class="form-label">Descripción del Producto:</label>
                            <textarea id="descripcion_producto_modal" name="descripcion_producto_modal" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Agregar Producto</button>
                    </form>
                </div>
            </div>

            <!-- Modal para agregar alimentos -->
            <div id="modal_alimento" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="cerrarModal('modal_alimento')">&times;</span>
                    <h2>Agregar Alimento</h2>
                    <form action="<?= base_url('Forms/_form_agregar/addProducto/' . $donacion['IDDonacion']) ?>" method="post">
                        <div class="mb-3">
                            <label for="nombre_alimento_modal" class="form-label">Nombre del Alimento:</label>
                            <input type="text" id="nombre_alimento_modal" name="nombre_alimento_modal" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="tipo_alimento_modal" class="form-label">Tipo de Alimento:</label>
                            <select id="tipo_alimento_modal" name="tipo_alimento_modal" class="form-select">
                                <option value="No perecedero">No perecedero</option>
                                <option value="Perecedero">Perecedero</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="cantidad_alimento_modal" class="form-label">Cantidad del Alimento:</label>
                            <input type="number" id="cantidad_alimento_modal" name="cantidad_alimento_modal" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_vencimiento_alimento_modal" class="form-label">Fecha de Vencimiento:</label>
                            <input type="date" id="fecha_vencimiento_alimento_modal" name="fecha_vencimiento_alimento_modal" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="detalles_alimento_modal" class="form-label">Detalles del Alimento:</label>
                            <textarea id="detalles_alimento_modal" name="detalles_alimento_modal" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="temperatura_almacenamiento_alimento_modal" class="form-label">Temperatura de Almacenamiento:</label>
                            <input type="text" id="temperatura_almacenamiento_alimento_modal" name="temperatura_almacenamiento_alimento_modal" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="estado_calidad_alimento_modal" class="form-label">Estado de Calidad:</label>
                            <select id="estado_calidad_alimento_modal" name="estado_calidad_alimento_modal" class="form-select">
                                <option value="Excelente">Excelente</option>
                                <option value="Bueno">Bueno</option>
                                <option value="Regular">Regular</option>
                                <option value="Malo">Malo</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Agregar Alimento</button>
                    </form>
                </div>
            </div>


            <!-- Script para abrir y cerrar modales -->
            <script>
                function abrirModal(idModal) {
                    var modal = document.getElementById(idModal);
                    modal.style.display = "block";
                }

                function cerrarModal(idModal) {
                    var modal = document.getElementById(idModal);
                    modal.style.display = "none";
                }
            </script>
        </div>

    </main>

    <!-- Pie de página -->
    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>