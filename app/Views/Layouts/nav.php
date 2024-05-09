<!-- <nav class="navbar navbar-expand-lg ">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('') ?>">
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
                        <?php $userData = session()->get('loggedUser'); ?>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> Hola <?php echo $userData['userName']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php $rol = $userData['userRole'];
                            switch ($rol) {
                                case 'Administrador': ?>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Admin/admin_dashboard') ?>">Panel de Control</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Admin/admin_usuarios') ?>">Usuarios</a> </li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Admin/admin_donaciones') ?>">Donaciones</a> </li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Admin/admin_solicitudes') ?>">Solicitudes</a> </li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Admin/admin_postulaciones') ?>">Postulaciones</a> </li>
                                <?php break;
                                case 'Donante': ?>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Donante/donante_dashboard') ?>">Panel de Control</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Donante/donante_donaciones') ?>">Mis Donaciones</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Donante/donante_solicitudes') ?>">Solicitudes de Donación</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Donante/donante_mensajes') ?>">Mensajes</a> </li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Donante/donante_perfil') ?>">Mi Perfil</a>
                                    </li>
                                <?php break;
                                case 'Receptor': ?>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Receptor/receptor_dashboard') ?>">Panel de Control</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Receptor/receptor_solicitudes') ?>">Mis Solicitudes</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Receptor/receptor_donaciones') ?>">Donaciones Recibidas</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Receptor/receptor_mensajes') ?>">Mensajes</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('/Receptor/receptor_perfil') ?>">Mi Perfil</a></li>
                                <?php break;
                                case 'Voluntario': ?>
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
                        <a class="nav-link" href="<?php echo base_url('Auth/login') ?>"> Iniciar Sesión</a>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Auth/register') ?>">Registrarse</a></li>
            <?php endif; ?>
            </li>
            </ul>
        </div>
    </div>
</nav> -->


<!-- Start Header -->
<header class="rn-header haeder-default black-logo-version header--fixed header--sticky">
    <div class="header-wrapper rn-popup-mobile-menu m--0 row align-items-center">
        <!-- Start Header Left -->
        <div class="col-lg-2 col-6">
            <div class="header-left">
                <div class="logo">
                    <a href="<?php echo base_url('') ?>">
                        <img src="<?= base_url('assets/images/logo/logocolor.png') ?>" alt="logo">
                    </a>
                </div>
            </div>
        </div>
        <!-- End Header Left -->
        <!-- Start Header Center -->
        <div class="col-lg-10 col-6">
            <div class="header-center">
                <nav id="sideNav" class="mainmenu-nav navbar-example2 d-none d-xl-block">
                    <!-- Start Mainmanu Nav -->
                    <ul class="primary-menu nav nav-pills">
                        <li class="nav-item"><a class="nav-link smoth-animation active" href="#home">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link smoth-animation" href="#features">Quiénes Somos</a></li>
                        <li class="nav-item"><a class="nav-link smoth-animation" href="#testimonial">Equipo</a></li>
                        <!-- <li class="nav-item"><a class="nav-link smoth-animation" href="#resume">Contacto</a></li> -->
                        <li class="nav-item"><a class="nav-link smoth-animation" href="#resume">Preguntas Frecuentes</a></li>
                        <!-- <li class="nav-item"><a class="nav-link smoth-animation" href="#pricing">Pricing</a></li> -->
                        <!-- <li class="nav-item"><a class="nav-link smoth-animation" href="#blog">blog</a></li> -->
                        <li class="nav-item"><a class="nav-link smoth-animation" href="#contacts">Contacto</a></li>
                        <!-- <li class="nav-item">
                            <?php if (session()->has('loggedUser')) : ?>
                                <?php $userData = session()->get('loggedUser'); ?>
                         
                    <?php else : ?>
                    <?php endif; ?>
                    </li> -->
                    </ul>
                    <!-- End Mainmanu Nav -->
                </nav>
                <!-- Start Header Right  -->
                <div class="header-right">
                    <?php if (session()->has('loggedUser')) : ?>
                        <?php $userData = session()->get('loggedUser'); ?>
                        <?php $rol = $userData['userRole'];
                        switch ($rol) {
                            case 'Administrador': ?>
                                <a class="rn-btn" href="<?php echo base_url('/Admin/admin_dashboard') ?>"></i> <?php echo $userData['userName']; ?> Panel de Control</a>
                            <?php break;
                            case 'Donante': ?>
                                <a class="rn-btn" href="<?php echo base_url('/Donante/donante_dashboard') ?>">  <?php echo $userData['userName']; ?> Panel de Control</a>
                            <?php break;
                            case 'Receptor': ?>
                                <a class="rn-btn" href="<?php echo base_url('/Receptor/receptor_dashboard') ?>">  <?php echo $userData['userName']; ?> Panel de Control</a>
                            <?php break;
                            case 'Voluntario': ?>
                                <a class="rn-btn" href="<?php echo base_url('/Voluntario/voluntario_dashboard') ?>">  <?php echo $userData['userName']; ?> Panel de Control</a>
                        <?php
                                break;
                            default:
                                break;
                        }
                        ?>
                        <a class="rn-btn" href="<?php echo base_url('Auth/logout') ?>">Cerrar Sesión</a></li>
                    <?php else : ?>
                        <a class="rn-btn" href="<?php echo base_url('Auth/login') ?>"><span>Iniciar Sesion</span></a>
                        <a class="rn-btn" href="<?php echo base_url('Auth/register') ?>"><span>Registrarse</span></a>
                    <?php endif; ?>
                    <div class="hamberger-menu d-block d-xl-none">
                        <i id="menuBtn" class="feather-menu humberger-menu"></i>
                    </div>
                    <div class="close-menu d-block">
                        <span class="closeTrigger"> <i data-feather="x"></i> </span>
                    </div>
                </div>

                <!-- End Header Right  -->
            </div>
        </div>
        <!-- End Header Center -->
    </div>
</header>
<!-- End Header Area -->
<!-- Start Popup Mobile Menu  -->
<div class="popup-mobile-menu">
    <div class="inner">
        <div class="menu-top">
            <div class="menu-header">
                <a class="logo" href="index.html">
                    <img src="<?= base_url('assets/images/logo/letras.png') ?>" alt="Personal Portfolio">
                </a>
                <div class="close-button">
                    <button class="close-menu-activation close"><i data-feather="x"></i></button>
                </div>
            </div>
            <p class="discription">Sistema de donacion. </p>
        </div>
        <div class="content">
            <ul class="primary-menu nav nav-pills">
                <li class="nav-item"><a class="nav-link smoth-animation active" href="#home">Inicio</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#features">Quiénes Somos</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#portfolio">Equipo</a></li>
                <!-- <li class="nav-item"><a class="nav-link smoth-animation" href="#resume">Contacto</a></li> -->
                <li class="nav-item"><a class="nav-link smoth-animation" href="#clients">Preguntas Frecuentes</a></li>
                <!-- <li class="nav-item"><a class="nav-link smoth-animation" href="#pricing">Pricing</a></li> -->
                <!-- <li class="nav-item"><a class="nav-link smoth-animation" href="#blog">blog</a></li> -->
                <li class="nav-item"><a class="nav-link smoth-animation" href="#contacts">Contacto</a></li>
                <li class="nav-item">
                    <?php if (session()->has('loggedUser')) : ?>
                        <?php $userData = session()->get('loggedUser'); ?>
                <li class="nav-item"><a class="nav-link smoth-animation" href=""> <i class="fas fa-user"></i> <?php echo $userData['userName']; ?> Dashboard </a></li>
            <?php else : ?>
            <?php endif; ?>
            </li>
            </ul>
            <!-- social sharea area -->
            <div class="social-share-style-1 mt--40">
                <span class="title">Encuentranos : </span>
                <ul class="social-share d-flex liststyle">
                    <li class="facebook"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg></a>
                    </li>
                    <li class="instagram"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg></a>
                    </li>
                    <li class="linkedin"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                <rect x="2" y="9" width="4" height="12"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg></a>
                    </li>
                </ul>
            </div>
            <!-- end -->
        </div>
    </div>
</div>
<!-- End Popup Mobile Menu  -->