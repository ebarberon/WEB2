<?php

require_once "././libs/smarty/Smarty.class.php";

class usersView{

    function __construct(){

    }

    function showLogin(){
        $smarty = new Smarty();

        $smarty->display('templates/formLogin.tpl');

    }

    function showSignUp(){
        $smarty = new Smarty();

        $smarty->display('templates/signUpForm.tpl');
    }

    function showError($msg){

        $smarty = new Smarty();
        $smarty->assign('msg', $msg);

        $smarty->display('templates/showErrorLogin.tpl');
    }

    function showErrorSignUp($msg){

        $smarty = new Smarty();
        $smarty->assign('msg', $msg);

        $smarty->display('templates/showErrorSignUp.tpl');
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }
}

?>