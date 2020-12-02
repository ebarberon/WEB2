<?php   
require_once './app/models/commentsModel.php';
require_once 'apiView.php';
require_once 'apiController.php';

class apiCommentsController extends apiController {

    function __construct(){
        parent::__construct();
        $this->model = new commentsModel();
        $this->view = new apiView();
    }

    function getAllComments(){
        $comments = $this->model->getAllComments();
        $this->view->response($comments, '200');
    }

    function getCommentsOfID($params = null){
        $id = $params[':ID'];
        $comments = $this->model->getCommentsOfID($id);
        $this->view->response($comments, '200');
    }

    function deleteComment($params = null){
        $id = $params[':ID'];
        $this->model->deleteComment($id);
    }

    function insertComment(){
        $body = $this->getData();
        $this->model->insertComment($body->puntaje,$body->comentario,$body->id_user,$body->id_producto);
    }

}