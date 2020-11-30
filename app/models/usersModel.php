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

    }

}
?>