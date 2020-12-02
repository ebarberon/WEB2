<?php

require_once "././libs/smarty/Smarty.class.php";

class productosView{

    function __construct(){

    }

    function mostrarProductos($productos, $id_categoria) {
        $smarty = new Smarty();
        $smarty->assign('collection', $productos);
        $smarty->assign('id_categoria', $id_categoria);

        $smarty->display('templates/showProductos.tpl');
    }

    function mostrarAdmin($productos, $categorias){
        $smarty = new Smarty();
        $smarty->assign('productos', $productos);
        $smarty->assign('categorias', $categorias);

        
        $smarty->display('templates/admin.tpl');
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function showAdminLocation(){
        header("Location: ".BASE_URL."admin");
    }

    function showHome($productos, $categorias){
        $smarty = new Smarty();
        $smarty->assign('productos', $productos);
        $smarty->assign('categorias', $categorias);

        $smarty->display('templates/showHome.tpl');
    }

    function editProducto($id_producto, $nombre, $descripcion, $id_categoria, $categorias){
        $smarty = new Smarty();
        $smarty->assign('id_producto', $id_producto);
        $smarty->assign('nombre', $nombre);
        $smarty->assign('descripcion', $descripcion);
        $smarty->assign('id_categoria', $id_categoria);
        $smarty->assign('categorias', $categorias);

        $smarty->display('templates/editProducto.tpl');

    }

    function mostrarProducto($id_producto) {
        $smarty = new Smarty();
        $smarty->assign('id_producto', $id_producto);
        
        $smarty->display('templates/showProducto.tpl');
    }

}
?>