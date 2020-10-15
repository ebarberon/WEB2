<?php 

require_once 'app/controllers/productosController.php';
require_once 'app/controllers/categoriasController.php';
require_once 'app/controllers/usersController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$params = explode('/', $action);

$productoController = new productosController();
$categoriaController = new categoriasController();
$userController = new usersController();

switch ($params[0]) {
    case 'home':
        $productoController->showHome();
        break;
    case 'admin':
        $productoController->showAdmin();
        break;
    case 'insertProducto':
        $productoController->insertProducto();
        break;
    case 'insertCategoria':
        $categoriaController->insertCategoria();
        break;
    case 'categorias':
        $categoriaController->obtenerCategorias();
        break;
    case 'categoria':
        $productoController->showProductos($params[1]);
        break;
    case 'borrarProducto':
        $productoController->borrarProducto($params[1]);
        break;
    case 'borrarCategoria':
        $categoriaController->borrarCategoria($params[1]);
        break;
    case 'editarProducto':
        $productoController->editarProducto($params[1],$params[2],$params[3],$params[4]);
        break;
    case 'editProductoConfirm':
        $productoController->confirmarEdicionProducto();
        break;
    case 'editarCategoria':
        $categoriaController->editarCategoria($params[1]);
        break;
    case'editCategoriaConfirm':
        $categoriaController->confirmarEdicionCategoria();
        break;
    case 'login':
        $userController->showLogin();
        break;
    case 'verify':
        $userController->loginUser();
        break;
    case 'logout':
        $userController->logout();
        break;
    default:
    header("HTTP/1.0 404 Not Found");
    echo('404 Page not found');
    break;
}
