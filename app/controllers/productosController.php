<?php

require_once dirname(__FILE__). '/../views/productosView.php';
require_once dirname(__FILE__). '/../models/productosModel.php';
require_once dirname(__FILE__). '/../models/categoriasModel.php';

class productosController{

    private $viewProductos;
    private $modelProductos;
    private $modelCategorias;

    function __construct(){
        $this->viewProductos = new productosView();
        $this->modelProductos = new productosModel();
        $this->modelCategorias = new categoriasModel();
    }
    
    function showHome(){
        $this->check();   
        $productos = $this->modelProductos->obtenerProductos();
        $categorias = $this->modelCategorias->obtenerCategorias();
        $this->viewProductos->showHome($productos, $categorias);
    }
    function showProductos($params = null){
        $id_categoria = $params[':ID'];
        $productos = $this->modelProductos->obtenerProductos();
        $this->viewProductos->mostrarProductos($productos, $id_categoria);
    }

    function showProducto($params = null){
        $this->check(); 
        $id_producto = $params[':ID'];
        $this->viewProductos->mostrarProducto($id_producto);
    }

    function showAdmin(){
        $this->checkLogged();
        $productos = $this->modelProductos->obtenerProductos();
        $categorias = $this->modelCategorias->obtenerCategorias();
        $this->viewProductos->mostrarAdmin($productos, $categorias);
    }

    function insertProducto(){
        $this->modelProductos->insertarProducto($_POST['input_nombre'],$_POST['input_descripcion'],$_POST['input_id_categoria']);
        $this->viewProductos->showAdminlocation();
    }

    function borrarProducto($params = null){
        $id_producto = $params[':ID'];
        $this->modelProductos->borrarProducto($id_producto);
        $this->viewProductos->showAdminLocation();
    }

    function editarProducto($params = null){
        $id_producto = $params[':ID'];
        $nombre = $params[':NOMBRE'];
        $descripcion = $params[':DESCRIPCION'];
        $id_categoria = $params[':ID_CATEGORIA'];
        $categorias = $this->modelCategorias->obtenerCategorias();
        $this->viewProductos->editProducto($id_producto, $nombre, $descripcion, $id_categoria, $categorias);
    }

    function checkLogged(){
        session_start();
        if(!isset($_SESSION['ADMIN'])){
            header("Location: ". BASE_URL . "home");
            die();
        }
    }

    function check(){
        session_start();
    }

    function confirmarEdicionProducto(){
        $this->modelProductos->editarProducto($_POST['input_id_producto_edit'],$_POST['input_nombre_edit'],$_POST['input_descripcion_edit'],$_POST['input_id_categoria_edit']);
        $this->viewProductos->showAdminLocation();
    }


}


