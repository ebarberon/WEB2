<?php

class usersModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpe;charset=utf8', 'root','');
    }

    function getByEmail($email){
        $query=$this->db->prepare('SELECT*FROM user WHERE email =?');
        $query->execute([$email]);
        
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function revisionEmail($email){
        $query=$this->db->prepare('SELECT*FROM user WHERE email =?');
        $query->execute([$email]);
        $checkedMail = $query->fetch(PDO::FETCH_OBJ);
        
        return $checkedMail;
    }

    function registrarUsuario($email, $pass){
        $query=$this->db->prepare('INSERT INTO `user` (`email`, `password`, `admin`) VALUES (?,?,?)');
        $query->execute([$email, $pass, 0]);
        return $this->db->lastInsertId();
    }

    function obtenerUsuarios(){
        $query=$this->db->prepare('SELECT*FROM user');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function makeAdmin($id_user){
        $query=$this->db->prepare('UPDATE `user` SET `admin`=? WHERE `id_user`=?');
        $query->execute(['1', $id_user]);
    }

    function makeUser($id_user){
        $query=$this->db->prepare('UPDATE `user` SET `admin`=? WHERE `id_user` =?');
        $query->execute(['0', $id_user]);
    }

    function deleteUser($id_user){
        $query=$this->db->prepare('DELETE FROM `user` WHERE `id_user` =?');
        $query->execute([$id_user]);
    }

}
