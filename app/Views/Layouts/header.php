<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Sistema de Donaciones'; ?></title>
    <!-- Agregar enlaces a archivos CSS -->
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="/">Sistema de Donaciones</a>
            </div>
            <ul>
                <li><a href="/">Inicio</a></li>
                <li><a href="/about">Quiénes Somos</a></li>
                <li><a href="/products">Productos</a></li>
                <li><a href="/contact">Contacto</a></li>
                <li><a href="/faq">Preguntas Frecuentes</a></li>
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <li><a href="/dashboard">Mi Cuenta</a></li>
                    <li><a href="/logout">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li><a href="/login">Iniciar Sesión</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>