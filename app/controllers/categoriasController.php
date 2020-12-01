<?php

require_once dirname(__FILE__). '/../views/categoriasView.php';
require_once dirname(__FILE__). '/../models/categoriasModel.php';

class categoriasController{

    private $viewCategorias;
    private $modelCategorias;

    function __construct(){
        $this->viewCategorias = new categoriasView();
        $this->modelCategorias = new categoriasModel();
    }
    
    function insertCategoria(){
        $this->modelCategorias->insertarCategoria($_POST['input_nombre']);
        $this->viewCategorias->showAdminLocation();
    }

    function obtenerCategorias(){
        $this->check();
        $categorias = $this->modelCategorias->obtenerCategorias();
        $this->viewCategorias->mostrarHeader($categorias);
    }

    function borrarCategoria($params = null){
        $id_categoria = $params[':ID'];
        $this->modelCategorias->borrarCategoria($id_categoria);
        $this->viewCategorias->showAdminLocation();
    }

    function editarCategoria($params = null){
        $id_categoria = $params[':ID'];
        $nombre = $params[':NOMBRE'];
        $this->viewCategorias->editCategoria($id_categoria, $nombre);
    }

    function confirmarEdicionCategoria(){
        $this->modelCategorias->editarCategoria($_POST['input_id_categoria_edit'],$_POST['input_nombre_edit']);
        $this->viewCategorias->showAdminLocation();
    }

    function check(){
        session_start();
    }
}
?>