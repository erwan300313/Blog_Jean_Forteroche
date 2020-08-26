<?php

require_once("model/manager.php");


class PostManager extends Manager
{
    public function lastPost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id,author, title, LEFT( content, 300 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts ORDER BY id DESC LIMIT 1');
        $lastPost = $req->fetch();
        return $lastPost;
    }

    public function indexPost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id,author, title, LEFT( content, 600 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts LIMIT 0,2');
        return $req;
    }


}