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
        $categorias = $this->modelCategorias->obtenerCategorias();
        $this->viewCategorias->mostrarHeader($categorias);
    }

    function borrarCategoria($id_categoria){
        $this->modelCategorias->borrarCategoria($id_categoria);
        $this->viewCategorias->showAdminLocation();
    }

    function editarCategoria($id_categoria){
        $this->viewCategorias->editCategoria($id_categoria);
    }

    function confirmarEdicionCategoria(){
        $this->modelCategorias->editarCategoria($_POST['input_id_categoria_edit'],$_POST['input_nombre_edit']);
        $this->viewCategorias->showAdminLocation();
    }

}
?>