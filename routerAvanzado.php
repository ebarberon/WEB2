<?php
    require_once 'app/controllers/categoriasController.php';
    require_once 'app/controllers/productosController.php';
    require_once 'app/controllers/usersController.php';
    require_once 'routerClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');


    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "productosController", "showHome");

    $r->addRoute("login", "GET", "usersController", "showLogin");
    $r->addRoute("verify", "POST", "usersController", "loginUser");
    $r->addRoute("admin", "GET", "productosController", "showAdmin");
    $r->addRoute("logout", "GET", "usersController", "logout");
    $r->addRoute("registration", "GET", "usersController", "showSignUp");
    $r->addRoute("userRegistration", "POST", "usersController", "userRegistration");

    $r->addRoute("categorias", "GET", "categoriasController", "obtenerCategorias");
    $r->addRoute("categoria/:ID", "GET", "productosController", "showProductos");
    $r->addRoute("comments/:ID", "GET", "productosController", "showProducto");


    $r->addRoute("insertProducto", "POST", "productosController", "insertProducto");
    $r->addRoute("insertCategoria", "POST", "categoriasController", "insertCategoria");
    $r->addRoute("borrarProducto/:ID", "GET", "productosController", "borrarProducto");
    $r->addRoute("borrarCategoria/:ID", "GET", "categoriasController", "borrarCategoria");
    $r->addRoute("editarProducto/:ID/:NOMBRE/:DESCRIPCION/:ID_CATEGORIA", "GET", "productosController", "editarProducto");
    $r->addRoute("editProductoConfirm", "POST", "productosController", "confirmarEdicionProducto");
    $r->addRoute("editarCategoria/:ID/:NOMBRE", "GET", "categoriasController", "editarCategoria");
    $r->addRoute("editCategoriaConfirm", "POST", "categoriasController", "confirmarEdicionCategoria");

    $r->addRoute("users", "GET", "usersController", "usersList");
    $r->addRoute("makeAdmin/:ID", "GET", "usersController", "makeAdmin");
    $r->addRoute("makeUser/:ID", "GET", "usersController", "makeUser");
    $r->addRoute("deleteUser/:ID", "GET", "usersController", "deleteUser");


    //Ruta por defecto.
    $r->setDefaultRoute("productosController", "showHome");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>
