<?php

require_once("model/manager.php");


class UserManager extends Manager
{
    public function getLastUser(){
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, pseudo, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscirption FROM users ORDER BY id DESC
        LIMIT 1');
        $lastUser = $req->fetch();
        return $lastUser;
    }

    public function userCheck($pseudo, $password){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id,id_status,firstName, lastName, pseudo, password, mail, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscription FROM users WHERE pseudo = ? AND password= ? ');
        $req->execute(array($pseudo, $password));
        $userCheck = $req->fetch();
        return $userCheck;
    }
}