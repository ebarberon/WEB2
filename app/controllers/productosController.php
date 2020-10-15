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
        $productos = $this->modelProductos->obtenerProductos();
        $categorias = $this->modelCategorias->obtenerCategorias();
        $this->viewProductos->showHome($productos, $categorias);
    }
    function showProductos($id_categoria){
        $productos = $this->modelProductos->obtenerProductos();
        $this->viewProductos->mostrarProductos($productos, $id_categoria);
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

    function borrarProducto($id_producto){
        $this->modelProductos->borrarProducto($id_producto);
        $this->viewProductos->showAdminLocation();
    }

    function editarProducto($id_producto, $nombre, $descripcion, $id_categoria){
        $categorias = $this->modelCategorias->obtenerCategorias();
        $this->viewProductos->editProducto($id_producto, $nombre, $descripcion, $id_categoria, $categorias);
    }

    function checkLogged(){
        session_start();
        if(!isset($_SESSION['ID_USER'])){
            header("Location: ". BASE_URL . "login");
            die();
        } 
    }



}
?>