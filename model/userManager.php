<?php

require_once("model/manager.php");


class UserManager extends Manager
{
    
    public function getLastUser(){
        $sql = 'SELECT id, pseudo, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscirption FROM users ORDER BY id DESC
        LIMIT 1';
        $getLastUser = $this->executerRequete($sql);
        return $getLastUser->fetch();
    }

    public function userCheck($pseudo) {
        $sql = 'SELECT id,id_status,firstName, lastName, pseudo, password, mail, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscription FROM users WHERE pseudo = ? ';
        $userCheck = $this->executerRequete($sql, array($pseudo));
        return $userCheck->fetch(); 
    }

    public function addUser($lastName, $firstName, $pseudo, $password, $mail, $id_status) {
        $sql = 'INSERT INTO users(id_status, firstName, lastName, pseudo, password, mail, date_inscription) VALUES(?, ?, ?, ?, ?, ?,NOW())';
        $addUser = $this->executerRequete($sql, array($id_status, $firstName, $lastName, $pseudo, $password, $mail));
        return $addUser->fetch();
    }
}