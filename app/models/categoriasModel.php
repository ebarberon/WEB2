<?php

class categoriasModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpe;charset=utf8', 'root','');
    }

    function obtenerCategorias(){
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();
        $categoria = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $categoria;
    }

    function insertarCategoria($nombre){
        $query = $this->db->prepare('INSERT INTO categoria (nombre_categoria) VALUE (?)');
        $query->execute([$nombre]);
    }

    function borrarCategoria($id_categoria){
        $query = $this->db->prepare('DELETE FROM categoria WHERE id_categoria=(?)');
        $query->execute([$id_categoria]);
    }
    function editarCategoria($id_categoria, $nombre){
        $query = $this->db ->prepare('UPDATE categoria SET nombre_categoria=? WHERE id_categoria=?');
        $query->execute([$nombre,$id_categoria]);
    }
    
}
?>