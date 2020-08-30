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

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id,author, title, LEFT( content, 600 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts');
        return $req;
    }

    public function getPost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id,author, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts WHERE id = ?');
        $req->execute(array($id));
        $getPost = $req->fetch();
        return $getPost;
    }

    public function getExtractPost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id,author, title, LEFT( content, 600 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts WHERE id = ?');
        $req->execute(array($id));
        $getPost = $req->fetch();
        return $getPost;
    }


}