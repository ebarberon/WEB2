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
}
?>