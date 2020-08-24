<?php

require_once("model/manager.php");


class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id,author, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts');

        return $req;
    }
}