<?php

require_once "././libs/smarty/Smarty.class.php";

class categoriasView{
    
    function __construct(){

    }
    
    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function showAdminLocation(){
        header("Location: ".BASE_URL."admin");
    }

    function mostrarHeader($categorias){
        $smarty = new Smarty();
        $smarty->assign('collection', $categorias);

        $smarty->display('templates/showCategorias.tpl');
    }

    function editCategoria($id_categoria, $nombre){
        $smarty = new Smarty();
        $smarty->assign('id_categoria', $id_categoria);
        $smarty->assign('nombre', $nombre);


        $smarty->display('templates/editCategoria.tpl');
    }
}
?>