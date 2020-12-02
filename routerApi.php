<?php
require_once 'RouterClass.php';
require_once 'api/apiCommentsController.php';

$r = new Router();

// armo la tabla de ruteo de la API REST
$r->addRoute('comments', 'GET', 'apiCommentsController', 'getAllComments');
$r->addRoute('comments/:ID', 'GET', 'apiCommentsController', 'getComment');
$r->addRoute('comments/:ID', 'DELETE', 'apiCommentsController', 'deleteComment');
$r->addRoute('comments', 'POST', 'apiCommentsController', 'insertComment');



$r->addRoute('tareas/:ID', 'GET', 'ApiTasksController', 'GetTask');
$r->addRoute('tareas/:ID', 'DELETE', 'ApiTasksController', 'DeleteTask');
$r->addRoute('tareas', 'POST', 'ApiTasksController', 'InsertTask');
$r->addRoute('tareas/:ID', 'PUT', 'ApiTasksController', 'UpdateTask');


 //run
 $r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 
