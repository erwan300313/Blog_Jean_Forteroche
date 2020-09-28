<?php

require_once("model/manager.php");


class PostManager extends Manager{

    /* public function lastPost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id,author, title, LEFT( content, 300 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts ORDER BY id DESC LIMIT 1');
        $lastPost = $req->fetch();
        return $lastPost;
    } */

    public function lastPost() {
        $sql = 'SELECT id,author, title, LEFT( content, 300 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts ORDER BY id DESC LIMIT 1';
        $lastPost = $this->executerRequete($sql);
        return $lastPost->fetch();
    }

    /* public function indexPost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id,author, title, LEFT( content, 600 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts LIMIT 0,2');
        return $req;
    } */

    public function indexPost() {
        $sql = 'SELECT id,author, title, LEFT( content, 600 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts LIMIT 0,2';
        $indexPost = $this->executerRequete($sql);
        return $indexPost;
    }

    /* public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id,author, title, LEFT( content, 600 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts');
        return $req;
    } */

    public function getPosts() {
        $sql = 'SELECT id,author, title, LEFT( content, 600 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts';
        $getPosts = $this->executerRequete($sql);
        return $getPosts;
    }

    /* public function getPost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id,author, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts WHERE id = ?');
        $req->execute(array($id));
        $getPost = $req->fetch();
        return $getPost;
    } */

    public function getPost($id) {
        $sql = 'SELECT id,author, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts WHERE id = ?';
        $getPost = $this->executerRequete($sql, array($id));
        return $getPost->fetch();  // Accès à la première ligne de résultat
    }

   /*  public function getExtractPost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id,author, title, LEFT( content, 600 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts WHERE id = ?');
        $req->execute(array($id));
        $getPost = $req->fetch();
        return $getPost;
    } */

    public function getExtractPost($id) {
        $sql = 'SELECT id,author, title, LEFT( content, 600 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts WHERE id = ?';
        $extactPost = $this->executerRequete($sql, array($id));
        return $extactPost->fetch();
    }


    /* public function addPost($author, $title, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts (author, title, content, date_creation) VALUES(?, ?, ?, NOW())');
        $affectedLines = $req->execute(array($author, $title, $content));
        $addPost = $db->lastInsertId();
        return $addPost;
    } */

    public function addPost($author, $title, $content) {
        $sql = 'INSERT INTO posts (author, title, content, date_creation) VALUES(?, ?, ?, NOW())';
        $addPost = $this->executerRequete($sql, array($author, $title, $content));
    }

    /* public function editPost($post_id, $content, $title)
    {
        $db=$this->dbConnect();
        $req= $db->prepare('UPDATE posts SET content = ?, title = ?, date_creation = NOW() WHERE id = ?');
        $affectedLines = $req->execute(array($content,$title, $post_id));
    } */

    public function editPost($post_id, $content, $title) {
        $sql = 'UPDATE posts SET content = ?, title = ?, date_creation = NOW() WHERE id = ?';
        $addPost = $this->executerRequete($sql, array($content,$title, $post_id));
    }

    /* public function deletePost($post_id)
    {
        $db=$this->dbConnect();
        $req= $db->prepare('DELETE FROM posts WHERE id = ?');
        $affectedLines = $req->execute(array($post_id));
    } */

    public function deletePost($post_id) {
        $sql = 'DELETE FROM posts WHERE id = ?';
        $addPost = $this->executerRequete($sql, array($post_id));
    }




}