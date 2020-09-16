<?php

require_once("model/manager.php");


class CommentManager extends Manager
{
    public function getComments($post_id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, post_id, author, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation, report FROM comments WHERE post_id = ? ORDER BY id DESC');
        $req->execute(array($post_id));
        return $req;
    }

    public function getComment($comment_id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, post_id, author, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM comments WHERE id = ?');
        $req->execute(array($comment_id));
        $data = $req->fetch();
        return $data;
    }

    public function addComment($post_id, $newComment, $author)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, content, date_creation) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($post_id, $author, $newComment));
    }

    public function editComment($comment_id, $editComment)
    {
        $db=$this->dbConnect();
        $req= $db->prepare('UPDATE comments SET content = ?, date_creation = NOW() WHERE id = ?');
        $affectedLines = $req->execute(array($editComment, $comment_id));
    }

    public function deleteComment($comment_id)
    {
        $db=$this->dbConnect();
        $req= $db->prepare('DELETE FROM comments WHERE id = ?');
        $affectedLines = $req->execute(array($comment_id));
    }

    public function reportComment($comment_id, $report)
    {
        $db=$this->dbConnect();
        $req= $db->prepare('UPDATE comments SET report = ? WHERE id = ?');
        $affectedLines = $req->execute(array($report, $comment_id));
    }



    
}