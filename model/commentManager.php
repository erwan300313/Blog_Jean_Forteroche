<?php

require_once("model/manager.php");


class CommentManager extends Manager
{
    public function getComments($post_id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, post_id, author, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM comments WHERE post_id = ? ORDER BY id DESC');
        $req->execute(array($post_id));
        return $req;
    }

    public function addComment($post_id, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, content, date_creation) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($post_id, $author, $comment));

        return $affectedLines;
    }
}