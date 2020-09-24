<?php

require_once("model/manager.php");


class UserManager extends Manager
{
    /* public function getLastUser(){
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, pseudo, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscirption FROM users ORDER BY id DESC
        LIMIT 1');
        $lastUser = $req->fetch();
        return $lastUser;
    } */

    public function getLastUser(){
        $sql = 'SELECT id, pseudo, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscirption FROM users ORDER BY id DESC
        LIMIT 1';
        $getLastUser = $this->executerRequete($sql);
        return $getLastUser->fetch();
    }

    /* public function userCheck($pseudo){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id,id_status,firstName, lastName, pseudo, password, mail, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscription FROM users WHERE pseudo = ? ');
        $req->execute(array($pseudo));
        $userCheck = $req->fetch();
        return $userCheck;
    } */

    public function userCheck($pseudo) {
        $sql = 'SELECT id,id_status,firstName, lastName, pseudo, password, mail, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscription FROM users WHERE pseudo = ? ';
        $userCheck = $this->executerRequete($sql, array($pseudo));
        return $userCheck->fetch(); 
    }

    /* public function addUser($lastName, $firstName, $pseudo, $password, $mail, $id_status)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO users(id_status, firstName, lastName, pseudo, password, mail, date_inscription) VALUES(?, ?, ?, ?, ?, ?,NOW())');
        $affectedLines = $comments->execute(array($id_status, $firstName, $lastName, $pseudo, $password, $mail));
    } */

    public function addUser($lastName, $firstName, $pseudo, $password, $mail, $id_status) {
        $sql = 'INSERT INTO users(id_status, firstName, lastName, pseudo, password, mail, date_inscription) VALUES(?, ?, ?, ?, ?, ?,NOW())';
        $addUser = $this->executerRequete($sql, array($id_status, $firstName, $lastName, $pseudo, $password, $mail));
        return $addUser->fetch();
    }
}