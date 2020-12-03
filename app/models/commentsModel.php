<?php

class commentsModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpe;charset=utf8', 'root','');
    }

    function getAllComments(){
        $query = $this->db->prepare('SELECT * FROM comments');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCommentsOfID($id){
        $query = $this->db->prepare('SELECT comments.id_comments , comments.puntaje, comments.comentario, user.email, comments.id_producto FROM comments INNER JOIN user ON comments.id_user = user.id_user  WHERE id_producto=?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function deleteComment($id){
        $query = $this->db->prepare('DELETE FROM comments WHERE id_comments=?');
        $query->execute([$id]);
    }

    function insertComment($puntaje,$comentario,$id_user,$id_producto){
        $query = $this->db->prepare('INSERT INTO comments (puntaje, comentario, id_user, id_producto) VALUES (?,?,?,?) ');
        $query->execute([$puntaje,$comentario,$id_user,$id_producto]);
        return $this->db->lastInsertId();
    }

}