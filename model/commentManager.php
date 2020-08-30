<?php

require_once("model/manager.php");


class CommentManager extends Manager
{
    public function getComments($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, post_id, author, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM comments WHERE post_id = ? ORDER BY date_creation DESC');
        $req->execute(array($id));
        return $req;
    }
}