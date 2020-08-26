<?php

require_once("model/manager.php");


class VariousManager extends Manager
{
    public function getBio()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id,author, title, LEFT( content, 296 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM various WHERE id = 1');
        $bio = $req->fetch();
        return $bio;
    }
    public function getSyn()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id,author, title, LEFT( content, 300 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM various WHERE id = 2');
        $syn = $req->fetch();
        return $syn;
    }
}