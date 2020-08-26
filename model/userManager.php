<?php

require_once("model/manager.php");


class UserManager extends Manager
{
    public function getLastUser()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, pseudo, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscirption FROM users ORDER BY id DESC
        LIMIT 1');
        $lastUser = $req->fetch();
        return $lastUser;
    }
}