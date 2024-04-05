<?php
// Ruta principal
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/':
        require_once 'Views/home.php';
        break;
    case '/about':
        require_once 'Views/about.php';
        break;
    case '/products':
        require_once 'Views/products.php';
        break;
    case '/contact':
        require_once 'Views/contact.php';
        break;
    case '/faq':
        require_once 'Views/faq.php';
        break;
    case '/login':
        require_once 'Views/Auth/login.php';
        break;
    case '/register':
        require_once 'Views/Auth/register.php';
        break;
    case '/logout':
        // Destruir la sesión
        session_unset();
        session_destroy();
        header('Location: /');
        break;
    case '/dashboard':
        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: /login');
            exit;
        }
        require_once 'Views/dashboard.php';
        break;
    // Otras rutas para las diferentes secciones del sistema
    default:
        http_response_code(404);
        require_once 'Views/Errors/error_404.php';
        break;
}