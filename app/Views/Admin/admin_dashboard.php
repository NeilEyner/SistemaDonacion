<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administrador</title>
    <!-- Agrega tus estilos CSS aquí -->
</head>
<body>
    <div class="container">
        <h1>Panel de Administrador</h1>
        <!-- Agrega tus elementos HTML aquí, como tarjetas informativas, gráficos, tablas de datos, etc. -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Usuarios Registrados</h5>
                <p class="card-text">Total de usuarios registrados: <?= $totalUsuarios ?></p>
                <a href="<?= route_to('admin.usuarios') ?>" class="btn btn-primary">Ver usuarios</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Donaciones Pendientes</h5>
                <p class="card-text">Total de donaciones pendientes: <?= $donacionesPendientes ?></p>
                <a href="<?= route_to('admin.donaciones') ?>" class="btn btn-primary">Administrar donaciones</a>
            </div>
        </div>

        <!-- Agrega más tarjetas o elementos según sea necesario -->
        <div class="container">
    <h1>Panel de Administración</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <p class="card-text">Gestiona los usuarios del sistema.</p>
                    <a href="<?= base_url('admin/usuarios') ?>" class="btn btn-primary">Ver Usuarios</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Donaciones</h5>
                    <p class="card-text">Administra las donaciones recibidas.</p>
                    <a href="<?= base_url('admin/donaciones') ?>" class="btn btn-primary">Ver Donaciones</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Solicitudes</h5>
                    <p class="card-text">Gestiona las solicitudes de donación.</p>
                    <a href="<?= base_url('admin/solicitudes') ?>" class="btn btn-primary">Ver Solicitudes</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Estadísticas</h5>
                    <!-- Aquí puedes agregar gráficos o tablas con estadísticas -->
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Postulaciones</h5>
                    <p class="card-text">Gestiona las postulaciones de voluntarios.</p>
                    <a href="<?= base_url('admin/postulaciones') ?>" class="btn btn-primary">Ver Postulaciones</a>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>

    <!-- Agrega tus scripts JavaScript aquí -->
</body>
</html>
