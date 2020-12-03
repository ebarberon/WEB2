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

    function getCommentsOfID($params = null){
        $id = $params[':ID'];
        $comments = $this->model->getCommentsOfID($id);
        $this->view->response($comments, '200');
        
        //Con este codigo las paginas sin comentarios se nos llenaban de comentarios indefinidos y no supimos resolverlo
        // if ($comments) {
        //     $this->view->response($comments, '200');
        // } else {
        //     $this->view->response("No existe ese producto", 404);
        // }
    }

    function deleteComment($params = null){
        $id = $params[':ID'];
        $this->model->deleteComment($id);
    }

    function insertComment(){
        $body = $this->getData();
        $id = $this->model->insertComment($body->puntaje,$body->comentario,$body->id_user,$body->id_producto);

        if ($id > 0){
            $this->view->response("Se agrego el comentario $id correctamente", 201);
        } else {
            $this->view->response("No se pudo insertar el comentario", 500);
        }


    }

}