<?php

require_once "././libs/smarty/Smarty.class.php";

class usersView{

    function __construct(){

    }

    function showLogin(){
        $smarty = new Smarty();

        $smarty->display('templates/formLogin.tpl');

    }

    function showError($msg){

        $smarty = new Smarty();
        $smarty->assign('msg', $msg);

        $smarty->display('templates/showErrorLogin.tpl');


    }
}

?>