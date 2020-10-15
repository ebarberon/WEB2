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

}
?>