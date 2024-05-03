<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="<?= base_url('assets/images/logo/logocolor.png') ?>" alt="Sistema de Donaciones" class="img-fluid" style="max-width: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('#inicio') ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('#quienes-somos') ?>">Quiénes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('#equipo') ?>">Equipo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('#contacto') ?>">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('#preguntas-frecuentes') ?>">Preguntas Frecuentes</a>
                </li>
                <li class="nav-item dropdown">
                    <?php if (session()->has('loggedUser')) : ?>
                        <?php
                        $userData = session()->get('loggedUser');
                        ?>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> Hola <?php echo $userData['userName']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $rol = $userData['userRole'];
                            switch ($rol) {
                                case 'Administrador':
                            ?>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Admin/admin_dashboard') ?>">Panel de
                                            Control</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Admin/admin_usuarios') ?>">Usuarios</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Admin/admin_donaciones') ?>">Donaciones</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Admin/admin_solicitudes') ?>">Solicitudes</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Admin/admin_postulaciones') ?>">Postulaciones</a>
                                    </li>
                                <?php
                                    break;
                                case 'Donante':
                                ?>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Donante/donante_dashboard') ?>">Panel de Control</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Donante/donante_donaciones') ?>">Mis Donaciones</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Donante/donante_solicitudes') ?>">Solicitudes de Donación</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Donante/donante_mensajes') ?>">Mensajes</a> </li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Donante/donante_perfil') ?>">Mi Perfil</a>
                                    </li>
                                <?php
                                    break;
                                case 'Receptor':
                                ?>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Receptor/receptor_dashboard') ?>">Panel de Control</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Receptor/receptor_solicitudes') ?>">Mis Solicitudes</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Receptor/receptor_donaciones') ?>">Donaciones Recibidas</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Receptor/receptor_mensajes') ?>">Mensajes</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Receptor/receptor_perfil') ?>">Mi Perfil</a></li>
                                <?php
                                    break;
                                case 'Voluntario':
                                ?>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Voluntario/voluntario_dashboard') ?>">Panel de Control</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Voluntario/voluntario_postulaciones') ?>">Mis Postulaciones</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Voluntario/voluntario_coordinacion') ?>">Coordinacion</a> </li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Voluntario/voluntario_mensajes') ?>">Mensajes</a> </li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Voluntario/voluntario_participacion') ?>">Mis participaciones</a> </li>



                            <?php
                                    break;
                                default:
                                    break;
                            }
                            ?>
                            <li><a class="dropdown-item" href="<?php echo base_url('Auth/logout') ?>">Cerrar
                                    Sesión</a></li>
                        </ul>
                    <?php else : ?>
                        <a class="nav-link" href="<?php echo base_url('Auth/login') ?>"> Iniciar
                            Sesión</a>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Auth/register') ?>">Registrarse</a></li>
            <?php endif; ?>
            </li>
            </ul>
        </div>
    </div>
</nav>