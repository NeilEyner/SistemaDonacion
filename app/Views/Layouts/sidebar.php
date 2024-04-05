<aside class="sidebar">
    <ul>
        <?php if ($_SESSION['rol'] === 'Administrador'): ?>
            <li><a href="/admin/dashboard">Panel de Control</a></li>
            <li><a href="/admin/usuarios">Usuarios</a></li>
            <li><a href="/admin/donaciones">Donaciones</a></li>
            <li><a href="/admin/solicitudes">Solicitudes</a></li>
            <li><a href="/admin/postulaciones">Postulaciones</a></li>
        <?php elseif ($_SESSION['rol'] === 'Donante'): ?>
            <li><a href="/donante/dashboard">Panel de Control</a></li>
            <li><a href="/donante/donaciones">Mis Donaciones</a></li>
            <li><a href="/donante/solicitudes">Solicitudes de Donación</a></li>
            <li><a href="/donante/perfil">Mi Perfil</a></li>
        <?php elseif ($_SESSION['rol'] === 'Receptor'): ?>
            <li><a href="/receptor/dashboard">Panel de Control</a></li>
            <li><a href="/receptor/solicitudes">Mis Solicitudes</a></li>
            <li><a href="/receptor/donaciones">Donaciones Recibidas</a></li>
            <li><a href="/receptor/perfil">Mi Perfil</a></li>
        <?php elseif ($_SESSION['rol'] === 'Voluntario'): ?>
            <li><a href="/voluntario/dashboard">Panel de Control</a></li>
            <li><a href="/voluntario/postulaciones">Mis Postulaciones</a></li>
            <li><a href="/voluntario/perfil">Mi Perfil</a></li>
        <?php else: ?>
            <li><a href="/about">Quiénes Somos</a></li>
            <li><a href="/products">Productos</a></li>
            <li><a href="/contact">Contacto</a></li>
            <li><a href="/faq">Preguntas Frecuentes</a></li>
        <?php endif; ?>
    </ul>
</aside>