<?php $session = session() ?>
<?= $this->include('dashboard/d_header.php'); ?>




<main class="pt-4">
    <div class="container">
        <h1 class="display-4">Panel de Administrador</h1>
   
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-people"></i> Usuarios Registrados</h5>
                <p class="card-text">Total de usuarios registrados: <?= $totalUsuarios ?></p>
                <a href="<?= base_url(route_to('admin.usuarios')) ?>" class="btn btn-primary"><i class="bi bi-people"></i> Ver usuarios</a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-wallet2"></i> Donaciones Pendientes</h5>
                <p class="card-text">Total de donaciones pendientes: <?= $donacionesPendientes ?></p>
                <a href="<?= base_url(route_to('admin.donaciones')) ?>" class="btn btn-primary"><i class="bi bi-wallet2"></i> Administrar donaciones</a>
            </div>
        </div>

        <div class="container">
            <h2 class="mt-5">Panel de Administración</h2>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-person"></i> Usuarios</h5>
                            <p class="card-text">Gestiona los usuarios del sistema.</p>
                            <a href="<?= base_url('Admin/admin_usuarios') ?>" class="btn btn-primary"><i class="bi bi-person"></i> Ver Usuarios</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-currency-dollar"></i> Donaciones</h5>
                            <p class="card-text">Administra las donaciones recibidas.</p>
                            <a href="<?= base_url('Admin/admin_donaciones') ?>" class="btn btn-primary"><i class="bi bi-currency-dollar"></i> Ver Donaciones</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-chat-left"></i> Solicitudes</h5>
                            <p class="card-text">Gestiona las solicitudes de donación.</p>
                            <a href="<?= base_url('Admin/admin_solicitudes') ?>" class="btn btn-primary"><i class="bi bi-chat-left"></i> Ver Solicitudes</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-graph-up"></i> Estadísticas</h5>
                            <!-- Aquí puedes agregar gráficos o tablas con estadísticas -->
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-file-earmark-post"></i> Postulaciones</h5>
                            <p class="card-text">Gestiona las postulaciones de voluntarios.</p>
                            <a href="<?= base_url('Admin/admin_postulaciones') ?>" class="btn btn-primary"><i class="bi bi-file-earmark-post"></i> Ver Postulaciones</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- Pie de página -->
<?= $this->include('dashboard/d_footer.php'); ?>